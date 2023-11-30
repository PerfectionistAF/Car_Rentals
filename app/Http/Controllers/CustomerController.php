<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //method index to print text

    public function index(){
        return "Hello from Customer Controller";
    }

    public function data(){
        return view('submitform');
    }
}
