<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTextArea extends Component
{
    public $id;

    public $name;

    public $label;

    public $rows;

    public $placeholder;

    public $value;

    public function __construct(
        $id,
        $name,
        $label,
        $rows = 4,
        $value = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->rows = $rows;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-text-area');
    }
}
