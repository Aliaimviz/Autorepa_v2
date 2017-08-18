<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car_brand;
use App\Car_model;
use App\Job_type;
use App\Job;
use Illuminate\Support\Facades\Input;
use Auth;

class CustomerController extends Controller
{
    public function GarageLookUp(){
       $data['car_models'] = Car_model::all();
       $data['car_brands'] = Car_brand::all();
       $data['job_types'] = Job_type::all();

       return view('customer.lookUp')->with($data);
    }

    public function GarageLookUp_post(Request $request){
    	
    	$job_typeArray = "";
    	
    	foreach($request->input('checkBoxJobType') as $value){
		  $job_typeArray.=$value;
		}

    	$job = new Job();
    	$job->user_id = Auth::user()->id;
    	$job->job_type_id = 2;//checkboxes $request->input('');
    	$job->job_title = $request->input('job_title');
    	$job->job_desc = $request->input('job_desc');
    	$job->address = $request->input('address'); 
    	$job->car_brand = $request->input('carBrand');
    	$job->car_model = $request->input('carModel');    	
    	$job->pics = $request->input('carPic'); 
    	
          if(Input::hasFile('carPic')) {
            //upload an image to the /img/tmp directory and return the filepath.
            $imageCount = count(Input::file('carPic'));

            $finalpath = "";
            for($i=0; $i<$imageCount; $i++){
              $file = Input::file('carPic')[$i];
              $tmpFilePath = '/job_pics/';
              $tmpFileName = time() . '-' . $file->getClientOriginalName();
              $tmpFileName = preg_replace('/\s+/', '', $tmpFileName);
              $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
              $path = $tmpFilePath . $tmpFileName;
              $finalpath .= $path;
              if($i != $imageCount-1){
                  $finalpath .= ',';
              }
            }
            $job->pics = $finalpath;
         }

    	$job->budget = $request->input('budget');
    	$job->job_type_id = $job_typeArray;
    	// $job->expiry_date = $request->input('');
    	// $job->payment_status = $request->input(''); 
    	$job->status_id = 1;//$request->input('');    	    	
    	
    	if($job->save()){
    		dd("job posted");
    	}else{
    		dd("job not posted");
    	}    	
    }
}
