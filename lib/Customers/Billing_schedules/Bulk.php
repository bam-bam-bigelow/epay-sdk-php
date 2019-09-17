<?php 

namespace USAePay\Customers\Billing_schedules;

class Bulk{

	public function delete($Data=array()){
		$Path="/customers/$custkey/billing_schedules/bulk";
		$Params=[];
		if(array_key_exists('custkey',$Data)){
			$custkey=$Data['custkey'];
			unset($Data['custkey']);
			$Path="/customers/$custkey/billing_schedules/bulk";
			try{
				return \USAePay\API::runCall('delete',$Path,$Data,$Params);
			}
			catch(\exception $e){
				return $e->getMessage();
			}
		}

	}
}
?>