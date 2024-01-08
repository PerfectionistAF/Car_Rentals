<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    //retreive orders in order controller
    public function cust_orders(){
        $cust_orders = Customer::find(1)->orders;
        
        foreach($cust_orders as $order){
            echo $order->order_description . ":" . $order->total_amount;
            echo "<br>";
        }
    }

    //retreive customers in customer controller
    public function orders_cust(){
        $customer = Order::find(1)->customer;
        echo $customer->customer_name;
        echo "<br>";
    }
}
