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
    protected function redirectTo()
    {
        return url()->previous();
    }

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
        $message = [
            'name.required' => 'Vui lòng nhập tên ',
            'name.string' => 'Tên được nhập theo kiểu string',
            'name.max' => 'Tên được nhập tối đa 40 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.string' => 'Tên được nhật theo kiểu string',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.max' => 'Email được nhập tối da 255 kí tự',
            'email.unique' => 'Email đã tồn tại',
          
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.string' => 'Mật khẩu được nhập theo kiểu string',
            'password.min' => 'Mật khẩu dài ít nhất 8 kí tự',
            'password.confirmed' => 'Vui lòng nhập đúng xác nhận mật khẩu',

            'phone_user.required' => 'Vui lòng nhập số điện thoại',
            'phone_user.min' => 'Vui số điện thoại gồm 10 số',
            'phone_user.max' => 'Vui số điện thoại gồm 10 số',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_user' => ['required','min:10','max:10'],
        ],$message);
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
            'role_user'=>0,
            'guilty_user'=>0,
            'images_user'=>'anh-dai-dien-nguoi-giau-mat.jpg',
            'phone_user' => $data['phone_user'],
           
        ]);
    }
}
