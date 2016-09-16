<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User {

	var $email = NULL;
	var $name  = NULL;
	var $surname = NULL;
	
	public function getEmail(){
		return $this->email; 
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getName(){
		return $this->name; 
	}
	
	public function setName($name){
		$this->name = $name;		
	}
	
	public function getSurname(){
		return $this->surname;
	}
	
	public function setSurname($surname){
		$this->surname = $surname;		
	}	
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;		
	}
	
}