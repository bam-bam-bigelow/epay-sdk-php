<?php
namespace USAePay\Customers;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Billing_schedules{

	public static function get($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedules get requires custkey");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/billing_schedules";
		$Params=[];

		if(array_key_exists("billing_schedule_key",$Data)){
			$Path.='/'.$Data["billing_schedule_key"];
			unset($Data["billing_schedule_key"]);
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
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedules post requires custkey");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/billing_schedules";
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
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedules delete requires custkey");
			if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Billing_schedules delete requires billing_schedule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/billing_schedules";
		$Params=[];

		if(array_key_exists("billing_schedule_key",$Data)){
			$Path.='/'.$Data["billing_schedule_key"];
			unset($Data["billing_schedule_key"]);
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
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedules put requires custkey");
			if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Billing_schedules put requires billing_schedule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/billing_schedules";
		$Params=[];

		if(array_key_exists("billing_schedule_key",$Data)){
			$Path.='/'.$Data["billing_schedule_key"];
			unset($Data["billing_schedule_key"]);
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