<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name;
    public $label;
    public $options;
    public $value;
    public $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $options = [], $value = null, $placeholder = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form-select');
    }
}

