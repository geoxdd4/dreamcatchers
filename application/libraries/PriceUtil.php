<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PriceUtil {

    public function format( $number )
    {
		$ret = number_format((float)$number, 2, '.', '');
		$ret = str_replace( ".", ",",$ret );
		return $ret;	
    }
	
}