<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRates;
use Illuminate\Support\Facades\Http;

class ExchangeRatesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return ExchangeRates::all();
    }


    public function update() {

        $exchangeRatesJson = Http::get(env('NBUStatService'));
        foreach ($exchangeRatesJson->json() as $rateJson) {
            $rate = ExchangeRates::where('r030', $rateJson['r030'])->first();
            $rate->update($rateJson);
        }
        return ExchangeRates::all();
    }
}
