<?php
namespace USAePay\Paymentengine\Payrequests;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Confirm{

	public static function post($Data=array()){
		if(!array_key_exists("requestkey",$Data)) throw new SDKexception("Confirm post requires requestkey");

		$requestkey=$Data["requestkey"];
		unset($Data["requestkey"]);

		$Response_type="json";
		$Path="/paymentengine/payrequests/$requestkey/confirm";
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