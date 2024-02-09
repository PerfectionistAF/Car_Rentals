<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
//use App\Http\Controllers\Input;
//use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //last 3 categories
    public function tail(){
        $tail = Category::latest()->take(3);
        //return view('mainpage.index', compact('tail'));
        return view("mainpage.index", ["tail" => $tail]);//pass to another session
    }
    //all categories
    public function index(){
        $categories = Category::all();
        return view("admin.categories", ["categories" => $categories]);//view, merge data
    }
    //add Category operation p1
    public function create(){
        return view('admin.addCategory');
    }
    //add Category operation p2
    public function store(Request $request):RedirectResponse{
        /*  //IMPROVEMENTS
        $validated = $request->validate(
            ['category' => 'required'|'string'|'unique:categories'],
            ['category' => 'Error: Category is required to be unique']);
        */
        $categories = new Category();
        $categories->category = $request->category; ///$request->(name of the field in the insert form)
        $categories->save();

        return redirect()->route('categories.html')->with('added_success', 'Category Added Successfully');
    }
    //delete Category operation
    public function destroy(Request $request){//:RedirectResponse{
        $id=$request->id;
        $category = Category::where('id', $id)->pluck('category');  //["Hearty Soups"]
        $category = $category[0]; //output of type array, so always get first element
        $cat = Beverage::where('item_category', $category);//retreive models in Beverage that have the same category as request
        //dd($category);
        //echo $category;
        //echo $cat->count();
        //check count to see if there's data or not
        if($cat->count() > 0){ //there's data in the model don't delete
            return redirect()->route('categories.html')->with('deleted_error', 'Category Contains Data, Delete Failed');
        }
        else{
            Category::where('id', $id)->delete();
            return redirect()->route('categories.html')->with('deleted_success', 'Category Deleted Successfully');
        }
    }
    //////////////////////////////////ERROR//////////////////////////////////
    //show all beverages of this category
    public function cat_beverages(){
        /*$category = Category::find(7); // Retrieve a category by its ID ///not working
        $beverages = $category->beverages;
        foreach($beverages as $row){
            echo $row->title . ":" . $row->item_category;
            echo "<br>";
        }*/
        $name = "Hot Drinks";
        $cat = Beverage::where('item_category', $name);//retreive first model
        echo $cat->count();
        //$beverages = $cat->beverages;
            foreach($cat as $row){
                echo $row->title . ":" . $row->item_category;
                echo "<br>";
            }
    }
    //////////////////////////////////ERROR//////////////////////////////////
    //edit Category operation p1
    public function edit(string $id){
        $categories = Category::findOrFail($id);
        return view('admin.editCategory', ["categories" => $categories]);
    }
    //edit Category operation p2
    public function update(Request $request, string $id):RedirectResponse{
        Category::where('id', $id)->update([
            //column name in db  => name from request
            'category'=>$request->category
        ]);
        return redirect()->route('categories.html')->with('edited_success', 'Category Updated Successfully');
    }
}
