<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function created()
    {
        Cache::forget('products');
    }

}
