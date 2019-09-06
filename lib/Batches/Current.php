<?php 

namespace USAePay\Batches;

class Current
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\BatchApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->batchesCurrentGet($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>