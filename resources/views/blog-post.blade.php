<x-home-master>
@section('content')

    <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset($post->post_image) }}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>
        <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
                <cite title="Source Title">Source Title</cite>
            </footer>
        </blockquote>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">

                @if(Session::has('comment_message'))
                    {{session('comment_message')}}
                @endif

                <form method="post" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" rows="3" name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>

    @if(Auth::check())
        @if(count($comments) > 0)
            @foreach($comments as $comment)


                <!-- Single Comment -->
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" width="50" height="50" src="{{$comment->photo}}" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{$comment->author}}
                                <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
                            </h5>


                            <p>{{$comment->body}}</p>


                            @if(count($comment->replies) > 0)
                                @foreach($comment->replies as $reply)
                                    @if($reply->is_active == 1)
                                    <div class="media mt-4">
                                        <img class="d-flex mr-3 rounded-circle" width="50px" src="{{$reply->photo}}" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">{{$reply->author}}
                                                <small class="text-muted">{{$reply->created_at->diffForHumans()}}</small>
                                            </h5>
                                            <p>{{$reply->body}}</p>
                                        </div>


                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="comment-reply-container">
                                <button class="toggle-reply btn btn-primary float-right">Reply</button>
                                <div class="comment-reply">
                                    <form method="post" action="{{route('comment.replies')}}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group" style="    display: flex;">
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                            <label for="body"></label>
                                            <textarea type="text" id="body" name="body" rows="1"
                                                      class="form-control"></textarea>

                                            <button type="submit" class="btn btn-success form-control"
                                                    style="max-width: 100px;margin-right:5px;margin-left:5px">Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

        @endif
    @endsection

    @section('scripts')

        <script>
            $('.comment-reply-container .toggle-reply' ).click(function () {
                console.log(123);
                $(this).next().slideToggle('slow');
            });
        </script>
    @endsection
</x-home-master>
