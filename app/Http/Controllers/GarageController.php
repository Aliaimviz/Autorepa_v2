<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use City;

class GarageController extends Controller
{
    public function garage_registration(){
      $data['cities'] = City::all();
      return view('garage.garage_register')->with($data);
    }
    public function garage_post(Request $request){
      dd($request);
    }
}
