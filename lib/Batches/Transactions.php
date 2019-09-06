<?php 

namespace USAePay\Batches;

class Transactions
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\BatchApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('batch_key',$Data)){
			if(array_key_exists('limit',$Data)) $limit=$Data['limit'];
		else $limit="";

		if(array_key_exists('offset',$Data)) $offset=$Data['offset'];
		else $offset="";

		if(array_key_exists('return_bin',$Data)) $return_bin=$Data['return_bin'];
		else $return_bin="";

		$batch_key=$Data['batch_key'];
		unset($Data['batch_key']);

			try{
				return $apiInstance->batchesBatchkeyTransactionsGet($batch_key,$limit,$offset,$return_bin,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>