<?php 

namespace USAePay;

class Tokens{

	public function post($Data=array()){
		$Path="/tokens";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function get($Data=array()){
		$Path="/tokens/$cardref";
		$Params=[];
		if(array_key_exists('cardref',$Data)){
			$cardref=$Data['cardref'];
			unset($Data['cardref']);
			$Path="/tokens/$cardref";
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