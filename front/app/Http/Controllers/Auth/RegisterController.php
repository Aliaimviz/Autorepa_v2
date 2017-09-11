<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    {  parent::__construct();
        $this->middleware('guest');
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
        ]);
    }

    public function registerView(){

      $response  = $this->client->get('api/register-view', [
          'headers' => [
              'Authorization' => 'Bearer '.$this->token,
              'Accept' => 'application/json',
              'Content-Type' => 'application/json',
          ]
      ]);
      //dd(123);
       $data = json_decode($response->getBody());
       $cities = $data->cities;
    //  dd($response->getBody());
      return view('pages.signup')->with('cities', $cities);
    }

    public function postRegister(Request $request){
      $response  = $this->client->post('api/register', [
          'headers' => [
              'Authorization' => 'Bearer '.$this->token,
              'Accept' => 'application/json',
              'Content-Type' => 'application/json',
          ],
          'json' => [
            /*'title' => $request->input('title'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt( $request->input('password') ),
            'city_id' => $request->input('city_id'),
            'language' => $request->input('language'),
            'address' => $request->input('address'),
            'postal' => $request->input('postal'),
            'phone' => $request->input('phone'),*/
            $request->all()
          ]
      ]);

      dd(json_decode( $response->getBody() ) );
    }
}
