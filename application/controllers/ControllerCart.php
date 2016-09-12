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
		
		$product = new Product();
		$product->setReference( $reference );

		$cart = $this->helpersession->getCart();		
		$cart->add( $product );
		$this->helpersession->setCart( $cart );
		
		$productFromDb      = $this->ModelProduct->getByReference( $reference );
		$productPriceFromDb = $this->ModelCart->getPriceByProduct( $product );
		$cartPriceFromDb    = $this->ModelCart->getPrice( );
 		//gestion erreurs

		$data['title'] = "Panier - Ajout";
		$data['contents'] = "ViewCartAdd";
		$data['reference'] = $reference;
		$data['productFromDb'] = $productFromDb;
		$data['productPriceFromDb'] = $productPriceFromDb;
		$data[ 'cartPriceFromDb' ] = $cartPriceFromDb;
		
		$this->load->view('templates/ViewMain',$data);
		
	}
		
}
