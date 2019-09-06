<?php 

namespace USAePay;

class Transactions
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\TransactionApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('trankey',$Data)){
			$trankey=$Data['trankey'];
		unset($Data['trankey']);

			try{
				return $apiInstance->transactionsTrankeyGet($trankey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		if(array_key_exists('limit',$Data)) $limit=$Data['limit'];
		else $limit="";

		if(array_key_exists('offset',$Data)) $offset=$Data['offset'];
		else $offset="";

		if(array_key_exists('fuzzy',$Data)) $fuzzy=$Data['fuzzy'];
		else $fuzzy="";

	try{
		return $apiInstance->transactionsGet($limit,$offset,$fuzzy,$Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}


	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\TransactionApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->transactionsPost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>