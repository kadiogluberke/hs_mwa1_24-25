<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Carbon;

class FormText extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $name;
    public $value;
    public string $label;
    public ?string $placeholder = null;

    public function __construct($type = 'text', $name = null, $value = null, $label = null, $placeholder = null)   
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $this->formatValue($type, $value);
    }

    protected function formatValue($type, $value)
    {
        if ($type === 'date' && $value) {
            return Carbon::parse($value)->format('Y-m-d');
        }

        return $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-text');
    }
}
