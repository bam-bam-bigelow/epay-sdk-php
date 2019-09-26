<?php 

namespace USAePay\Customers;

class Payment_methods{

	public function get($Data=array()){
		$Path="/customers/$custkey/payment_methods";
		$Params=[];

		if(array_key_exists('custkey',$Data)){
		if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$paymethod_key=$Data['paymethod_key'];
			unset($Data['paymethod_key']);
			$Path="/customers/$custkey/payment_methods/$paymethod_key";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/payment_methods";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function post($Data=array()){
		$Path="/customers/$custkey/payment_methods";
		$Params=[];

		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/payment_methods";
			try{
				return \USAePay\API::runCall('post',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function delete($Data=array()){
		$Path="/customers/$custkey/payment_methods/$paymethod_key";
		$Params=[];

		if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$paymethod_key=$Data['paymethod_key'];
			unset($Data['paymethod_key']);
			$Path="/customers/$custkey/payment_methods/$paymethod_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/customers/$custkey/payment_methods/$paymethod_key";
		$Params=[];

		if(array_key_exists('custkey',$Data)&&array_key_exists('paymethod_key',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$paymethod_key=$Data['paymethod_key'];
			unset($Data['paymethod_key']);
			$Path="/customers/$custkey/payment_methods/$paymethod_key";
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