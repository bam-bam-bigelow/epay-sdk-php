<?php 

namespace USAePay\Invoices\Bulk;

class Send{

	public function post($Data=array()){
		$Path="/invoices/bulk/send";
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