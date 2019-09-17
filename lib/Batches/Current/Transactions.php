<?php 

namespace USAePay\Batches\Current;

class Transactions{

	public function get($Data=array()){
		$Path="/batches/current/transactions";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];
		if(array_key_exists('return_bin',$Data)) $Params['return_bin']=$Data['return_bin'];

		try{
			return \USAePay\API::runCall('get',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}
}
?>