<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class AdviceService
{
    protected string $endpoint;
    public function __construct()
    {
        $this->endpoint = config('services.adviceslip.endpoint', '');
    }
    public function getAdvice()
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
}