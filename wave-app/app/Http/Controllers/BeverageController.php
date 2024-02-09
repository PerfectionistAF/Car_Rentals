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
        //ddd(request()->all());
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $beverages = new Beverage([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'published' => $request->get('published'),
            'special' => $request->get('special'),
            'item_category' => $request->get('item_category'),//foreign key
            'image' => $imageName,
        ]);
        if($beverages->published === 'on'){
            $beverages->published = 1;
        }
        else{
            $beverages->published = 0;
        }
        if($beverages->special === 'on'){
            $beverages->special = 1;
        }
        else{
            $beverages->special = 0;
        }
        $beverages->save();

        return redirect()->route('beverages.html')->with('added_success', 'Beverage Added Successfully');
    }
    //delete Beverage operation
    public function destroy(Request $request):RedirectResponse{
        $id=$request->id;
        Beverage::where('id', $id)->delete();
        return redirect()->route('beverages.html')->with('deleted_success', 'Beverage Deleted Successfully');
    }
    //edit Beverage operation p1
    public function edit(string $id){//Beverage $beverage){
        $beverages = Beverage::findOrFail($id);
        $categories = Category::all();
        return view('admin.editBeverage', ["categories" => $categories, "beverages" => $beverages]);
        //return view('admin.editBeverage', compact('beverage'));
    }
    //edit Beverage operation p2
    public function update(Request $request, string $id):RedirectResponse{
        //ddd(request()->all())//get all input except _token upon mass assignment
        $input = $request->except(['_token', 'published', 'special']);  
  
        if ($image = $request->file('image')) {
            $publicPath = 'images/';
            $imageName = time(). "." . $image->getClientOriginalExtension();////imagename
            $image->move($publicPath, $imageName);///same as add
            $input['image'] = "$imageName";///save the new one
        }else{
            unset($input['image']);
        }
        $request->published = $request->input('published') === 'on' ? 1 : null;
        $request->special = $request->input('special') === 'on' ? 1 : null; //same as if condition

        Beverage::where('id', $id)->update($input);
        Beverage::where('id', $id)->update([
            'published' => $request->published,
            'special' => $request->special
        ]
        );

        return redirect()->route('beverages.html')->with('edited_success', 'Beverage Updated Successfully');
    }
}
