<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function customerProfile(){
    	
    	$profile = User::where('id', Auth::user()->id)->first();
    	return view('customer.profile')->with('profile', $profile);
    }

    public function customerProfile_edit(){
    	dd("editprofile");
    }

    public function customerProfile_edit_post(){

    }
}
