<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = User::first();
        $profileImage = $user && $user->getFirstMediaUrl('profile_pictures', 'thumb')
                        ? $user->getFirstMediaUrl('profile_pictures', 'thumb')
                        : asset('images/default.webp');

        return view('layouts.site.menu', compact('profileImage'));
    }
}
