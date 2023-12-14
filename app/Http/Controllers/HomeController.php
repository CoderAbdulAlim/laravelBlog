<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::latest()->paginate(10);

        foreach ($posts as $post) {
            $post->first50Words = implode(' ', array_slice(str_word_count($post->content, 2), 0, 50));
        }

        return view('home', compact('posts'));
    }
}
