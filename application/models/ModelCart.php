<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCart extends CI_Model {

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	// get cart summary / first cart view
	public function getCartSummary(){
		$cart = $this->helpersession->getCart();
		$listeProducts = $this->helpercart->getProductsListForModelQuery( $cart ) ;
		
		if ( NULL == $listeProducts){
			return Array();
		}
		
		$query = $this->db->query("select reference, name, diameter, price, 0 as quantity, 0 as total 
								   from product where ( reference ) in ".$listeProducts);
		
		$rows = $query->result();
		$items = $cart->getItems();
		
		foreach(  $rows as $row  ){
			$currentReference = $row->reference;
			$quantity = $items[$currentReference];
			$price = $row->price;
			
			$row->quantity = $quantity;
			$row->total = $this->helperprice->format($quantity * $price);
			$row->price = $this->helperprice->format($price);
		}
		
		return $rows;
	}
	
	
	//total price for all the products in cart
	public function getPrice(){
		
		$arrayKeys = array_keys( $this->helpersession->getCart()->getItems() );
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
		$items     = $this->helpersession->getCart()->getItems();
		$quantity  = $items[$reference];
		
		$query = $this->db->query("SELECT sum( price ) * ? as total  
								   FROM product WHERE reference = ? ", array($quantity ,$reference));
		$result = $query->result();	
		return $result[0]->total;
	}

}