<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HelperSession {

	/*CART*/
    public function getCart(){
			
		$cart = new Cart();
		if ( isset( $_SESSION['cart'] ) ){
			$cart = unserialize( $_SESSION['cart'] );
		}
		return $cart;
    }
	
	public function setCart( $cart ){
		$_SESSION['cart'] = serialize($cart);
	}
	
	/*USER*/
	public function getUser(){
		$user = new User();
		if ( isset( $_SESSION['user'] ) ){
			$user = unserialize( $_SESSION['user'] );
		}
	}
	
	public function setUser( $user ){
		$_SESSION['user'] = serialize($user);
	}
	
}