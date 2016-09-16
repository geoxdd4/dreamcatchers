<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerCart extends CI_Controller {

	public function index()
	{	
		
		$data['title'] = "Panier";
		$data['contents'] = "ViewCartSummary";

		$this->load->view('templates/ViewMain',$data);
	}
	
	public function ajaxGet(){
		$cartSummary = $this->ModelCart->getCartSummary();
		echo json_encode( $cartSummary );
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

	public function ajaxAdd(  ){
		
		//add ref
		//$post = json_decode($this->security->xss_clean($this->input->raw_input_stream));
		if (!isset($_POST['reference'])){
			return;
		}
		
		$reference = $_POST['reference'];
		$cart = $this->helpersession->getCart();
		
		$product = new Product();
		$product->setReference( $reference );
		
		$cart->add( $product );
		$this->helpersession->setCart($cart);
		
		$cartSummary = $this->ModelCart->getCartSummary();
		echo json_encode( $cartSummary );
		
	}
	
	public function ajaxRemove(){
		
		//add ref
		//$post = json_decode($this->security->xss_clean($this->input->raw_input_stream));
		if (!isset($_POST['reference'])){
			return;
		}
		
		$reference = $_POST['reference'];
		$cart = $this->helpersession->getCart();
		
		$product = new Product();
		$product->setReference( $reference );
		
		$cart->remove( $product );
		$this->helpersession->setCart($cart);
		
		$cartSummary = $this->ModelCart->getCartSummary();
		echo json_encode( $cartSummary );
		
	}
	
	public function connection(){
		$data['title'] = "Panier";
		$data['contents'] = "ViewCartConnection";
		$this->load->view('templates/ViewMain',$data);	
	}
		
}
