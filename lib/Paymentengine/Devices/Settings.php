<?php
namespace AstroPayments\Paymentengine\Devices;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Settings{

	public function get($Data=array()){
		if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Settings get requires devicekey");

		$devicekey=$Data["devicekey"];
		unset($Data["devicekey"]);

		$Path="/paymentengine/devices/$devicekey/settings";
		$Params=[];

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

	public function put($Data=array()){
		if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Settings put requires devicekey");

		$devicekey=$Data["devicekey"];
		unset($Data["devicekey"]);

		$Path="/paymentengine/devices/$devicekey/settings";
		$Params=[];

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