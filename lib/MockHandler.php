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

namespace USAePay;

class MockHandler
{
  static $endpoint_path='';
  
  static $response_data="Unset Response";
  
  static $request_data='';
  
  static $http_method='';
  
  static function setResponse($response){
    self::$response_data = json_encode($response);
  }
  
  static function mockCall($method,$path,$request=array()){
    self::$http_method=$method;
    self::$endpoint_path=$path;
    self::$request_data=$request;
    preg_match_all('/"number":"([0-9]+)"/',$request,$matches);
    if(count($matches)>0&&count($matches[1])>0){
      foreach($matches[1] as $cardnumber){
        if($cardnumber != '4000100011112224') throw new Exception\SDKException("MockHandler only accepts card number 4000100011112224.");
      }
    }
    return self::$response_data;
  }
  
  static function retrieveLastRequest(){
    $return_data=['method'=>self::$http_method,'path'=>self::$endpoint_path,'request'=>self::$request_data];
    return $return_data;
  }
  
  static function reset(){
    self::$expected_path='';
    self::$response_data="Unset Response";
    self::$request_data='';
  }
}