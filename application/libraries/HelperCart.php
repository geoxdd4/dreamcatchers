<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HelperCart {

    public function getProductsListForModelQuery( $cart )
    {
		
		$listProducts = NULL;
		$items = $cart->get();
		
		if ( empty($items) ){
			return $listProducts;
		} 
		
		$arrayKeys = array_keys( $this->helpersession->getCart()->get() );

		foreach (  $arrayKeys as $arrayKey  ){
			if ( NULL == $listProducts ){
				$listProducts = "( " . $arrayKey ; 
			}
			$listProducts += "," . $arrayKey ; 
		}
		return $listProducts;
    }
	
}