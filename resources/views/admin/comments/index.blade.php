<x-admin-master>
    @section('content')
        <h1>Comments</h1>
        @if(count($comments) > 0)
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
                                <th>Author</th>
                                <th>Email</th>
                                <th>Body</th>
                                <th>Post</th>
                                <th>Replies</th>
                                <th>Approve/Un-approve</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Body</th>
                                <th>Post</th>
                                <th>Replies</th>
                                <th>Approve/Un-approve</th>
                                <th>Delete</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->author}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->body}}</td>
                                    <td><a href="{{route('post', $comment->post->id)}}">View</a></td>
                                    {{--                                    {{route('comments.replies.show', $comment->post->id)}}--}}
                                    <td><a href="{{route('comment.replies.show', $comment->id)}}">View</a></td>
                                    <td>
                                        @if($comment->is_active == 1)
                                            <form method="post" action="{{route('comments.update', $comment->id)}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="0">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger">Un-approve</button>
                                                </div>
                                            </form>
                                        @else
                                            <form method="post" action="{{route('comments.update', $comment->id)}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="1">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Approve</button>
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('comments.destroy', $comment->id)}}">
                                            @csrf
                                            @method('DELETE')

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
        @else
            {{'No comments'}}
        @endif
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