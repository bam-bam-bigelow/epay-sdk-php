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
 * API
 *
 * Functions for handling general API settings and options
 *
 * Contact: 706@usaepay.com
 */

namespace USAePay;

class API
{
  static $config=False;
  
  static $timeout='45';
  
  static $endpoint_key='v2';
  
  static $subdomain='secure';

	static function setAuthentication($api_key, $api_pin) {
		/// Configure authorization: 
		if(!self::$config) self::$config = Configuration::getDefaultConfiguration();
	  self::$config->setAuthorization($api_key, $api_pin);
		
	}
  
  static function setTimeOut($timeout_value){
    self::$timeout = $timeout_value;
  }
  
  static function setEndpointKey($endpoint_key_value){
    self::$endpoint_key = $endpoint_key_value;
    if(!self::$config) self::$config = Configuration::getDefaultConfiguration();
    self::$config->setHost("https://".self::$subdomain.".usaepay.com/api/".self::$endpoint_key);
  }
  
  static function setSubdomain($subdomain_value){
    self::$subdomain = $subdomain_value;
    if(!self::$config) self::$config = Configuration::getDefaultConfiguration();
    self::$config->setHost("https://".self::$subdomain.".usaepay.com/api/".self::$endpoint_key);
  }
  
  static function ping($subdomain='all'){
		switch($subdomain){
			case 'all':
				$subdomains=array('www-01','wwww-02','www-03','www-04');
				$mh=curl_multi_init();
				foreach($subdomains as $subdomain){
					$url='https://'.$subdomain.'.usaepay.com/ping';
					$curl_handles[$subdomain]=array(
						'handle'=>curl_init($url),
						'subdomain'=>$subdomain
					);
					curl_setopt($curl_handles[$subdomain]['handle'], CURLOPT_URL,$url);
					curl_setopt($curl_handles[$subdomain]['handle'], CURLOPT_RETURNTRANSFER, true);
					curl_multi_add_handle($mh,$curl_handles[$subdomain]['handle']);
				}
				
				do {
					$status = curl_multi_exec($mh, $active);
					if ($active) {
						curl_multi_select($mh);
					}
				} while ($active && $status == CURLM_OK);
				
				foreach($curl_handles as $handle){
					$extra_info = curl_getinfo($handle['handle']);
					$response = curl_multi_getcontent($handle['handle']);
					$return_data[] = array(
						'subdomain'=>$handle['subdomain'],
						'status'=>(substr($response,0,2)=='UP'?'UP':'DOWN'),
						'total_call_time'=>$extra_info['total_time']
					);
				}
				return $return_data;
			case 'sandbox':
			case 'secure':
			case 'www':
			case 'www-01':
			case 'www-02':
			case 'www-03':
			case 'www-04':
				$baseURL = 'https://'.$subdomain.'.usaepay.com/ping';
				$curl = curl_init($baseURL);
				curl_setopt($curl, CURLOPT_URL, $baseURL);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$curl_response = curl_exec($curl);
				$extra_info=curl_getinfo($curl);
				curl_close($curl);
				$status=array(
					'subdomain'=>$subdomain,
					'status'=>(substr($curl_response,0,2)=='UP'?'UP':'DOWN'),
					'total_call_time'=>$extra_info['total_time']
				);
				return $status;
			default:
				return "Subdomain Not Found, Please check our high availability documentation.";
		}
  }
}