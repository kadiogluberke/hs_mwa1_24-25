<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function __invoke()
    {
        $user = User:: first()->get();
        return view('welcome')->with('user', $user);
        //return view('welcome', compact('user'));
    }
}
