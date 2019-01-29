<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    //function to get all categories
    public function index()
    {
        $categories = Categories::all();
        return view('home')->with('categories', $categories);
    }

    //function to get all categories sync
    public function sortCategories()
    {
        $categories = Categories::orderBy('name')->get();
        return view('home')->with('categories', $categories);
    }

    //function to get all categories sync
    public function sortCategoriesDesc()
    {
        $categories = Categories::orderBy('name', 'desc')->get();
        return view('home')->with('categories', $categories);
    }
    //get category
    public function getCategory($id){
        $category = Categories::where('id', $id)->get()->toArray();
        $category = $category[0];
        return view('edit_category')->with('category', $category);
    }

     //function to add category
    public function addCategory(Request $request)
    {
    	$name = $request->input('name');
    	\DB::table('categories')->insert(
		    ['name' => $name]
		);
		return $this->index();
    }

    //function to edit category
    public function editCategory(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');

        \DB::table('categories')->where('id', $id)
          ->update(['name' => $name]);

        return $this->index();
    }

    //function to delete category
    public function deleteCategory($id)
    {
        $category = Categories::where('id', $id)->get();
        Categories::where('id', $id)->delete();
        return $this->index();
    }
}
