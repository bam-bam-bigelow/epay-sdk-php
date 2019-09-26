<?php 

namespace USAePay;

class Transactions{

	public function get($Data=array()){
		$Path="/transactions";
		$Params=[];

		if(array_key_exists('trankey',$Data)){
			$trankey=$Data['trankey'];
			unset($Data['trankey']);
			$Path="/transactions/$trankey";
			try{
				return \USAePay\API::runCall('get',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];
		if(array_key_exists('fuzzy',$Data)) $Params['fuzzy']=$Data['fuzzy'];

		try{
			return \USAePay\API::runCall('get',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function post($Data=array()){
		$Path="/transactions";
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