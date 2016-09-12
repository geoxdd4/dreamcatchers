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
		
	}
	
	public function getQuantity(){
		
		$arrayKeys = array_keys( $this->get() );
		$total = 0;
		
		foreach($arrayKeys as $key){
			$total += $this->get()[ $key ];
		}
		return $total;
	}
	
	public function getSize(){
		
		return count( $this->items );
		
	}
	
	public function get(){
		$total = 0;
		return $this->items;
	}
	
}