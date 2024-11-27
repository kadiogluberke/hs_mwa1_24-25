<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButtons extends Component
{
    public $type;       // The type of resource (e.g., 'education', 'work')
    public $item;       // The model instance (e.g., $education or $work)

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param mixed $item
     */
    public function __construct(string $type, $item)
    {
        $this->type = $type;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-buttons');
    }
}
