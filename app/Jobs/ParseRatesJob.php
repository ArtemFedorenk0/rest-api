<?php

namespace App\Jobs;

use App\Models\ExchangeRates;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ParseRatesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $exchangeRatesJson = Http::get(env('NBUStatService'));
        foreach ($exchangeRatesJson->json() as $rateJson) {
            $rate = ExchangeRates::where('r030', $rateJson['r030'])->first();
            $rate->update($rateJson);
        }

    }
}
