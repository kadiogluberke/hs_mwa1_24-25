<?php
namespace App\Services;
class QuoteService
{
    public static function init()
    {
        $CLASS = config('services.quote');
        return new $CLASS;
    }
}