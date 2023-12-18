<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index(Request $request, Category $category)
    {
        $posts = $category->posts()->paginate();

        return view('categories.posts.index', [
            'posts' => $posts
        ]);
    }
}
