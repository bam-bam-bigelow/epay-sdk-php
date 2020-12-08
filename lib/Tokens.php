<?php
namespace USAePay;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Tokens{

	public static function post($Data=array()){
		$Path="/tokens";
		$Params=[];

		try{
			return API::runCall('post',$Path,$Data,$Params);
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

	public static function get($Data=array()){
		$Path="/tokens";
		$Params=[];

		if(array_key_exists("cardref",$Data)){
			$Path.='/'.$Data["cardref"];
			unset($Data["cardref"]);
		}

		try{
			return API::runCall('get',$Path,$Data,$Params);
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