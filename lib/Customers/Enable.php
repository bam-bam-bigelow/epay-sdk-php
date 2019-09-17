<?php 

namespace USAePay\Customers;

class Enable{

	public function post($Data=array()){
		$Path="/customers/enable";
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