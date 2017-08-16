<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_brand extends Model
{
    protected $fillable = [
        'code', 'title',
    ];
}
