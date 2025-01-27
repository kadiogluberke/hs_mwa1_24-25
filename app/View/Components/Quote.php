<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;
use App\Services\QuoteService;

class Quote extends Component
{
    public function __construct()
    {
        // 
    }
        public function render(): View|Closure|string
    {
        $quote = cache()->remember(
            'quote',
            5,
            fn () => (new QuoteService())::init()->getQuote()
        );
       
        return view('components.quote', compact('quote'));
    }
}