<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class CommentsSection extends Component
{
    public $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
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
