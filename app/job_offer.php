<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_offer extends Model
{
  protected $fillable = [
        'id', 'job_id', 'offer_desc', 'offer_price', 'pickup_date', 'deliver_date'
    ];
}
