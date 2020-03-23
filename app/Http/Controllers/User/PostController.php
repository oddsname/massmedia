<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('user.pages.post.index', [
           'data' => Post::with('category')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function single(Post $post){

        return view('user.pages.post.single', [
           'post' => $post->load(['category', 'file', 'comments'])
        ]);
    }
}
