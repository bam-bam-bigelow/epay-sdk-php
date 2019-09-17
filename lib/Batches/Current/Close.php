<?php 

namespace USAePay\Batches\Current;

class Close{

	public function post($Data=array()){
		$Path="/batches/current/close";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}
}
?>