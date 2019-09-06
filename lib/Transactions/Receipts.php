<?php 

namespace USAePay\Transactions;

class Receipts
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\TransactionApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('trankey',$Data)&&array_key_exists('receipt_key',$Data)){
			$trankey=$Data['trankey'];
		unset($Data['trankey']);

		$receipt_key=$Data['receipt_key'];
		unset($Data['receipt_key']);

			try{
				return $apiInstance->transactionsTrankeyReceiptsReceiptkeyGet($trankey,$receipt_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}


	}

}
?>