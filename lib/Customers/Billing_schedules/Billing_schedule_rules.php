<?php 

namespace USAePay\Customers\Billing_schedules;

class Billing_schedule_rules
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

		$billing_rule_key=$Data['billing_rule_key'];
		unset($Data['billing_rule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyBillingschedulerulesBillingrulekeyGet($custkey,$billing_schedule_key,$billing_rule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyBillingschedulerulesGet($custkey,$billing_schedule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}


	public function delete($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

		$billing_rule_key=$Data['billing_rule_key'];
		unset($Data['billing_rule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyBillingschedulerulesBillingrulekeyDelete($custkey,$billing_schedule_key,$billing_rule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}


	public function put($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)&&array_key_exists('billing_rule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

		$billing_rule_key=$Data['billing_rule_key'];
		unset($Data['billing_rule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyBillingschedulerulesBillingrulekeyPut($custkey,$billing_schedule_key,$billing_rule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>