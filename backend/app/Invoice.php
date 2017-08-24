<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	  protected $fillable = [
	        'user_id', 'job_id', 'garage_id', 'table', 'status', 'invoice_no', 'amount'
	    ];
}
