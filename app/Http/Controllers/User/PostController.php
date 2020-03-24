<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('user.pages.post.index', [
            'posts' => Post::with('category')->category(request()->category)->orderBy('id', 'desc')->get(),
            'categories' => Category::all()
        ]);
    }

    public function single(Post $post)
    {

        return view('user.pages.post.single', [
            'post' => $post->load(['category', 'file', 'comments'])
        ]);
    }
}
