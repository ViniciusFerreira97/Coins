<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EconomiaService 
{
    public function getCurrentCoins()
    {
        $coins = 'USD-BRL,EUR-BRL,INR-BRL';
        $response = Http::get("http://economia.awesomeapi.com.br/last/$coins");

        return $response->json();
    }
}