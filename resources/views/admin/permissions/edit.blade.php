<x-admin-master>
    @section('content')

        <h1> Edit permission - {{$permission->name}}</h1>

        <div class="col-sm-6">
            @if(session()->has('permission-updated'))
                <div class="alert alert-success">
                    {{session('permission-updated')}}
                </div>
            @endif
            <form method="post" action="{{route('permissions.update', $permission->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$permission->name}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>


    @endsection
</x-admin-master>