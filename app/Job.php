<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  protected $fillable = [
        'user_id', 'job_type_id', 'job_off_id', 'job_title', 'job_desc', 'address',
        'car_brand', 'car_model', 'pics', 'budget', 'expiry_date', 'payment_status', 'status_id'
    ];
}
