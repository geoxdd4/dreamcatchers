<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerConnection extends CI_Controller {

	public function index()
	{	
		
		$data['title'] = "Panier";
		$data['contents'] = "ViewCartConnection";
		
		$this->form_validation->set_rules (	'email',    'email',    'required' );
		$this->form_validation->set_rules (	'password', 'password', 'required|callback_userExists' );
		
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
	
	public function userExists($str){

		$this->form_validation->set_message('userExists', 'email et/ou mot de passe incorrects.');

		if( !isset( $_POST['email'] ) || !isset( $_POST['password'] ) ){
			return false;
		}
		
		$userToTest = new User();
		$userToTest->setEmail( $_POST['email'] );
		$userToTest->setPassword( $_POST['password'] );
		
		$user = $this->ModelUser->getUserByLoginAndPassword( $userToTest );
		if ( NULL == $user){
			return false;
		}
		
		$this->helpersession->setUser( $user );
		
		return true;
		
	}
	
}
