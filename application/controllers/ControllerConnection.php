<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerConnection extends CI_Controller {

	public function index()
	{	
		
		$data['title'] = "Panier";
		$data['contents'] = "ViewCartConnection";
		
		$this->form_validation->set_rules (	'login',    'login',    'required' );
		$this->form_validation->set_rules (	'password', 'password', 'required|userExists' );
		
		if ( !$this->form_validation->run() )
		{
			$data['contents'] = "ViewCartConnection";
		}
		else
		{
			$data['contents'] = "ViewCartAdress";
		}
		
		$this->load->view('templates/ViewMain',$data);
		
	}
	
	public function userExists(){
		
		
		
	}
	
}
