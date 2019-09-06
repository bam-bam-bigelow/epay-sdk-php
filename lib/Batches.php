<?php 

namespace USAePay;

class Batches
{
	public function get($Data=array())
	{
		if(!\USAePay\API::$config) return ["Error"=>"Api Authentication not found, please run USAePay\API::setAuthentication"];
		$apiInstance = new \USAePay\RestAPI\BatchApi(
			new \GuzzleHttp\Client(["timeout"=>\USAePay\API::$timeout]),
			\USAePay\API::$config
		);

		if(array_key_exists('batch_key',$Data)){
			$batch_key=$Data['batch_key'];
		unset($Data['batch_key']);

			try{
				return $apiInstance->batchesBatchkeyGet($batch_key,$Data);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

		if(array_key_exists('limit',$Data)) $limit=$Data['limit'];
		else $limit="";

		if(array_key_exists('offset',$Data)) $offset=$Data['offset'];
		else $offset="";

		if(array_key_exists('openedlt',$Data)) $openedlt=$Data['openedlt'];
		else $openedlt="";

		if(array_key_exists('openedgt',$Data)) $openedgt=$Data['openedgt'];
		else $openedgt="";

		if(array_key_exists('closedlt',$Data)) $closedlt=$Data['closedlt'];
		else $closedlt="";

		if(array_key_exists('closedgt',$Data)) $closedgt=$Data['closedgt'];
		else $closedgt="";

		if(array_key_exists('openedle',$Data)) $openedle=$Data['openedle'];
		else $openedle="";

		if(array_key_exists('openedge',$Data)) $openedge=$Data['openedge'];
		else $openedge="";

		if(array_key_exists('closedle',$Data)) $closedle=$Data['closedle'];
		else $closedle="";

		if(array_key_exists('closedge',$Data)) $closedge=$Data['closedge'];
		else $closedge="";

	try{
		return $apiInstance->batchesGet($limit,$offset,$openedlt,$openedgt,$closedlt,$closedgt,$openedle,$openedge,$closedle,$closedge,$Data);
	}
	catch(\exception $e){
		return $e->getMessage();
	}


	}

}
?>