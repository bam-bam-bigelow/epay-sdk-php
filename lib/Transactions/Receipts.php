<?php 

namespace USAePay\Transactions;

class Receipts{

	public function get($Data=array()){
		$Path="/transactions/$trankey/receipts/$receipt_key";
		$Params=[];
		if(array_key_exists('trankey',$Data)&&array_key_exists('receipt_key',$Data)){
			$trankey=$Data['trankey'];
			unset($Data['trankey']);
			$receipt_key=$Data['receipt_key'];
			unset($Data['receipt_key']);
			$Path="/transactions/$trankey/receipts/$receipt_key";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>