<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SkillBox extends Component
{
    public $skills;         // List of all skills
    public $selectedSkills; // Selected skills
    public $label;          // Label text
    public $name;           // Input name
    public $id;             // Input ID

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skills, $selectedSkills = [], $label = 'Skills', $name = 'skills[]', $id = 'skills')
    {
        $this->skills = $skills;
        $this->selectedSkills = $selectedSkills;
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.skill-box');
    }
}
