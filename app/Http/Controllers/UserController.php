<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //MANY TO MANY RELATIONS
    public function roles(){//access user's roles and user's info at the same time
        $user_roles = User::find(1)->roles;
        $user_info = Role::find(1)->users;
        foreach ($user_roles as $roles) {
            $id = $roles->pivot->user_id;
            echo "<h1>User ID:$id</h1>";
            foreach($user_info as $info){
                $name = $info->name;
                echo "<h2>Name:$name</h2>";
            }
            echo "<h2>Role:$roles->role_name</h2>";
            echo "<h2>Date of Post:$roles->role_date</h2><br>";
        }   
    }
    //ONE TO MANY RELATIONS BETWEEN USER AND POSTS
    public function posts(string $id){//gte posts info
        $user_posts = User::findOrFail($id)->posts;
        $name = User::findOrFail($id);
        return view("admin.user_posts", compact('user_posts', 'name'));
        /*foreach($user_posts as $posts){
            echo "<h1>Post Title: $posts->post_title</h1><br>";
            echo "<h2>$posts->post_content</h2><br>";
            echo "<h1>_____________________________________________________________</h1>";
        }*/
    }
    //ONE TO ONE RELATIONS BETWEEN USER AND PHONE
    public function phone_no(string $id){
        //$phone_data = Phone::find(1);//id=1 , what is no?
        $phone_data = Phone::findOrFail($id);
        //Phone model has the function user, so will be executed
        $user = $phone_data->user; //dynamic property in Phone Model
        echo $user->name; //from user table
        echo $user->phone_no;
    }
    //select operation
    public function index(){
        //echo "<h1 style= font-size:30>Hello from User Controller</h1>";
        //echo "<br><br>";
        $users = User::all();
        return view("admin.users", ["users" => $users]);//view, merge data
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
    //show operation
    public function show(string $id){
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));//view, retreive data as array
    }
    //delete operation
    public function delete(Request $request, string $id):RedirectResponse{
        $users = User::findOrFail($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted Successfully');
    }
}
