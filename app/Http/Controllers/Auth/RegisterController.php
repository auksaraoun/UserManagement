<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Province;
use App\Amphur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $province = Province::all();
        $amphur = Amphur::all();
        
        $amphurs = $amphur->where('PROVINCE_ID',1)->all();

        $response = array();
        $response['province'] = $province;
        $response['amphur'] = $amphur;

        return view('auth.register')->with($response);
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'tel' => 'required|numeric|',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string',
            'province' => 'required|numeric|max:255',
            'amphur' => 'required',
            'zipcode' => 'required|numeric|',
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
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'address' => $data['address'],
            'province' => $data['province'],
            'amphur' => $data['amphur'],
            'zipcode' => $data['zipcode'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
