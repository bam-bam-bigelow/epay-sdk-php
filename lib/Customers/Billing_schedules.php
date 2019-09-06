<?php 

namespace USAePay\Customers;

class Billing_schedules
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)){
			if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyGet($custkey,$billing_schedule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		$custkey=$Data['custkey'];
		unset($Data['custkey']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesGet($custkey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}


	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesPost($custkey,$Data);
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

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyDelete($custkey,$billing_schedule_key,$Data);
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

		if(array_key_exists('custkey',$Data)&&array_key_exists('billing_schedule_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$billing_schedule_key=$Data['billing_schedule_key'];
		unset($Data['billing_schedule_key']);

			try{
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyPut($custkey,$billing_schedule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>