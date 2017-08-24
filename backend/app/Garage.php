<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $fillable = [
          'user_id','city_id','name', 'email', 'description','phone','address','postal', 'rating','pic'
      ];
    public function city()
    {
        return $this->belongsTO('App\City', 'city_id', 'id');
    }
    public function user()
    {
        return $this->belongsTO('App\User', 'user_id', 'id');
    }
}
