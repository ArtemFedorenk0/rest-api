<?php

namespace Database\Seeders;

use App\Models\ExchangeRates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ExchangeRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exchangeRatesJson = Http::get(env('NBUStatService'));
        ExchangeRates::factory()->createMany($exchangeRatesJson->json());
    }
}
