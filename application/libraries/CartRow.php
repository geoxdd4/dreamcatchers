<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CartRow {

	var $product = NULL;
	var $quantity  = 0;
	
	
	public function getProduct(){
		return $product;
	}
	
	public function setProduct( $pProduct ){
		$this->product = $pProduct;
	}

	public function getQuantity(){
		return $quantity;
	}
	
	public function setQuantity( $pQuantity ){
		$this->quantity = $pQuantity;
	}	
	
	
}