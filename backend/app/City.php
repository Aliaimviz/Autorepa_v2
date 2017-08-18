<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name'
    ];
    public function garage(){
        return $this->hasOne('App\Garage','city_id', 'id');
    }
}
