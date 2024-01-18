<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function create(): View
    {
        return view('auth.login');
    }
    //authenticate new credentials
    public function credentials(Request $request){
        if(is_numeric($request->email_phone)){
            return ['phone'=>$request->email_phone, 'password'=>$request->password];
        }
        else if(filter_var($request->email_phone, FILTER_VALIDATE_EMAIL)){
            return ['email'=>$request->email_phone, 'password'=>$request->password];
        }
    }

        
}
