<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_model extends Model
{
    protected $fillable = [
        'code', 'title',
    ];
}
