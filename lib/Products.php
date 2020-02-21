<?php
namespace USAePay;
use \USAePay\API as API;
use \USAePay\Exception\CurlException as CurlException;
use \USAePay\Exception\SDKException as SDKException;
use \USAePay\Exception\ueException as ueException;


class Products{

	public function get($Data=array()){
		$Path="/products";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

		if(array_key_exists("product_key",$Data)){
			$Path.='/'.$Data["product_key"];
			unset($Data["product_key"]);
		}

		try{
			return API::runCall('get',$Path,$Data,$Params);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}

	public function post($Data=array()){
		$Path="/products";
		$Params=[];

		try{
			return API::runCall('post',$Path,$Data,$Params);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}

	public function delete($Data=array()){
			if(!array_key_exists("product_key",$Data)) throw new SDKexception("Products delete requires product_key");

		$Path="/products";
		$Params=[];

		if(array_key_exists("product_key",$Data)){
			$Path.='/'.$Data["product_key"];
			unset($Data["product_key"]);
		}

		try{
			return API::runCall('delete',$Path,$Data,$Params);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}

	public function put($Data=array()){
			if(!array_key_exists("product_key",$Data)) throw new SDKexception("Products put requires product_key");

		$Path="/products";
		$Params=[];

		if(array_key_exists("product_key",$Data)){
			$Path.='/'.$Data["product_key"];
			unset($Data["product_key"]);
		}

		try{
			return API::runCall('put',$Path,$Data,$Params);
		}
		catch(CurlException $e){
			throw $e;
		}
		catch(SDKException $e){
			throw $e;
		}
		catch(ueException $e){
			throw $e;
		}
		catch(\Exception $e){
			throw new SDKException("Unexpected exception thrown");
		}
	}
}
?>