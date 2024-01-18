<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //ONE TO MANY RELATIONS BETWEEN USER AND POSTS
    public function user(string $id){//user info
        $user_info = Post::findOrFail($id)->user;
        return view("admin.user_info", compact('user_info'));
        /*echo "<h1>Post by:</h1><br>";
        echo "<h1>$users->name</h1><br>";
        echo "<h1>_____________________________________________________________</h1>";*/
    }
    //select operation
    public function index(){
        //echo "<h1 style= font-size:30>Hello from Posts Controller</h1>";
        //echo "<br><br>";
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }
    //insert operation p1
    public function create(){
        return view('posts.insert');

    }
    //insert operation p2
    public function store(Request $request):RedirectResponse{
        $posts = new Post();
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); //remove constraints on InnoDB foreign keys
        $posts->post_title=$request->post_title;  ///$request->(name of the field in the insert form)
        $posts->post_content=$request->post_content;
        $posts->post_date= $request->post_date;
        //$exists = DB::table("users")->get()->where('id', $request->user_id);
        $exists=Auth::id(); //dynmaic user id of the user we just login
        //Auth::user() //all user info
        if($exists > 0){
            //$posts->user_id = $request->user_id;
            $posts->user_id = Auth::id();
        }
        else{
            (String) $request->user_id = "unset";
            (String) $posts->user_id = $request->user_id;
        }
        $posts->save();

        return redirect()->route('posts')->with('success', 'Post Added Successfully');
    }
    //update operation p1
    public function edit(string $id){
        $posts = Post::findOrFail($id);
        return view('posts.update', ["posts" => $posts]);
    }
    //update operation p2
    public function update(Request $request, string $id):RedirectResponse{
        Post::where('id', $id)->update([
            //column name in db  => name from request
            'post_title'=>$request->post_title,
            'post_content'=>$request->post_content,
            'post_date'=>$request->post_date,
            'user_id'=>$request->user_id
        ]);
        return redirect()->route('posts')->with('success', 'Posts Updated Successfully');
    }
    //show operation
    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    //delete operation
    public function delete(Request $request, string $id):RedirectResponse{
        $posts = Post::findOrFail($id)->delete();
        return redirect()->route('posts')->with('success', 'Posts Deleted Successfully');
    }
}
