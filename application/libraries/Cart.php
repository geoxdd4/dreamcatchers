<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart {

    var $items = array();
	
	public function add( $product ){
		
		$reference = $product->reference;
		
		if ( !array_key_exists( $product->reference, $this->items ) ){
			$this->items[ $product->reference ] = 1;
		}else{
			$quantity = $this->items[ $product->reference ] + 1;
			$this->items[ $product->reference ] = $quantity ;	
		}	
	}
	
	public function remove( $product ){
		
	}
	
	public function getPrice(){
		
	}
	
	public function get(){
		return $this->items;
	}
	
}