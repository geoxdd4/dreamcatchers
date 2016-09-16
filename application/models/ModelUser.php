<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	
	public function getUserByLoginAndPassword($user){
		
		$email    = $user->getEmail();
		$password = $user->getPassword();
		
		$query = $this->db->query("SELECT * FROM user WHERE email = ? and password = MD5(?)",
								   array($email ,$password) );		
		
		$result = $query->result();
		
		if ( !empty( $result )){
			$userResult = new User();
			$userResult->setEmail( $result[0]->email );
			$userResult->setName( $result[0]->name );
			$userResult->setSurName( $result[0]->surname );
			return $userResult;
		}
		return NULL;
	}
	

}