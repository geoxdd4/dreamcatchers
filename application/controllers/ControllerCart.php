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
		
		if ( ! $this->existsInSession() ){
			$cart = new Cart();
			
			$product = new Product();
			$product->setReference( $reference );
			$cart->add( $product );
			
			$this->session->set_userdata($this->cartName, $cart );
			
			echo 'nouveau panier';
			
		}else{
			
			
			echo 'pas besoin de nouveau panier';
			
			
			
		}
		
		//$this->session->userdata("SESSION_NAME");
		
		$this->load->view('templates/ViewMain',$data);
		
	}
	
	public function existsInSession(){
		return null !== ( $this->session->userdata($this->cartName) );
	}
	
}
