<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index(Request $request, Tag $tag)
    {
        $posts = $tag->posts()->paginate();

        return view('tags.posts.index', [
            'posts' => $posts
        ]);
    }
}
