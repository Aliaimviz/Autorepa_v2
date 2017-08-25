<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Garage;
use App\Review;
use App\Job_offer;
use App\Notificaion;
use App\Job;
use Illuminate\Support\Facades\Input;
use Carbon;

class GarageController extends Controller
{
    public function garage_registration(){
      $data['cities'] = City::all();
      return view('garage.garage_register')->with($data);
    }
    public function garage_post(Request $request){
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
          return true;
        }
        else{
          return false;
        }
    }

    //send porposal to job
    public function sendProposal(Request $r){        
        try { 
            $e = Job_offer::where([
                    ['g_user_id', '=', $r->g_user_id],
                    ['garage_id', '=', $r->garage_id],
                    ['job_id', '=', $r->job_id],
                ]);
            if (!$e) {
                $z = Job::select('created_at')->where('id', $r->job_id)->first();
                $z = strtotime($z->created_at. '+ 2 days');
                $x = Carbon\Carbon::now();
                $x = strtotime($x);
                if ($z > $x) {
                    return response()->json(['error' => 'Sorry Job is closed and cannot be offered now'], 201);
                }
                else{
                    $post = Job_offer::create([
                            'g_user_id' => $r->g_user_id, 
                            'garage_id' => $r->garage_id, 
                            'job_id' => $r->job_id, 
                            'offer_desc' => $r->offer_desc, 
                            'offer_price' => $r->offer_price, 
                            'pickup_date' => $r->pickup_date, 
                            'deliver_date' => $r->deliver_date, 
                            'status_id' => $r->status_id,
                        ]);
                    if ($post) {
                        return response()->json(['success' => $post], 200);
                    }
                    else{
                        return response()->json(['error' => 'sorry some error found, please try again!'], 201);
                    }
                }
            }
            else{
                return response()->json(['error' => 'Sorry! you have already bid on this job.'], 201);
            }
        } 
        catch(\Exception $ex){              
            return response()->json(['error' => 'Error:'.$ex->getMessage()], 401);     
        }
    }


    public function jobLists($user_id){
        try {
            $jobs = Job_offer::join('jobs', 'job_offers.job_id', '=', 'jobs.id')
                ->select('jobs.*', 'job_offers.*', 'jobs.status_id as job_staus_id')
                ->where([
                    ['job_offers.status_id', '=', 7],
                    ['job_offers.g_user_id', '=', $user_id],
                ])->get();
            return response()->json(['Success' => $jobs], 200); 
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error:'.$e->getMessage()], 401); 
        }
    }

    public function reviews($user_id){
        try {
            $reviews = Review::where('user_id', $user_id)->get();
            return response()->json(['Success' => $reviews], 200); 
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error:'.$e->getMessage()], 401); 
        }
    }

    public function notifications($user_id){
        try { 
            $reviews = Notification::where('user_id', $user_id)->get();
            return response()->json(['Success' => $reviews], 200); 
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error:'.$e->getMessage()], 401); 
        }
    }

}
