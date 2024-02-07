<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/USERS/users-admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginview()
    {
        return view('admin.login');
    }
 
    public function login(Request $request):RedirectResponse
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credentials)) {
            $string = 'Login Success';
            $data = Auth::user()->username;
            session()->put(['data' => $data]);
            return redirect()->route('users.html')->with('login_success', $string);
        }

        return redirect()->route('registerview')->with('login_error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
        session()->flush(); //clear session
        return redirect()->route('login');
    }
    /*
    public function credentials(Request $request){
        if(is_numeric($request->email_phone)){
            return ['phone'=>$request->email_phone, 'password'=>$request->password];
        }
        else if(filter_var($request->email_phone, FILTER_VALIDATE_EMAIL)){
            return ['email'=>$request->email_phone, 'password'=>$request->password];
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }*/
}
