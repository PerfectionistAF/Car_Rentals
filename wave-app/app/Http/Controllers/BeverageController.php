<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BeverageController extends Controller
{
    //all beverages
    public function index(){
        $beverages = Beverage::all();
        return view("admin.beverages", ["beverages" => $beverages]);//view, merge data
    }
    //add Beverage operation p1
    public function create(){
        $categories = Category::all();
        return view('admin.addBeverage', ["categories" => $categories]);
    }
    /*all categories for dropdown menu
    public function add_beverage_categories(){
        $add_beverage_categories = Category::all();
        return view("admin.addBeverage", ["categories" => $add_beverage_categories]);//view, merge data
    }*/
    //add Beverage operation p2
    public function store(Request $request):RedirectResponse{
        $beverages = new Beverage();
        $beverages->title = $request->title; ///$request->(name of the field in the insert form)
        $beverages->content = $request->content;
        $beverages->price = $request->price;
        $beverages->published = $request->has('published');
        $beverages->special = $request->has('special');
        $beverages->item_category = $request->item_category;//foreign key
        $beverages->save();

        return redirect()->route('beverages.html')->with('added_success', 'Beverage Added Successfully');
    }
}
