<?php 

namespace USAePay\Customers;

class Disable{

	public function post($Data=array()){
		$Path="/customers/disable";
		$Params=[];

		try{
			return \USAePay\API::runCall('post',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}
}
?>