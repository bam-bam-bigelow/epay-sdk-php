<?php 

namespace USAePay\Products;

class Categories{

	public function get($Data=array()){
		$Path="/products/categories";
		$Params=[];

		if(array_key_exists('category_key',$Data)){
			$category_key=$Data['category_key'];
			unset($Data['category_key']);
			$Path="/products/categories/$category_key";
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
		$Path="/products/categories";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}

	public function delete($Data=array()){
		$Path="/products/categories/$category_key";
		$Params=[];

		if(array_key_exists('category_key',$Data)){
			$category_key=$Data['category_key'];
			unset($Data['category_key']);
			$Path="/products/categories/$category_key";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}

	public function put($Data=array()){
		$Path="/products/categories/$category_key";
		$Params=[];

		if(array_key_exists('category_key',$Data)){
			$category_key=$Data['category_key'];
			unset($Data['category_key']);
			$Path="/products/categories/$category_key";
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