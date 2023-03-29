<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillables = [
        'title',
    ];

    public  function  oreders()
    {
        return $this->hasMany(Order::class);
    }
}
