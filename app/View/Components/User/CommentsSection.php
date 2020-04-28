<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class CommentsSection extends Component
{
    public $comments, $model;

    public function __construct($comments, $model)
    {
        $this->comments = $comments;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('user.components.comments-section');
    }
}
