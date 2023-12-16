<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = $request->user()->posts()->paginate();

        return view('users.posts.index', [
            'posts' => $posts
        ]);        
    }
}
