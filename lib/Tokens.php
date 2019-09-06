<?php 

namespace USAePay;

class Tokens
{
	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\TokenApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->tokensPost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}


	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\TokenApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('cardref',$Data)){
			$cardref=$Data['cardref'];
		unset($Data['cardref']);

			try{
				return $apiInstance->tokensCardrefGet($cardref,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>