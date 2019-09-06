<?php 

namespace USAePay\Customers;

class Transactions
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
				return $apiInstance->customersCustkeyTransactionsGet($custkey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>