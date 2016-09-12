<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HelperSession {

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
	
}