<x-admin-master>
    @section('content')
        <h1>Replies on comment: {{$comment->body}}</h1>
        @if(count($replies) > 0)
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
                                <th>Approve/Disapprove</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Body</th>
                                <th>Approve/Disapprove</th>
                                <th>Delete</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($replies as $reply)
                                <tr>
                                    <td>{{$reply->id}}</td>
                                    <td>{{$reply->author}}</td>
                                    <td>{{$reply->email}}</td>
                                    <td>{{$reply->body}}</td>
                                    {{--                                    <td><a href="{{route('post', $reply->comment->post->id)}}">View Post</a></td>--}}
                                    <td>
                                        @if($reply->is_active == 1)
                                            <form method="post" action="{{route('replies.update', $reply->id)}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="0">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger">Un-approve</button>
                                                </div>
                                            </form>
                                        @else
                                            <form method="post" action="{{route('replies.update', $reply->id)}}">
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
                                        <form method="post" action="{{route('replies.destroy', $reply->id)}}">
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
            {{'No replies'}}
        @endif
    @endsection
</x-admin-master>
