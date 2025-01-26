<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Advice extends Component
{
    private string $endpoint;
    public function __construct()
    {
        $this->endpoint = 'https://api.adviceslip.com/advice';
    }
    private function getAdvice()
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($this->endpoint);
            if ($response->successful()) {
                
                $advice = json_decode($response->body())->slip->advice;
                
            } else {
                throw new \Exception;
            }
        } catch (\Exception $e) {
            $advice = 'You should not worry about your presentation tomorrow';

            ray($e);
        }

        return $advice;
    }
    public function render(): View|Closure|string
    {
        $advice = cache()->remember(
            'advice',
            10,
            fn () => $this->getAdvice()
        );
       
        return view('components.advice', compact('advice'));
    }
}