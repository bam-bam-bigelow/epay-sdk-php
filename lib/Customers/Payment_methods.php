<?php
namespace USAePay\Customers;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Payment_methods{

	public static function get($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Payment_methods get requires custkey");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/payment_methods";
		$Params=[];

		if(array_key_exists("paymethod_key",$Data)){
			$Path.='/'.$Data["paymethod_key"];
			unset($Data["paymethod_key"]);
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

	public static function post($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Payment_methods post requires custkey");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/payment_methods";
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

	public static function delete($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Payment_methods delete requires custkey");
			if(!array_key_exists("paymethod_key",$Data)) throw new SDKexception("Payment_methods delete requires paymethod_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/payment_methods";
		$Params=[];

		if(array_key_exists("paymethod_key",$Data)){
			$Path.='/'.$Data["paymethod_key"];
			unset($Data["paymethod_key"]);
		}

		try{
			return API::runCall('delete',$Path,$Data,$Params);
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

	public static function put($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Payment_methods put requires custkey");
			if(!array_key_exists("paymethod_key",$Data)) throw new SDKexception("Payment_methods put requires paymethod_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/payment_methods";
		$Params=[];

		if(array_key_exists("paymethod_key",$Data)){
			$Path.='/'.$Data["paymethod_key"];
			unset($Data["paymethod_key"]);
		}

		try{
			return API::runCall('put',$Path,$Data,$Params);
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