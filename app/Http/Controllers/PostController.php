<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {
        $posts = Post::with('user')->with('category')->latest()->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            // 'category' => 'required',
            'publish' => 'required',
            'comment' => 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            // 'category' => $request->category,
            'publish' => $request->publish,
            'comment' => $request->comment,
        ]);

        return back();
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
