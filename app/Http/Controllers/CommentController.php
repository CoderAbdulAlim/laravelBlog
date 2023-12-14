<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {

        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);

        return view('comments.index', [
            'comments' => $comments
        ]);
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $request->user()->comments()->create($request->only('comment'));

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
