<?php 

namespace USAePay\Invoices;

class Bulk{

	public function delete($Data=array()){
		$Path="/invoices/bulk";
		$Params=[];

		try{
			return \USAePay\API::runCall('delete',$Path,$Data,$Params);
		}
		catch(\exception $e){
			return $e->getMessage();
		}

	}
}
?>