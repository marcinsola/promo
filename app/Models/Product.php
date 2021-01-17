<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'description',
        'colors',
        'sizes',
    ];
}
