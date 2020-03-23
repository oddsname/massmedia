<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CommentAddRequest;

class CommentController{

    public function add(CommentAddRequest $request){
        dd($request);
    }

}
