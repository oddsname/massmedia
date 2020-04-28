<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class File extends Component
{
    public $name, $text;
    public $file_path = '#';
    public $file_name = '';

    public function __construct($name, $text=false, $model=null)
    {
        $this->name = $name;
        $this->text = $text ?? $name;

        if(isset($model)){
            $this->file_path = $model->path;
            $this->file_name = $model->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.inputs.file');
    }
}
