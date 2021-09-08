<x-admin-master>
    @section('content')
        <h1> Users </h1>
        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('user-created-message'))
            <div class="alert alert-success">{{session('user-created-message')}}</div>
        @elseif(session('user-updated-message'))
            <div class="alert alert-success">{{session('user-updated-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Avatar</th>
                            <th>Registered at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Avatar</th>
                            <th>Registered at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>
{{--                                <td> {{$user->name}}</td>--}}
                                <td>{{$user->username}}</td>
                                <td><img src="{{$user->avatar}}" height="40px" alt=""></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>

                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        {{--   VARIANT OF PAGINATION FROM THE PLUGIN( doesnt keep page at refresh)  --}}
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>