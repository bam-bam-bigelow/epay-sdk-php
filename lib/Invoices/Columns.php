<?php 

namespace USAePay\Invoices;

class Columns{

	public function get($Data=array()){
		$Path="/invoices/columns";
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