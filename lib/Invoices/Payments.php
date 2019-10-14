<?php 

namespace USAePay\Invoices;

class Payments{

	public function get($Data=array()){
		$Path="/invoices/$invoice_key/payments";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key/payments";
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