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
        $users = new User();
        $users->name=$request->name;  ///$request->(name of the field in the insert form)
        $users->email=$request->email;
        $users->save();

        return redirect()->route('users')->with('success', 'User Added Successfully');
    }
    //update operation p1
    public function edit(string $id){
        $users = User::findOrFail($id);
        return view('user.update', ["users" => $users]);
    }
    //update operation p2
    public function update(Request $request, string $id):RedirectResponse{
        User::where('id', $id)->update([
            //column name in db  => name from request
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        return redirect()->route('users')->with('success', 'User Updated Successfully');
    }
    //show operation
    public function show(string $id){
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));//view, retreive data as array
    }
    //delete operation
    public function destroy(Request $request, string $id):RedirectResponse{
        $users = User::findOrFail($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted Successfully');
    }
}
