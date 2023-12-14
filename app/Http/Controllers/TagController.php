<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {

        $tags = Tag::orderBy('created_at', 'desc')->paginate(10);

        return view('tags.index', [
            'tags' => $tags
        ]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back();
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully');
    }
}
