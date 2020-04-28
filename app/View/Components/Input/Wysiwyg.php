<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Wysiwyg extends Component
{
    public $name, $text, $value;

    public function __construct($name, $text=null, $value=null)
    {
        $this->name  = $name;
        $this->text  = $text ?? $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.inputs.wysiwyg');
    }
}
