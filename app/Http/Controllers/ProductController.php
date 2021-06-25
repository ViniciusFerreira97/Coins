<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EconomiaService;

class ProductController extends Controller
{
    protected EconomiaService $economiaService;

    public function __construct(EconomiaService $economiaService)
    {
        $this->economiaService = $economiaService;
    }

    public function getAllCoins($price)
    {
        $coins = $this->economiaService->getCurrentCoins();
        $data = $this->calculatePrices($coins, $price);

        return response()->json($data, 200);
    }

    private function calculatePrices($coins, $price)
    {
        $data = [];
        
        foreach($coins as $coin) {
            $data[$coin['code']] = round($price / $coin['high'], 2);
        }
        
        return $data;
    }
}
