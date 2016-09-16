<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart {

    var $items = array();
	
	public function add( $product ){
		
		$reference = $product->getReference();
		
		if ( !array_key_exists( $reference, $this->items ) ){
			$this->items[ $product->reference ] = 1;
		}else{
			$quantity = $this->items[ $reference ] + 1;
			$this->items[ $reference ] = $quantity ;	
		}	
	}
	
	public function remove( $product ){
		//https://github.com/peachananr/loading-bar/blob/master/demo.html
		$reference = $product->getReference();
		
		if ( array_key_exists( $reference, $this->items ) ){
			$quantity = $this->items[$reference];
			$quantity --;
			$this->items[$reference] = $quantity;
			if ( $quantity <= 0){
				unset($this->items[$reference]);	
			}
		}
		
	}
	
	public function getQuantity(){
		$item = $this->getItems();
		$arrayKeys = array_keys( $item );
		$total = 0;
		
		foreach($arrayKeys as $key){
			$total += $item[ $key ];
		}
		return $total;
	}
	
	public function getSize(){
		
		return count( $this->items );
		
	}
	
	public function getItems(){
		return $this->items;
	}
	
}