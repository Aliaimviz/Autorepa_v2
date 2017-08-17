<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Garage;
use Illuminate\Support\Facades\Input;

class GarageController extends Controller
{
    public function garage_registration(){
      $data['cities'] = City::all();
      return view('garage.garage_register')->with($data);
    }
    public function garage_post(Request $request){
      dd($request);
        $newGarage = new Garage();
      if(Input::hasFile('garage_pic')) {
                $file = Input::file('garage_pic');
                $fileName = substr($file->getClientOriginalName(), -4);
                if ($fileName == '.jpg' || $fileName == 'jpeg' || $fileName == '.png') {
                    $finalpath = "";
                    $file = Input::file('garage_pic');
                    $tmpFilePath = '/garage/profile';
                    $tmpFileName = time() . '-' . $file->getClientOriginalName();
                    $tmpFileName = preg_replace('/\s+/', '', $tmpFileName);
                    $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
                    $path = $tmpFileName;
                    $finalpath .= $path;
                    $newGarage->pic = $finalpath;
                }
                return 'wrong file formate try again';
            }
            $newGarage->name = $request->input('name');
            $newGarage->city_id = $request->input('city_id');
            $newGarage->email = $request->input('email');
            $newGarage->description = $request->input('desc');
            $newGarage->phone = $request->input('phone');
            $newGarage->address = $request->input('address');
            $newGarage->postal = $request->input('postal');
            $newGarage->user_id = Auth::user()->id;

            if($newGarage->save()){
              return
            }
            else{
              return 
            }
    }

}
