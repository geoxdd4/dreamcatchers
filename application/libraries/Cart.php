<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart {

    var $items = Array();
	
	public function add( $product ){
		
		$reference = $product->reference;
		
		if ( $this->productReferenceExists( $product ) ){
			
			
			
		}else{
			$cartRow = new row();
			$cartRow->setProduct( $product );
			$cartRow->setQuantity( 1 );
			$items->push( $cartRow );
		}
		
	}
	
	public function remove( $product ){
		
	}
	
	public function getPrice(){
		
	}
	
	private function productExists( $product ){
		
		$ret = false;
		
		foreach( $items as $item ){
			$productFromCartRow = $item->product;
			if ( $productFromCartRow->reference == $product->reference ){
				$ret = true;
			}
		}
		
		return $ret;
		
	}
	
	private function updateQuantity(){
		
	}
	
	
	
}