<?php 

namespace USAePay\Customers;

class Payment_methods
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('custkey',$Data)){
			if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$paymethod_key=$Data['paymethod_key'];
		unset($Data['paymethod_key']);

			try{
				return $apiInstance->customersCustkeyPaymentmethodsPaymethodkeyGet($custkey,$paymethod_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		$custkey=$Data['custkey'];
		unset($Data['custkey']);

			try{
				return $apiInstance->customersCustkeyPaymentmethodsGet($custkey,$Data);
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
			if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$paymethod_key=$Data['paymethod_key'];
		unset($Data['paymethod_key']);

			try{
				return $apiInstance->customersCustkeyPaymentmethodsPaymethodkeyPost($custkey,$paymethod_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		$custkey=$Data['custkey'];
		unset($Data['custkey']);

			try{
				return $apiInstance->customersCustkeyPaymentmethodsPost($custkey,$Data);
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

		if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

		$paymethod_key=$Data['paymethod_key'];
		unset($Data['paymethod_key']);

			try{
				return $apiInstance->customersCustkeyPaymentmethodsPaymethodkeyDelete($custkey,$paymethod_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>