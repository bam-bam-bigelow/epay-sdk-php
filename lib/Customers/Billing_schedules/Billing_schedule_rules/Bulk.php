<?php 

namespace USAePay\Customers\Billing_schedules\Billing_schedule_rules;

class Bulk
{
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
				return $apiInstance->customersCustkeyBillingschedulesBillingschedulekeyBillingschedulerulesBulkDelete($custkey,$billing_schedule_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>