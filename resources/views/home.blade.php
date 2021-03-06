<x-home-master>
    @section('content')


        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>
        @foreach($posts as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="text-muted">{{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
                    <p class="card-text">{{Str::limit($post->body,'100','...')}}</p>
                    <a href="{{route('post', $post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->created_at->diffForHumans()}} by
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>

        @endforeach

    <!-- Pagination -->

        {{$posts->links()}}


    @endsection
    {{--    <div class="row">--}}
    {{--        <div class="col-sm-6 col-sm-offset-5">--}}
    {{--            {{$posts->links()}}--}}
    {{--        </div>--}}
    {{--    </div>--}}


</x-home-master>