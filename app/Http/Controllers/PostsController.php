<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //index
    public function index(){
        echo "Hello from Posts Controller";
        echo "<br>";
        $posts = Posts::all();//get all data from model
        return view("posts.index", ["posts" => $posts]);;
    }

    //create
    public function create(){
        $post = new Posts();
        $post->post_title="Initial Post";
        $post->post_content="This is an initial post that shall be inserted in the posts table";
        $post->post_date="12/11/24";
        //$post->user_id="00";
        
        $post->save();

        return response("New Post Added Successfully");
    }

    //insert form view
    public function insertform(){

    }

    //insert
    public function insert(){

    }
}
