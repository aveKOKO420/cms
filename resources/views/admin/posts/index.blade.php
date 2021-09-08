<x-admin-master>
    @section('content')
        <h1>ALL POSTS</h1>
        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @elseif(session('post-created-message'))
            <div class="alert alert-success">{{session('post-created-message')}}</div>
        @elseif(session('post-updated-message'))
            <div class="alert alert-success">{{session('post-updated-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                            <td>View post</td>
                            <td>Comments</td>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                            <td>View post</td>
                            <td>Comments</td>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a> </td>
                                <td><img src="{{$post->post_image}}" height="40px" alt=""></td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>
                                    @can('view',$post)
                                    <form action="{{route('post.destroy',$post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                        @endcan
                                </td>
                                <td><a href="{{route('post', $post->slug)}}">View post</a></td>
                                <td><a href="{{route('comments.show', $post->id)}}">Comments</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

{{--    VARIANT OF PAGINATION FROM THE BLADE --}}
{{--    <div class="d-flex">--}}
{{--        <div class="mx-auto">--}}
{{--        {{$posts->links()}}--}}
{{--        </div>--}}
{{--    </div>--}}

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