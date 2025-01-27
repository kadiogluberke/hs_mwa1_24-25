<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;
use App\Services\QuoteService;

class Advice extends Component
{
    public function __construct()
    {
        // 
    }
        public function render(): View|Closure|string
    {
        $advice = cache()->remember(
            'advice',
            5,
            fn () => (new QuoteService())::init()->getAdvice()
        );
       
        return view('components.advice', compact('advice'));
    }
}