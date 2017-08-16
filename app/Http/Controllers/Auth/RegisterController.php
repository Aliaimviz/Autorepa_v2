<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\City;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerView(){
        $cities = City::all();
        return view('register')->with('cities', $cities);
    }

    public function registerSubmit(Request $request){
        //dd($request->input('city_id'));

        $user = User::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'postal' => $request->input('postal'),
            'phone' => $request->input('phone'),
            'city_id' => $request->input('city_id'),
            'email' => $request->input('email'),
            'password' => bcrypt( $request->input('password') ),
        ]);
        if($user){ 
            //$user->roles()->attach($user->id);
            \DB::table('role_user')->insert([
                'user_id' => $user->id, 'role_id' => $request->input('userRole')

            ]);
        }else{
           return 0; 
        }   
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'city_id' => '1',
        ]);
    }
}
