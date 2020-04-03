<?php
namespace USAePay\Customers;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Transactions{

	public function get($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Transactions get requires custkey");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);

		$Path="/customers/$custkey/transactions";
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
}
?>