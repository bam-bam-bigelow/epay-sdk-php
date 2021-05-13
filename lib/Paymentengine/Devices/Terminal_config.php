<?php
namespace USAePay\Paymentengine\Devices;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Terminal_config{

	public static function get($Data=array()){
		if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Terminal_config get requires devicekey");

		$devicekey=$Data["devicekey"];
		unset($Data["devicekey"]);

		$Response_type="json";
		$Path="/paymentengine/devices/$devicekey/terminal-config";
		$Params=[];

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

	public static function put($Data=array()){
		if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Terminal_config put requires devicekey");

		$devicekey=$Data["devicekey"];
		unset($Data["devicekey"]);

		$Response_type="json";
		$Path="/paymentengine/devices/$devicekey/terminal-config";
		$Params=[];

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