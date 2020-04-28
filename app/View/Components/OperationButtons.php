<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OperationButtons extends Component
{
    public $model, $folder;

    public function __construct($folder, $model)
    {
        $this->folder = $folder;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.operations-buttons');
    }
}
