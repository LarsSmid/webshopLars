<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;

class Cart
{
    //
    protected $items;
    public function __construct(){
    	$this->items = session()->get('cart');
    	if(empty($this->items)){
    		$this->items = [];
    	}
    }

    /*
		Add function
    */
	public function addItem($id, $amount){
		if(isset($this->items[$id])){
			$cartItem = $this->items[$id];
			$cartItem['amount'] += $amount;
		}else{
			$cartItem = ['id' => $id, 'amount' => $amount];
		}
		$this->items[$id] = $cartItem;

		session()->put('cart', $this->items);
	}

	/*
		Delete function
    */
	public function deleteItem($id){
		unset($this->items[$id]);

		session()->put('cart', $this->items);
	}

	/*
		Get function for all items
    */
	public function getItems(){
		$totalAmount = 0;
		$totalPrice = 0;
		$existingItems = array();
		foreach ($this->items as $item) {
			$existingItem = Products::find($item['id'])->toArray();
			$amount[] = $item['amount']; 
			$price[] = $existingItem['price'] * $item['amount'];
			if($item['amount'] == 0){
				$this->deleteItem($item['id']);
			}
			$existingItems[] = $existingItem;

		}

		if(isset($price)){
			$totalPrice = array_sum($price);
		}
		if(isset($amount)){
			$totalAmount = array_sum($amount);
		}
		return array($existingItems, $totalPrice, $totalAmount, $this->items);
	}

	/*
		Update function
    */
	public function updateItem($id, $amount){
		$this->items[$id]['amount'] = $amount;

		session()->put('cart', $this->items);
	}

	/*
		To database function
    */
	public function orderItems($userId){
		$totalAmount = 0;
		$totalPrice = 0;
		$existingItems = array();
		$insertValue = array();
		foreach ($this->items as $item) {
			$existingItem = Products::find($item['id'])->toArray();
			$insertValue[$existingItem['id']]['name'] = $existingItem['name'];
			$insertValue[$existingItem['id']]['amount'] = $item['amount'];
			$insertValue[$existingItem['id']]['price'] = $existingItem['price'];
			$price[] = $existingItem['price'] * $item['amount'];
			if($item['amount'] == 0){
				$this->deleteItem($item['id']);
			}
			$existingItems[] = $existingItem;
		}

		if(isset($price)){
			$totalPrice = array_sum($price);
		}
		if(isset($insertValue)){
			$order = \DB::table('orders')->insertGetId( ['user_id' => $userId, 'total_price' => $totalPrice] );

			foreach ($insertValue as $value) {
				\DB::table('order_lines')->insert(
				    ['order_id' => $order, 'product_name' => $value['name'], 'product_price' => $value['price'], 'amount' => $value['amount']]
				);
			}
		}
		
		session()->put('cart', array());
	}
}

