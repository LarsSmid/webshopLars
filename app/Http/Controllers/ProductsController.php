<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    //

    public function index($id){
    	$products = Products::where('category_id', $id)->get();
    	return view('product')->with('products', $products);
    }

    //get product
    public function getProduct($id){
        $product = Products::where('id', $id)->get()->toArray();
        $product = $product[0];
        return view('edit_product')->with('product', $product);
    }

     //function to add product
    public function addProduct(Request $request)
    {
    	$name = $request->input('name');
    	$price = $request->input('price');
        $category_id = $request->input('category_id');

    	\DB::table('products')->insert(
		    ['name' => $name, 'price' => $price, 'category_id' => $category_id]
		);
		return $this->index($category_id);
    }

    //function to add a product
    public function editProduct(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $id = $request->input('id');

        \DB::table('products')->where('id', $id)
          ->update(['name' => $name, 'price' => $price]);

        $product = Products::where('id', $id)->get()->toArray();
        return $this->index($product[0]['category_id']);
    }

    //function to delete a product
    public function deleteProduct($id)
    {
        $product = Products::where('id', $id)->get()->toArray();

        \DB::table('products')->where('id', $id)->delete();

        return $this->index($product[0]['category_id']);
    }
}
