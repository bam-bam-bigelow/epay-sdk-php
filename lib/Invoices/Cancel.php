<?php 

namespace USAePay\Invoices;

class Cancel{

	public function post($Data=array()){
		$Path="/invoices/$invoice_key/cancel";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key/cancel";
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