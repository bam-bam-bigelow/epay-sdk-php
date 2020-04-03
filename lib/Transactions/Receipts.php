<?php
namespace AstroPayments\Transactions;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Receipts{

	public function get($Data=array()){
		if(!array_key_exists("trankey",$Data)) throw new SDKexception("Receipts get requires trankey");

		$trankey=$Data["trankey"];
		unset($Data["trankey"]);

		$Path="/transactions/$trankey/receipts";
		$Params=[];

		if(array_key_exists("receipt_key",$Data)){
			$Path.='/'.$Data["receipt_key"];
			unset($Data["receipt_key"]);
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
}
?>