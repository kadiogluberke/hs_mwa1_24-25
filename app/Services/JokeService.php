<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class JokeService implements AdviceServiceInterface
{
    protected string $endpoint;
    public function __construct()
    {
        $this->endpoint = config('services.dadjoke.endpoint', '');
    }
    public function getAdvice(): mixed
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($this->endpoint);
            if ($response->successful()) {
                
                $advice = json_decode($response->body())->joke;
                
            } else {
                throw new \Exception;
            }
        } catch (\Exception $e) {
            $advice = 'You should not worry about your presentation tomorrow';

            ray($e);
        }

        return $advice;
    }
}