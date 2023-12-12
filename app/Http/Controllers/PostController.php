<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index',[
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
            'category' => 'required',
            'publish' => 'required',
            'comment' => 'required',
        ]);


        // MANUAL ENTRY
        // $post = Post::create([
        //     'user_id' => auth()->id(),
        //     // 'user_id' => auth()->user()->id(),
        //     // 'user_id' => $request->user()->id,
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'type' => $request->type,
        //     'category' => $request->category,
        //     'publish' => $request->publish,
        //     'comment' => $request->comment,
        // ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'category' => $request->category,
            'publish' => $request->publish,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
