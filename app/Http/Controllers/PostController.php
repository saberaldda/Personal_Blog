<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags', 'category')->latest()->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('tags', 'category')->findOrFail($id);
        
        return view('posts.show', compact('post'));
    }
}
