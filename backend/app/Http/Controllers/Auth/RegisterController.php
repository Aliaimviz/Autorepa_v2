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
        $data['cities'] = City::all();
        //return response()->json($data);
        return $data;
        // json_decode( $data (string) $response->getBody() )
        //   return response()->json(['data' => $data['cities']], 200);
        //return view('register')->with('cities', $cities);
    }

    public function registerUser(Request $request){
      //$input = $request[0];
      $test = $request->input(); //json_decode($input);
      //dd(json_decode((string)$test));
      //die();
      //return $input['title'];
      $user = User::create([
          'title' => $request->input('title'),
          'first_name' => $request->input('first_name'),
          'last_name' => $request->input('last_name'),
          'email' => $request->input('email'),
          'birth_date' => $request->input('birth_date'),
          'password' => bcrypt( $request->input('password') ),
          'city_id' => $request->input('city_id'),
          'language' => $request->input('language'),
          'address' => $request->input('address'),
          'postal' => $request->input('postal'),
          'phone' => $request->input('phone'),
      ]);

        if($user){
            //$user->roles()->attach($user->id);
            \DB::table('role_user')->insert([
                'user_id' => $user->id, 'role_id' => $request->input('userRole')
            ]);

            return response()->json(['success' => true], 200);

        }else{
            return response()->json(['success' => false], 200);
        }

    }

    // public function registerSubmit(Request $request){
    //   //  dd($request->input('email'));
    //
    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'address' => $request->input('address'),
    //         'postal' => $request->input('postal'),
    //         'phone' => $request->input('phone'),
    //         'city_id' => $request->input('city_id'),
    //         'email' => $request->input('email'),
    //         'password' => bcrypt( $request->input('password') ),
    //     ]);
    //     if($user){
    //         //$user->roles()->attach($user->id);
    //         \DB::table('role_user')->insert([
    //             'user_id' => $user->id, 'role_id' => $request->input('userRole')
    //
    //         ]);
    //     }else{
    //        return 0;
    //     }
    // }

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
