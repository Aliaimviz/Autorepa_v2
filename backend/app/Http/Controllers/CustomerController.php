<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car_brand;
use App\Car_model;

class CustomerController extends Controller
{
    public function GarageLookUp(){
       $data['car_models'] = Car_model::all();
       $data['car_brands'] = Car_brand::all();
       return view('customer.lookUp')->with($data);
    }

    public function GarageLookUp_post(){
    	dd("garage post");
    }
}
