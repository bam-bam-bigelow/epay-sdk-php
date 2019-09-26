<?php 

namespace USAePay\Batches;

class Transactions{

	public function get($Data=array()){
		$Path="/batches/$batch_key/transactions";
		$Params=[];

		if(array_key_exists('batch_key',$Data)){
		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];
		if(array_key_exists('return_bin',$Data)) $Params['return_bin']=$Data['return_bin'];

			$batch_key=$Data['batch_key'];
			unset($Data['batch_key']);
			$Path="/batches/$batch_key/transactions";
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