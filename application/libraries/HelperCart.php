<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HelperCart {

    public function getProductsListForModelQuery( $cart )
    {
		
		$listProducts = NULL;
		$items = $cart->getItems();
		
		if ( empty($items) ){
			return $listProducts;
		} 
		
		$arrayKeys = array_keys( $items );

		foreach (  $arrayKeys as $arrayKey  ){
			if ( NULL == $listProducts ){
				$listProducts = " ( '" . $arrayKey ."'" ; 
			}else{
				$listProducts .= ", '" . $arrayKey . "' "; 
			}
		}
		$listProducts .= " ) ";
		return $listProducts;
    }
	
}