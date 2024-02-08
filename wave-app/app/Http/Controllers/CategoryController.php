<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $id=$request->id;
        Category::where('id', $id)->delete();
        return redirect()->route('categories.html')->with('deleted_success', 'Category Deleted Successfully');
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
