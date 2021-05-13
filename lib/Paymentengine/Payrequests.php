<?php
namespace USAePay\Paymentengine;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Payrequests{

	public static function post($Data=array()){
		$Response_type="json";
		$Path="/paymentengine/payrequests";
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

	public static function get($Data=array()){
		$Response_type="json";
		$Path="/paymentengine/payrequests";
		$Params=[];

		if(array_key_exists("requestkey",$Data)){
			$Path.='/'.$Data["requestkey"];
			unset($Data["requestkey"]);
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

	public static function delete($Data=array()){
			if(!array_key_exists("requestkey",$Data)) throw new SDKexception("Payrequests delete requires requestkey");

		$Response_type="json";
		$Path="/paymentengine/payrequests";
		$Params=[];

		if(array_key_exists("requestkey",$Data)){
			$Path.='/'.$Data["requestkey"];
			unset($Data["requestkey"]);
		}

		try{
			return API::runCall('delete',$Path,$Data,$Params,$Response_type);
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