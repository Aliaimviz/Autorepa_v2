<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	 protected $fillable = [
	        'description', 'title', 'notify_type', 'sender_id', 'receiver_id' 
	    ];
}
