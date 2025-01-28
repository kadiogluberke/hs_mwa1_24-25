<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Services\QuoteService;

class QuoteDynamic extends Component
{
    public string $quote = '';

    public function __construct()
    {
        $this->quote =  (new QuoteService())::init()->getQuote();
    }

    public function newquote()
    {
        $this->quote = cache()->remember(
            'quote',
            1,
            fn () => (new QuoteService())::init()->getQuote()
        );

        $this->render();
    }

    public function render(): View|Closure|string
    {
        return view('livewire.quote-dynamic');
    }
}
