<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'table_number',
        'total_price',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}