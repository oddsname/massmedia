<?php

namespace App\View\Components\User;

use App\Models\Comment;
use Illuminate\View\Component;

class Comments extends Component
{
    public $comment, $comments, $modelId, $modelType, $parent;

    protected $except = ['toString'];

    public function __construct(Comment $comment, $comments, $modelId, $modelType, $parent)
    {
        $this->comment = $comment;
        $this->comments = $comments;
        $this->parent = $parent;

        $this->modelId = $modelId;
        $this->modelType = $modelType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('user.components.comments');
    }

    public function toString()
    {
        $array = [];

        foreach ($this as $key => $item) {
            $array[$key] = $item;
        }

        return view('user.components.comments', $array)->render();
    }
}
