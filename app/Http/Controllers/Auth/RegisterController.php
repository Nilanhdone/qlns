<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show register form.
     *
     * @return \Illuminate\Http\Response
     */
    protected function showRegistrationForm()
    {
        return view('auth.register');
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/[0-9]/', 'min:10', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required'],
            'nationality' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'hometown' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'identify_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'repassword' => ['required', 'string', 'min:8', 'same:password']
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
            'user_id' => $data['user_id'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'degree' => $data['degree'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'nationality' => $data['nationality'],
            'religion' => $data['religion'],
            'hometown' => $data['hometown'],
            'address' => $data['address'],
            'identify_number' => $data['identify_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
