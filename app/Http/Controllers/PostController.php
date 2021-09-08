<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
//      Pagination for blade
//        $posts = auth()->user()->posts()->paginate(2);

        //      Pagination for plugin
        $posts = auth()->user()->posts;

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->whereIsActive(1)->get();

        return view('blog-post', ['post' => $post, 'comments' => $comments]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.posts.create')->withCategories($categories);
    }

    public function store()
    {
        $this->authorize('create', Post::class);

        $inputs = \request()->validate([
            'title' => 'required|min:8|max:255',
            'body' => 'required',
            'post_image' => 'file',
            'category_id'   => 'required|numeric',
        ]);

        if (\request('post_image')) {
            $inputs['post_image'] = \request('post_image')->store('images');
        }


        auth()->user()->posts()->create($inputs);
        session()->flash('post-created-message', 'Post with title ' . $inputs['title'] . ' was created!');


        return redirect()->route('post.index');


    }


    public function edit(Post $post)
    {
        $this->authorize('view', $post);
//        $posts = Post::findOrFail($post);

//        if(auth()->user()->can('view', $post)){
//
//        }
        $categories = Category::with('children')->whereNull('parent_id')->get();


//        dd($categories);
        return view('admin.posts.edit')->withPost($post)->withCategories($categories);
    }

    public function update(Post $post)
    {
        $inputs = \request()->validate([
            'title' => 'required|min:8|max:255',
            'body' => 'required',
            'post_image' => 'file',
            'category_id' => 'required|numeric',
        ]);

        if (\request('post_image')) {
            $inputs['post_image'] = \request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->category_id = $inputs['category_id'];

        $this->authorize('update', $post);

        $post->save();

        session()->flash('post-updated-message', 'Post was updated');

        return redirect()->route('post.index');
    }

    // First variant of delete()
    public function destroy(Post $post)
    {

        $this->authorize('destroy', $post);

        $post->delete();

        Session::flash('message', 'Post was deleted');

        return back();
    }
    // First variant of delete(), basically is the same thing
//    public function destroy(Post $post, Request $request)
//    {
//        $post->delete();
//
//        $request->session()->flash('message','Post was deleted');
//
//        return back();
//    }
}
