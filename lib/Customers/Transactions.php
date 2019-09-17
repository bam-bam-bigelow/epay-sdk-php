<?php 

namespace USAePay\Customers;

class Transactions{

	public function get($Data=array()){
		$Path="/customers/$custkey/transactions";
		$Params=[];
		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/transactions";
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