<x-admin-master>
    @section('content')
        <h1>Edit</h1>
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">

                        </div>
                        <div class="form-group">
                                <label for="file">File</label>
                                <div><img class="img-thumbnail" src="{{$post->post_image}}" alt=""></div>
                                <input type="file" name="post_image" class="form-control-file" id="post_image" aria-describedby="" >

                        </div>
                        <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>

                        </div>
                        <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" required>
                                        <option value="">Select a Category</option>

                                        @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @if ($category->children)
                                                        @foreach ($category->children as $child)
                                                                <option value="{{ $child->id }}" {{ $child->id === $post->category_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                                        @endforeach
                                                @endif
                                        @endforeach
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
    @endsection
</x-admin-master>