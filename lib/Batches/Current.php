<?php 

namespace USAePay\Batches;

class Current{

	public function get($Data=array()){
		$Path="/batches/current";
		$Params=[];

		try{
			return \USAePay\API::runCall('get',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}
}
?>