<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action, $method, $field_method, $enctype;

    public function __construct($action, $method='GET', $enctype=false)
    {
        $this->action = $action;
        $this->method = $method !== 'GET' ? 'POST' : 'GET';
        $this->field_method = $method;
        $this->enctype = $enctype;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin.components.form');
    }
}
