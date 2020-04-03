<?php
namespace AstroPayments\Customers\Billing_schedules;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Billing_schedule_rules{

	public function get($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedule_rules get requires custkey");
		if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Billing_schedule_rules get requires billing_schedule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);
		$billing_schedule_key=$Data["billing_schedule_key"];
		unset($Data["billing_schedule_key"]);

		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules";
		$Params=[];

		if(array_key_exists("billing_rule_key",$Data)){
			$Path.='/'.$Data["billing_rule_key"];
			unset($Data["billing_rule_key"]);
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

	public function delete($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedule_rules delete requires custkey");
		if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Billing_schedule_rules delete requires billing_schedule_key");
			if(!array_key_exists("billing_rule_key",$Data)) throw new SDKexception("Billing_schedule_rules delete requires billing_rule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);
		$billing_schedule_key=$Data["billing_schedule_key"];
		unset($Data["billing_schedule_key"]);

		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules";
		$Params=[];

		if(array_key_exists("billing_rule_key",$Data)){
			$Path.='/'.$Data["billing_rule_key"];
			unset($Data["billing_rule_key"]);
		}

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

	public function put($Data=array()){
		if(!array_key_exists("custkey",$Data)) throw new SDKexception("Billing_schedule_rules put requires custkey");
		if(!array_key_exists("billing_schedule_key",$Data)) throw new SDKexception("Billing_schedule_rules put requires billing_schedule_key");
			if(!array_key_exists("billing_rule_key",$Data)) throw new SDKexception("Billing_schedule_rules put requires billing_rule_key");

		$custkey=$Data["custkey"];
		unset($Data["custkey"]);
		$billing_schedule_key=$Data["billing_schedule_key"];
		unset($Data["billing_schedule_key"]);

		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules";
		$Params=[];

		if(array_key_exists("billing_rule_key",$Data)){
			$Path.='/'.$Data["billing_rule_key"];
			unset($Data["billing_rule_key"]);
		}

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