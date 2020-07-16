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
    protected $redirectTo = '/';

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

            //追加カラム分
            'name_kana' => ['required', 'string', 'max:40'],
            'penname' => ['required', 'string', 'max:40', 'unique:users,penname'],
            'gender' => ['required', 'in:male,female'],
            
            //下記を記述すると上手くいかないので除外
//            'birthyear' => ['required', 'between:1901,2120'],
//            'image' => ['image'],
//            'profile' => ['max:4000'],

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
            
            //追加カラム分
            'name_kana' => $data['name_kana'],
            'penname' => $data['penname'],
            'gender' => $data['gender'],
            'birth' => $data['birthyear'] . '-' . $data['birthmonth'] . '-01',
            'image' => $data['image'],
//            'profile' => $data['profile'],
        ]);
    }
}
