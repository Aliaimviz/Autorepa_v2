<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function getJobs(){
      return Job::all();
    }
}