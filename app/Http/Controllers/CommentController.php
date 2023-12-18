<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {

        $comments = Comment::with('post')->with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('comments.index', [
            'comments' => $comments
        ]);
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
        $comment = $request->user()->comments()->create([
            'comment' => $request->input('comment'),
            'post_id' => $request->input('post_id'),
        ]);

        return back();
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully');
    }
}
