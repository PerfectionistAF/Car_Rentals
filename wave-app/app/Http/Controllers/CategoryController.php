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
    public function destroy(Request $request):RedirectResponse{
        $cat_bev = Beverage::where('item_category', $request->input('category'))->count();
        $id=$request->id;
        //find count of beverages in this category
        //$cat_bev = Category::find($category)->beverages;
        if($cat_bev == 0){ //has no data
            Category::where('id', $id)->delete();
            return redirect()->route('categories.html')->with('deleted_success', 'Category Deleted Successfully');
        }
        else{
            return redirect()->route('categories.html')->with('deleted_error', 'Category Contains Data, Delete Failed');
        }
    }
    //show all beverages of this category////ERROR
    public function cat_beverages(){
        $name = "Hot Drinks";
        $category = Category::where('category', $name)->first();
        if ($category) {
            $beverages = $category->beverages;
            foreach($beverages as $row){
                echo $row->title . ":" . $row->item_category;
                echo "<br>";
            }
        }
        //$beverages = $category->beverages;
        else{
            echo "Not found";
        }
    }
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
