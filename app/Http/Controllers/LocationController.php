<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $positionClient;

    public function getShopLocation(Request $request)
    {
        $this->positionClient = $request->posicaoCliente;

        $validate = $this->validatePlan($request->plano) && $this->validatePlace($request->posicaoCliente, $request->plano);
        if(!$validate) {return false;}

        $plan = $request->plano;

        //Filter valid shops
        $shops = array_filter($request->lojas, function($item) use($plan){
            return $this->validatePlace($item, $plan);
        });

        usort($shops, [$this, 'orderPlace']);

        return $shops;
    }

    private function calculateShopDistance($point)
    {
        return abs(sqrt(pow(($this->positionClient[0] - $point[0]), 2) + pow(($this->positionClient[1] - $point[1]), 2)));
    }

    private function orderPlace($a, $b) 
    {
        return $this->calculateShopDistance($a) > $this->calculateShopDistance($b);
    }

    private function validatePlan($plan)
    {
        //Valid condition plan
        return $plan[0] && $plan[1] && $plan[0] <= 1000 && $plan[1] <= 1000;
    }

    private function validatePlace($place, $plan)
    {
        //Valid condition places
        return $place[0] && $place[0] <= $plan[0] && $place[1] && $place[1] <= $plan[1];
    }

}
