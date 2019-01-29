<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function add($id, Request $request){
        $amount = $request->input('amount');
        //make new cart object
        $cart = new Cart();
        $cart->addItem($id, $amount);
        return redirect()->back();
    }
    /*
    0 = all products
    1 = totalPrice
    2 = total amount
    3 = items in shopping cart
    */
    public function getAll(){
        $cart = new Cart();
        $cart->getItems();
        $items = array();
        $items['data'] = array();
        foreach($cart->getItems()[0] as $dbItem){
            $items['data'][$dbItem['id']]['id'] = $dbItem['id'];
            $items['data'][$dbItem['id']]['name'] = $dbItem['name'];
            $items['data'][$dbItem['id']]['amount'] = $cart->getItems()[3][$dbItem['id']]['amount'];
            $items['data'][$dbItem['id']]['totalPrice'] = $cart->getItems()[3][$dbItem['id']]['amount'] * $dbItem['price'];
        }
        $items['totalPrice'] = $cart->getItems()[1];
        $items['totalAmount'] = $cart->getItems()[2];
     
        return view('shoppingCart')->with('items', $items);
    }

    public function updateItem($id, Request $request){
        $amount = $request->input('amount');
        //make new cart object
        $cart = new Cart();
        $cart->updateItem($id, $amount);
        //get all product and go to view
        return $this->getAll();
    }

    public function deleteItem($id){
        //make new cart object
        $cart = new Cart();
        $cart->deleteItem($id);
        //get all product and go to view
        return $this->getAll();
    }

    public function placeOrder(){
        $user = Auth::user();
        
        $cart = new Cart();
        $cart->orderItems($user['id']);

        return redirect()->back();
    }
}
