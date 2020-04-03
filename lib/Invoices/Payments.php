<?php
namespace AstroPayments\Invoices;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Payments{

	public function get($Data=array()){
		if(!array_key_exists("invoice_key",$Data)) throw new SDKexception("Payments get requires invoice_key");

		$invoice_key=$Data["invoice_key"];
		unset($Data["invoice_key"]);

		$Path="/invoices/$invoice_key/payments";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

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