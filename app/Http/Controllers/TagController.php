<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('tags.index');
    }
    
    public function create(){
        return view('tags.create');
    }
}
