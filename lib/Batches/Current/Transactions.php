<?php 

namespace USAePay\Batches\Current;

class Transactions
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\BatchApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('limit',$Data)) $limit=$Data['limit'];
		else $limit="";

		if(array_key_exists('offset',$Data)) $offset=$Data['offset'];
		else $offset="";

		if(array_key_exists('return_bin',$Data)) $return_bin=$Data['return_bin'];
		else $return_bin="";

	try{
		return $apiInstance->batchesCurrentTransactionsGet($limit,$offset,$return_bin,$Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>