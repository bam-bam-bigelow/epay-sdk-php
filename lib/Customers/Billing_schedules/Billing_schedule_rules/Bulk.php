<?php
namespace AstroPayments\Customers\Billing_schedules\Billing_schedule_rules;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Bulk{

	public function delete($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Bulk delete requires custkey");
		if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Bulk delete requires billing_schedule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);
		$billing_schedule_key=$Data["billing_schedule_key"];
		unset($Data["billing_schedule_key"]);

		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/bulk";
		$Params=[];

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
}
?>