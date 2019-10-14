<?php 

namespace USAePay;

class Invoices{

	public function get($Data=array()){
		$Path="/invoices";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

		try{
			return \USAePay\API::runCall('get',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function post($Data=array()){
		$Path="/invoices";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function delete($Data=array()){
		$Path="/invoices/$invoice_key";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/invoices/$invoice_key";
		$Params=[];

		if(array_key_exists('invoice_key',$Data)){
			$invoice_key=$Data['invoice_key'];
			unset($Data['invoice_key']);
			$Path="/invoices/$invoice_key";
			try{
				return \USAePay\API::runCall('put',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>