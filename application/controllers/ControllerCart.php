<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerCart extends CI_Controller {

	var $cartName = "CART";

	public function index()
	{	
		$data['title'] = "Panier";
		$data['contents'] = "ViewCart";
		$this->load->view('templates/ViewMain',$data);
	}
	
	public function add( $reference )
	{
				
		$data['title'] = "Panier - Ajout";
		$data['contents'] = "ViewCartAdd";
		$data['reference'] = $reference;
		
		$product = new Product();
		$product->setReference( $reference );
		$cart = NULL;
		
		if ( ! isset( $_SESSION['cart'] ) ){
			$cart = new Cart();
		}else{
			$cart = unserialize($_SESSION['cart']);
		}
		
		$cart->add( $product );
		$_SESSION['cart'] = serialize($cart);
			
		//print_r( $_SESSION['cart'] );
		$this->load->view('templates/ViewMain',$data);
		
	}
		
}
