<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'colors',
        'sizes',
    ];
}
