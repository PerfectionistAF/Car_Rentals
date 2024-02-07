<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //default method for admin
    public function index(){
        $users = User::all();
        return view("admin.users", ["users" => $users]);//view, merge data
    }
    //add User operation p1
    public function create(){
        return view('admin.addUser');
    }
    //add User operation p2
    public function store(Request $request):RedirectResponse{
        /*    //IMPROVEMENTS
        $validated = $request->validate([
            'fullname' => 'required'|'string'|'max:255',
            'username' => 'required'|'string'|'max:255',
            'email' => 'required'|'string'|'email'|'max:255'|'unique:users',
            'password' => 'required'|'string'|'min:8'|'confirmed',
        ],[
            'fullname' => 'Error: Full name is required',
            'username' => 'Error: User name is required',
            'email'=> 'Error: Email is required',
            'password'=> 'Error: Password is required'
        ]);*/

        $users = new User();
        $users->fullname = $request->fullname;
        $users->username = $request->username;  ///$request->(name of the field in the insert form)
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();

        return redirect()->route('users.html')->with('added_success', 'User Added Successfully');
    }
    //delete User operation
    public function destroy(Request $request):RedirectResponse{
        $id=$request->id;
        User::where('id', $id)->delete();
        return redirect()->route('users.html')->with('deleted_success', 'User Deleted Successfully');
    }
    //edit User operation p1
    public function edit(string $id){
        $users = User::findOrFail($id);
        return view('admin.editUser', ["users" => $users]);
    }
    //edit User operation p2
    public function update(Request $request, string $id):RedirectResponse{
        User::where('id', $id)->update([
            //column name in db  => name from request
            'fullname'=>$request->fullname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('users.html')->with('edited_success', 'User Updated Successfully');
    }
}
