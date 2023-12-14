<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    //method index to print text

    public function index(){
        echo "Hello from Customer Controller";
        echo "<br>";
        //$custs = DB::table("customers")->get();   //select * from customers
        $custss = Customers::get();//get data from model
        $custs = Customers::all();//get all data from model
        return view("customers.index", ["customers" => $custs]);
        /*foreach($custs as $val){
            echo $val->customer_name . " " . $val->email . "<br>";
        }*/
    }
    public function create(){
        $customer = new Customers();
        $customer->customer_name="Sara";
        $customer->email="sara@exampleunique.com";
        $customer->birth_date="12/11/24";
        $customer->save();

        return response("New Customer Added Successfully");
    }
    public function data(){
        return view('customers');
    }
}
