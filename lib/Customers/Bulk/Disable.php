<?php 

namespace USAePay\Customers\Bulk;

class Disable
{
	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->customersBulkDisablePost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>