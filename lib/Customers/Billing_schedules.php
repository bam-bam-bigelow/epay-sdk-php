<?php 

namespace USAePay\Customers;

class Billing_schedules{

	public function get($Data=array()){
		$Path="/customers/$custkey/billing_schedules";
		$Params=[];

		if(array_key_exists('custkey',$Data)){
		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/billing_schedules";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function post($Data=array()){
		$Path="/customers/$custkey/billing_schedules";
		$Params=[];

		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/billing_schedules";
			try{
				return \USAePay\API::runCall('post',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function delete($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key";
		$Params=[];

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/customers/$custkey/billing_schedules/$billing_schedule_key";
		$Params=[];

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$billing_schedule_key=$Data['billing_schedule_key'];
			unset($Data['billing_schedule_key']);
			$Path="/customers/$custkey/billing_schedules/$billing_schedule_key";
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