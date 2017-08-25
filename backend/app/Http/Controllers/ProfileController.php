<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Garage;
use Auth;

class ProfileController extends Controller
{
    public function customerProfile(){
    	
    	$profile = User::where('id', Auth::user()->id)->first();
    	return view('customer.profile')->with('profile', $profile);
    }

    public function customerProfile_edit_post(){

    	return $profile;
        //return view('customer.profile')->with('profile', $profile);
    }

    public function customerProfile_edit(Request $request){
    	dd($request->input()); 
        if($request->input('edit_profile_flag')){

            $user = User::find($request->input('edit_profile_flag'));
            $user->name = $request->input('name');
            $user->email = $request->input('city_id');
            $user->city_id = $request->input('email');
            $user->address = $request->input('address');
            $user->postal = $request->input('postal');
            $user->phone = $request->input('phone');
            

            //Pic Upload Code
        // if(Input::hasFile('pic')) {
        //     $file = Input::file('pic');
        //     $fileName = substr($file->getClientOriginalName(), -4);
           
        //         $finalpath = "";
        //         $file = Input::file('pic');
        //         $tmpFilePath = '/profile/';
        //         $tmpFileName = time() . '-' . $file->getClientOriginalName();
        //         $tmpFileName = preg_replace('/\s+/', '', $tmpFileName);
        //         $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        //         $path = $tmpFileName;
        //         $finalpath .= $path;
        //         $user->pic = $finalpath;
            
        //     return 'wrong file formate try again';
        // }            

            if($user->save()){
                 return response()->json(['success' => 'Profile updated.'], 200);  
            }else{
                 return response()->json(['error' => 'Profile Couldnot be updated-1.'], 401);  
            }            



        }else{
           return response()->json(['error' => 'Profile Couldnot be updated-2.'], 401);  
        }
    }

    public function editProfile_view(Request $request){
        $editProfile = User::where('id', Auth::user()->id)->first();
        return $editProfile;
    }

    public function garageRegistration(Request $request){
        $validate = Garage::where('user_id', $request->user_id)->first();
        if ($validate) {
            $garage = Garage::where('user_id', $request->user_id)->update([
                'city_id' => $request->city_id,
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'phone' => $request->phone,
                'address' => $request->address,
                'postal' => $request->postal,
            ]);
        }
        else{
            $garage = Garage::create([
                    'user_id' => $request->user_id,
                    'city_id' => $request->city_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'description' => $request->description,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'postal' => $request->postal,
                ]);
        }
        return response()->json(['success' => $garage], 200);
    }
}
