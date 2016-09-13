<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerCart extends CI_Controller {

	var $cartName = "CART";

	public function index()
	{	
		$data['title'] = "Panier";
		$data['contents'] = "ViewCartSummary";
		
		$cart = $this->HelperSession->getCart();
		
		
		
		
		//reference
		//libelle
		//diam
		//prix
		//qte
		//total
		
		
		
		$this->load->view('templates/ViewMain',$data);
	}
	
	public function add( $reference )
	{
		//20 : reference length as in DB
		$reference = substr( $reference, 0, 20 );
		
		// main info
		$data['title'] = "Panier - Ajout";
		$data['reference'] = $reference;
		
		//product in db ?
		$productFromDb      = $this->ModelProduct->getByReference( $reference );
		//error : unknown product
		if ( empty( $productFromDb ) ){
			$data['contents'] = "ViewCartAddError";
			$this->load->view('templates/ViewMain',$data);
			return;
		}
		
		//normal process
		$product = new Product();
		$product->setReference( $reference );

		$cart = $this->helpersession->getCart();		
		$cart->add( $product );
		$this->helpersession->setCart( $cart );
		
		$productPriceFromDb = $this->ModelCart->getPriceByProduct( $product );
		$cartPriceFromDb    = $this->ModelCart->getPrice( );
 		
		$data['contents'] = "ViewCartAdd";
		$data['productFromDb'] = $productFromDb;
		$data['productPriceFromDb'] = $productPriceFromDb;
		$data[ 'cartPriceFromDb' ] = $cartPriceFromDb;
		$this->load->view('templates/ViewMain',$data);
		
	}
		
}
