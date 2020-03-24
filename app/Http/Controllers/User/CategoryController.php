<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('user.pages.category.index', [
            'categories' => Category::with('comments')->orderBy('id', 'desc')->get(),
        ]);
    }

    public function single(Category $category)
    {
        return view('user.pages.category.single', [
            'category' => $category->load(['comments'])
        ]);
    }
}
