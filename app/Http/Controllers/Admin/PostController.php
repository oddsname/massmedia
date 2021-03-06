<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Uploader\FileUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostController extends Controller
{
    protected string $folder = 'post';
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.pages.'.$this->folder.'.index', [
            'data' => Post::orderBy('id', 'desc')->with('category', 'comments')->get(),
            'folder' => $this->folder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.'.$this->folder.'.create', [
            'folder' => $this->folder,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @param FileUploader $uploader
     * @return Application|RedirectResponse|Redirector
     */
    public function store(PostRequest $request, Post $post, FileUploader $uploader)
    {
        $post->createByAdmin($request->input(), $request->files, $uploader);

        return redirect(route('admin.post.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('admin.pages.'.$this->folder.'.edit', [
            'folder' => $this->folder,
            'data' => $post,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @param FileUploader $uploader
     * @return Application|RedirectResponse|Redirector
     */
    public function update(PostRequest $request, Post $post, FileUploader $uploader)
    {
        $post->updateByAdmin($request->input(), $request->files, $uploader);

        return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Post $post)
    {
        Comment::deleteByModel($post);
        $post->deleteByAdmin();

        return redirect(route('admin.post.index'));
    }
}
