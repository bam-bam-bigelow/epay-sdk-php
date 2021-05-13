<?php
/**
 * Configuration
 * PHP version 5
 *
 * @category Class
 * @package  USAePay
 * @author   CMcEwen
 */

/**
	* Mock
	*
	* Mock handler for API calls
	*
	* Contact: 706@usaepay.com
	*/

namespace USAePay\Middleware;;

class Webhook
{
	static function verify($json_payload,$signature,$signature_key){
		$expected_signature=hash_hmac('sha256',$json_payload,$signature_key);
		if($expected_signature==$signature) return true;
		else return false;
	}
}