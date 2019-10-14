<?php 

namespace USAePay\Invoices\Payments;

class Is_payable{

	public function get($Data=array()){
		$Path="/invoices/$invoice_key/payments/is-payable";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key/payments/is-payable";
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