<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'user_id', 'garage_id', 'job_id', 'table', 'stars', 'description'
    ];
}
