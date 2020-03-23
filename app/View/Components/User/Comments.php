<?php

namespace App\View\Components\User;

use App\Models\Comment;
use Illuminate\View\Component;

class Comments extends Component
{
    public $comment, $comments, $isChild;

    public function __construct(Comment $comment, $comments, $isChild = false)
    {
        $this->comment = $comment;
        $this->comments = $comments;
        $this->isChild = $isChild;
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
}
