<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    protected $fillable = [
        'item',
        'designation',
        'code',
        'qte_retiree',
        'qte_restante'
    ];
}
