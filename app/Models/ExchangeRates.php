<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    use HasFactory;
    protected $fillable = [
        'r030',
        'txt',
        'rate',
        'cc',
        'exchangedate',
    ];

}
