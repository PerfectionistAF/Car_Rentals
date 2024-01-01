<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostsController extends Controller
{
    //select operation
    public function index(){
        echo "<h1 style= font-size:30>Hello from Posts Controller</h1>";
        echo "<br><br>";
        $posts = Posts::all();
        return view("posts.index", ["posts" => $posts]);
    }
    //insert operation p1
    public function create(){
        return view('posts.insert');

    }
    //insert operation p2
    public function store(Request $request):RedirectResponse{
        $posts = new Posts();
        //DB::statement('SET FOREIGN_KEY_CHECKS=0'); //remove constraints on InnoDB foreign keys
        $posts->post_title=$request->post_title;  ///$request->(name of the field in the insert form)
        $posts->post_content=$request->post_content;
        $posts->post_date= $request->post_date;
        $exists = DB::table("users")->get()->where('id', $request->user_id);
        if($exists){
            $posts->user_id = $request->user_id;
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
        $posts = Posts::findOrFail($id);
        return view('posts.update', ["posts" => $posts]);
    }
    //update operation p2
    public function update(Request $request, string $id):RedirectResponse{
        Posts::where('id', $id)->update([
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
        $post = Posts::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    //delete operation
    public function delete(Request $request, string $id):RedirectResponse{
        $posts = Posts::findOrFail($id)->delete();
        return redirect()->route('posts')->with('success', 'Posts Deleted Successfully');
    }
}
