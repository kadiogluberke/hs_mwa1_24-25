<?php

namespace App\Http\Controllers;

use App\Models\User;

class WellcomeController extends Controller
{
    public function __invoke()
    {
        $user = User::first();
        if ($user->media->first() !== null) {
            $image = $user->getFirstMediaUrl('profile_pictures', 'thumb');
        } else {
            $image = asset('images/default.webp');
        }

        //return view('welcome')->with('user', $user);
        return view('welcome', compact('user', 'image'));
    }
}
