<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProduct extends CI_Model {

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function get(){
		$query = $this->db->query("SELECT * FROM product ORDER BY date_update DESC");		
		return $query->result();
	}

	public function getByReference($reference){
		$query = $this->db->query("SELECT * FROM product WHERE reference = ? ", array($reference));		
		$result = $query->result();
		return empty( $result ) ? $result : $result[0];
	}

}