<?php 

namespace USAePay\Invoices;

class Nextnum{

	public function get($Data=array()){
		$Path="/invoices/nextnum";
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