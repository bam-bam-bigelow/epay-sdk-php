<?php 

namespace USAePay\Transactions;

class Send{

	public function post($Data=array()){
		$Path="/transactions/$trankey/send";
		$Params=[];
		if(array_key_exists('trankey',$Data)){
			$trankey=$Data['trankey'];
			unset($Data['trankey']);
			$Path="/transactions/$trankey/send";
			try{
				return \USAePay\API::runCall('post',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>