<?php
namespace USAePay;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Customers{

	public static function get($Data=array()){
		$Response_type="json";
		$Path="/customers";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

		if(array_key_exists("custkey",$Data)){
			$Path.='/'.$Data["custkey"];
			unset($Data["custkey"]);
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
		$Path="/customers";
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
			if(!array_key_exists("custkey",$Data)) throw new SDKexception("Customers delete requires custkey");

		$Response_type="json";
		$Path="/customers";
		$Params=[];

		if(array_key_exists("custkey",$Data)){
			$Path.='/'.$Data["custkey"];
			unset($Data["custkey"]);
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
			if(!array_key_exists("custkey",$Data)) throw new SDKexception("Customers put requires custkey");

		$Response_type="json";
		$Path="/customers";
		$Params=[];

		if(array_key_exists("custkey",$Data)){
			$Path.='/'.$Data["custkey"];
			unset($Data["custkey"]);
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