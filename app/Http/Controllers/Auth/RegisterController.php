<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
           'name.string'=> 'Username tidak boleh berupa angka', // custom message
           'name.max'=> 'Username tidak boleh melebihi 255 karakter', // custom message
           'email.string'=> 'Email harus mengandung huruf', // custom message
           'email.email'=> 'Masukkan Email dengan benar', // custom message
           'email.max'=> 'Email tidak boleh melebihi 255 karakter', // custom message
           'email.unique'=> 'Email Sudah Terdaftar', // custom message
           'password.confirmed'=> 'Password Tidak Sesuai', // custom message
           'password.string'=> 'Password harus mengandung huruf', // custom message
           'password.min'=> 'Password Minimal 8 Karakter', // custom message
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
            'password' => Hash::make($data['password']),
            'desa_id'=>$data['desa'],
        ]);
    }
}
