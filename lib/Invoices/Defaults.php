<?php 

namespace USAePay\Invoices;

class Defaults{

	public function get($Data=array()){
		$Path="/invoices/defaults";
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