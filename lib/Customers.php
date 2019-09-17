<?php 

namespace USAePay;

class Customers{

	public function get($Data=array()){
		$Path="/customers";
		$Params=[];
		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey";
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
		$Path="/customers";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function delete($Data=array()){
		$Path="/customers/$custkey";
		$Params=[];
		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/customers/$custkey";
		$Params=[];
		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey";
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