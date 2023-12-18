<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    //method index to print text

    public function index(){
        echo "<h1 style= font-size:30>Hello from Customer Controller</h1>";
        echo "<br><br>";
        //$custs = DB::table("customers")->get();   //select * from customers
        $custss = Customers::get();//get data from model
        $custs = Customers::all();//get all data from model
        return view("customers.index", ["customers" => $custs]);
        /*foreach($custs as $val){
            echo $val->customer_name . " " . $val->email . "<br>";
        }*/
    }
    public function create(){
        //insert data statically----session 7
        /*$customer = new Customers();
        $customer->customer_name="Sara";
        $customer->email="sara@exampleunique.com";
        $customer->birth_date="12/11/24";
        $customer->save();

        return response("New Customer Added Successfully");*/

        //insert data dynamically:STEP 1: MAKE VIEW----session 8
        return view('customers.insert');

    }
    public function store(Request $request):RedirectResponse{//request to receive data from form
        //insert data dynamically:STEP 2: ACTUALLY INSERT THE DATA----session 8
        $customer = new Customers();
        $customer->customer_name=$request->customer_name;  ///$request->(name of the field in the insert form)
        $customer->email=$request->customer_email;
        $customer->save();

        //return response("New Customer Added Successfully");//WITHOUT REDIRECT RESPONSE
        //return redirect('/customers');
        return redirect()->route('customers')->with('success', 'Customer Added Successfully');
    }
    public function edit(string $id){//take id as string from route
        $customer = Customers::findOrFail($id);//check if id is present
        return view('customers.update', ["customers" => $customer]);
    }
    public function update(Request $request, string $id):RedirectResponse{
        Customers::where('id', $id)->update([
            //column name in db  => name from request
            'customer_name'=>$request->customer_name,
            'email'=>$request->customer_email
        ]);
        //return response('Customer Updated Successfully');
        return redirect()->route('customers')->with('success', 'Customer Updated Successfully');
    }
    public function customer_data(){
        return view('customers');
    }
}
