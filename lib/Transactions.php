<?php
namespace USAePay;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Transactions{

	public static function get($Data=array()){
		$Response_type="json";
		$Path="/transactions";
		$Params=[];

		if(array_key_exists('return_origin',$Data)) $Params['return_origin']=$Data['return_origin'];
		if(array_key_exists('return_bin',$Data)) $Params['return_bin']=$Data['return_bin'];
		if(array_key_exists('return_fraud',$Data)) $Params['return_fraud']=$Data['return_fraud'];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];
		if(array_key_exists('fuzzy',$Data)) $Params['fuzzy']=$Data['fuzzy'];
		if(array_key_exists('filters',$Data)) $Params['filters']=$Data['filters'];

		if(array_key_exists("trankey",$Data)){
			$Path.='/'.$Data["trankey"];
			unset($Data["trankey"]);
		}

		try{
			return API::runCall('get',$Path,$Data,$Params,$Response_type);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}

	public static function post($Data=array()){
		$Response_type="json";
		$Path="/transactions";
		$Params=[];

		try{
			return API::runCall('post',$Path,$Data,$Params,$Response_type);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}
}
?>