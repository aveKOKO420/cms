<x-admin-master>
        @section('content')

                <div class="col-xl-12">
                        <h1>Permissions</h1>
                        @if(session()->has('permission-deleted'))
                                <div class="alert alert-danger">
                                        {{session('permission-deleted')}}
                                </div>
                        @endif
                </div>

                <div class="row">

                        <div class="col-sm-3">
                                <form method="post" action="{{route('permissions.store')}}">
                                        @csrf
                                        <div class="form-group">
                                                <label for="name"></label>
                                                <input type="text" id="name" name="name"
                                                       class="form-control @error('name') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                                @error('name')
                                                <span class="alert alert-danger"><strong>{{$message}}</strong></span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Create Permission</button>
                                        </div>
                                </form>
                        </div>
                        <div class="col-sm-9">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                <thead>
                                                                <tr>
                                                                        <th>Id</th>
                                                                        <th>Name</th>
                                                                        <th>Slug</th>
                                                                        <th>Delete</th>

                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                <tr>
                                                                        <th>Id</th>
                                                                        <th>Name</th>
                                                                        <th>Slug</th>
                                                                        <th>Delete</th>

                                                                </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                @foreach($permissions as $permission)
                                                                        <tr>
                                                                                <td>{{$permission->id}}</td>
                                                                                <td><a href="{{route('permissions.edit',$permission->id)}}">{{$permission->name}}</a></td>
                                                                                <td>{{$permission->slug}}</td>
                                                                                <td>
                                                                                        <form method="post" action="{{route('permissions.destroy',$permission->id)}}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <div class="form-group">
                                                                                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                                                                                </div>
                                                                                        </form>
                                                                                </td>


                                                                        </tr>
                                                                @endforeach
                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>

        @endsection
</x-admin-master>