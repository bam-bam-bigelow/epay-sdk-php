<?php 

namespace USAePay;

class Customers
{
	public function get($Data=array())
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
				return $apiInstance->customersCustkeyGet($custkey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	try{
		return $apiInstance->customersGet($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}


	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->customersPost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}


	public function delete($Data=array())
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
				return $apiInstance->customersCustkeyDelete($custkey,$Data);
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

		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
		unset($Data['custkey']);

			try{
				return $apiInstance->customersCustkeyPut($custkey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>