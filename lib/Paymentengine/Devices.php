<?php
namespace USAePay\Paymentengine;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Devices{

	public static function get($Data=array()){
		$Response_type="json";
		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
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
		$Path="/paymentengine/devices";
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

	public static function delete($Data=array()){
			if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Devices delete requires devicekey");

		$Response_type="json";
		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
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

	public static function put($Data=array()){
			if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Devices put requires devicekey");

		$Response_type="json";
		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
		}

		try{
			return API::runCall('put',$Path,$Data,$Params,$Response_type);
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