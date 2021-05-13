<?php
namespace USAePay\Paymentengine\Devices;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Kick{

	public static function post($Data=array()){
		if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Kick post requires devicekey");

		$devicekey=$Data["devicekey"];
		unset($Data["devicekey"]);

		$Response_type="json";
		$Path="/paymentengine/devices/$devicekey/kick";
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