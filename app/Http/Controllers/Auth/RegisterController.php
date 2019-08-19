<?php

namespace App\Http\Controllers\Auth;

use App\BuyerProfile;
use App\Mail\RegistrationConfirmation;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        if (Auth::check()){
            $this->middleware('verified');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required'],
            'CaptchaCode' => 'required|valid_captcha',
        ]);
    }
//     protected function redirectTo()
// {
//     if(session('link')){
//         return redirect(session('link'))->with('success', 'Thank you for your previous transaction! Go to your Profile to review your transaction history.');
//     }
//     return redirect('/home')->with('success', 'Thank you for your previous transaction! Go to your Profile to review your transaction history.');
// }
//     public function showRegistrationForm()
// {
//     if (session('link')) {
//         $myPath     = session('link');
//         $registerPath  = url('/register');
//         $previous   = url()->previous();

//         if ($previous = $registerPath) {
//             session(['link' => $myPath]);
//         }else{
//             session(['link' => $previous]);
//         }
//     } else{
//         session(['link' => url()->previous()]);
//     }
//     return view('auth.register');
// }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);
        $userId = $user->id;
        BuyerProfile::create([
            'user_id' => $userId,
            'user_name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
        // Mail::to($data['email'])->send(new RegistrationConfirmation($data['name']));
        Mail::send(new RegistrationConfirmation($data));
        return $user;
    }
}
