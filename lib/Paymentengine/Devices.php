<?php
namespace AstroPayments\Paymentengine;
use \AstroPayments\API as API;
use \AstroPayments\Exception\CurlException as CurlException;
use \AstroPayments\Exception\SDKException as SDKException;
use \AstroPayments\Exception\ueException as ueException;


class Devices{

	public function get($Data=array()){
		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists('limit',$Data)) $Params['limit']=$Data['limit'];
		if(array_key_exists('offset',$Data)) $Params['offset']=$Data['offset'];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
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
		$Path="/paymentengine/devices";
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
			if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Devices delete requires devicekey");

		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
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
			if(!array_key_exists("devicekey",$Data)) throw new SDKexception("Devices put requires devicekey");

		$Path="/paymentengine/devices";
		$Params=[];

		if(array_key_exists("devicekey",$Data)){
			$Path.='/'.$Data["devicekey"];
			unset($Data["devicekey"]);
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