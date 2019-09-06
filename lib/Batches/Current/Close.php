<?php 

namespace USAePay\Batches\Current;

class Close
{
	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\BatchApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->batchesCurrentClosePost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>