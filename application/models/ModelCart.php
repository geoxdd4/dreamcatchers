<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCart extends CI_Model {

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	// get cart summary / first cart view
	public function getCartSummary(){
		$cart = $this->HelperSession->getCart();
		$listeProducts = $this->HelperCart->getProductsListForModelQuery( $cart ) ;
		
		if ( NULL == $listeProducts){
			return Array();
		}
		
		$query = $this->db->query("select reference, name, diameter, price, 0 as quantity, 0 as total 
								   from product where ( reference ) in ".$listeProducts);
		
		return $query->result();
	}
	
	
	//total price for all the products in cart
	public function getPrice(){
		
		$arrayKeys = array_keys( $this->helpersession->getCart()->get() );
		$total = 0;
		
		foreach($arrayKeys as $key){
			$product = new Product();
			$product->setReference( $key );
			$total += $this->getPriceByProduct( $product );
		}
		return $total;
    
	}

	//total price for a single product in cart
	public function getPriceByProduct($product){
		
		$reference = $product->reference;
		$quantity  = $this->helpersession->getCart()->get()[$reference];
		
		$query = $this->db->query("SELECT sum( price ) * ? as total  
								   FROM product WHERE reference = ? ", array($quantity ,$reference));		
		return $query->result()[0]->total;
	}

}