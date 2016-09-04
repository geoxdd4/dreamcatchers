<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerCart extends CI_Controller {

	public function index()
	{
				
		$data['title'] = "Panier";
		$data['contents'] = "ViewCart";

		$this->load->view('templates/ViewMain',$data);
		
	}
	
	public function add( $reference )
	{
				
		$data['title'] = "Panier - Ajout";
		$data['contents'] = "ViewCart";
		$data['reference'] = $reference;
		
		$this->load->view('templates/ViewMain',$data);
		
	}
	
}
