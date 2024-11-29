<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionLayoutEdit extends Component
{
    public $action;

    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($action, $title)
    {
        $this->action = $action;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.action.edit');
    }
}
