<?php
namespace USAePay\Batches;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Transactions{

	public static function get($Data=array()){
		if(!array_key_exists("batch_key",$Data)) throw new SDKexception("Transactions get requires batch_key");

		$batch_key=$Data["batch_key"];
		unset($Data["batch_key"]);

		$Response_type="json";
		$Path="/batches/$batch_key/transactions";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];
		if(array_key_exists('return_bin',$Data)) $Params['return_bin']=$Data['return_bin'];

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
}
?>