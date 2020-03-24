<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CommentAddRequest;
use App\Models\Comment;
use App\View\Components\User\Comments as CommentsComponent;


class CommentController{

    public function add(CommentAddRequest $request){
        $data = $request->only('author', 'content', 'model_id', 'model_type', 'parent');

        $new_comment = Comment::create($data);

        $component = (new CommentsComponent(
            $new_comment,
            collect(),
            $request->model_id,
            $request->model_type,
            $request->parent
        ))->toString();

        return response()->json($component);
    }

}
