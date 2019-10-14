<?php 

namespace USAePay;

class Products{

	public function get($Data=array()){
		$Path="/products";
		$Params=[];

		if(array_key_exists('product_key',$Data)){
			$product_key=$Data['product_key'];
			unset($Data['product_key']);
			$Path="/products/$product_key";
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
		$Path="/products";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function delete($Data=array()){
		$Path="/products/$product_key";
		$Params=[];

		if(array_key_exists('product_key',$Data)){
			$product_key=$Data['product_key'];
			unset($Data['product_key']);
			$Path="/products/$product_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/products/$product_key";
		$Params=[];

		if(array_key_exists('product_key',$Data)){
			$product_key=$Data['product_key'];
			unset($Data['product_key']);
			$Path="/products/$product_key";
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