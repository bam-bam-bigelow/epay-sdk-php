<?php
namespace USAePay\Transactions;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Send{

	public static function post($Data=array()){
		if(!array_key_exists("trankey",$Data)) throw new SDKexception("Send post requires trankey");

		$trankey=$Data["trankey"];
		unset($Data["trankey"]);

		$Response_type="json";
		$Path="/transactions/$trankey/send";
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