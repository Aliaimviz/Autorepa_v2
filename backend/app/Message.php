<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	 protected $fillable = [
	        'id', 'message', 'sender_id', 'receiver_id' 
	    ];
}
