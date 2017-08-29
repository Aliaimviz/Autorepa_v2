<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'first_name', 'last_name', 'language', 'birth_date', 'email', 'password', 'city_id', 'address', 'postal', 'phone', 'pic'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function garage(){
        return $this->hasOne('App\Garage','user_id', 'id');
    }
}
