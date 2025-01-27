<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class AdviceService implements QuoteServiceInterface
{
    protected string $endpoint;
    public function __construct()
    {
        $this->endpoint = config('services.adviceslip.endpoint', '');
    }
    public function getQuote(): mixed
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($this->endpoint);
            if ($response->successful()) {
                
                $quote = json_decode($response->body())->slip->advice;
                
            } else {
                throw new \Exception;
            }
        } catch (\Exception $e) {
            $quote = 'You should not worry about your presentation tomorrow';

            ray($e);
        }

        return $quote;
    }
}