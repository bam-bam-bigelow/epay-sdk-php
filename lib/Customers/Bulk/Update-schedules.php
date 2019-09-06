<?php 

namespace USAePay\Customers\Bulk;

class Update-schedules
{
	public function post($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\CustomerApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

	try{
		return $apiInstance->customersBulkUpdate-schedulesPost($Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>