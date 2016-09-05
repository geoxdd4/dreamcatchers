<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product {

	var $reference = NULL;
	
	public function getReference(){
		return $this->reference;
	}

	public function setReference( $reference ){
		$this->reference = $reference;
	}	
	
}