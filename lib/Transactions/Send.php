<?php 

namespace USAePay\Transactions;

class Send
{
	public function post($Data=array())
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
				return $apiInstance->transactionsTrankeySendPost($trankey,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>