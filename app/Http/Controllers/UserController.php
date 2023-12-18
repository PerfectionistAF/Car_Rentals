<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //select operation
    public function index(){
        echo "<h1 style= font-size:30>Hello from User Controller</h1>";
        echo "<br><br>";
        $users = User::all();
        return view("user.index", ["users" => $users]);
    }
    //insert operation p1
    public function create(){
        return view('user.insert');

    }
    //insert operation p2
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
}
