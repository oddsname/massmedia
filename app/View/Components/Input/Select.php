<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Select extends Component
{
    public $name, $text, $options, $selectedKey;

    public function __construct($name, $text=false, $options=[], $selectedKey=0)
    {
        $this->name = $name;
        $this->text = $text ?? $name;
        $this->options = $options;
        $this->selectedKey = $selectedKey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.inputs.select');
    }
}
