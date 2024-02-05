<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/auth/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');//redirect to auth/users if authenticated
        //\App\Http\Middleware\RedirectIfAuthenticated::class
    }
    //show registeration view
    public function registerview()
    {
        return view('admin.login');
    }
    //register and validate
    public function register(Request $request):RedirectResponse{
        //validate data array
        //$data = [$request->fullname, $request->username, $request->email, $request->password];
        //validator($data);
        $validated = $request->validate([
            'fullname' => 'required', 'string', 'max:255',
            'username' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        //create a new instance of request or of data
        $users = new User();
        //$users::create($data);//FAILED TRIAL
        
        $users->fullname=$request->fullname;  ///$request->(name of the field in the insert form)
        $users->username=$request->username;
        $users->email=$request->email;
        $users->password= Hash::make($request->password);
        $users->save();
        return redirect()->route('registerview')->with('success', 'Check your email to verify your registeration');
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
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
    }
}
