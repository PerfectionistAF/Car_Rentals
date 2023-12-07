<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectiveViewController extends Controller
{
    //function to return home view
    public function home(){
        echo "ROUTING FROM HOME PAGE";
        echo "<br>";
        echo "DISPLAYING HOME VIEW";
        return view('home');
    }

    //function to return about view
    public function about_us(){
        echo "ROUTING FROM ABOUT US PAGE";
        echo "<br>";
        echo "DISPLAYING ABOUT US VIEW";
        return view('about_us');
    }

    //function to return contact view
    public function contact_us(){
        echo "ROUTING FROM CONTACT US PAGE";
        echo "<br>";
        echo "DISPLAYING CONTACT US VIEW";
        return view('contact_us');
    }
    //function to return form submission view
    public function submit(){
        echo "ROUTING FROM CONTACT US PAGE";
        echo "<br>";
        echo "DISPLAYING ABOUT US VIEW";
        return view('about_us');
    }
}
