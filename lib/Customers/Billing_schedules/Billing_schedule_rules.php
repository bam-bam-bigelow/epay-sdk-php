<?php 

namespace USAePay\Customers\Billing_schedules;

class Billing_schedule_rules{

	public function get($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules";
		$Params=[];
		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$billing_rule_key=$Data['billing_rule_key'];
			unset($Data['billing_rule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/$billing_rule_key";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function delete($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/$billing_rule_key";
		$Params=[];
		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$billing_rule_key=$Data['billing_rule_key'];
			unset($Data['billing_rule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/$billing_rule_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/$billing_rule_key";
		$Params=[];
		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$billing_rule_key=$Data['billing_rule_key'];
			unset($Data['billing_rule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/$billing_rule_key";
			try{
				return \USAePay\API::runCall('put',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>