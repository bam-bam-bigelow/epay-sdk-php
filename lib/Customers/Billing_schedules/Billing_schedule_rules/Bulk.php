<?php 

namespace USAePay\Customers\Billing_schedules\Billing_schedule_rules;

class Bulk{

	public function delete($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/bulk";
		$Params=[];
		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key/billing_schedule_rules/bulk";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>