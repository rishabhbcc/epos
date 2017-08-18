<?php
	class PaymentMethods extends Generic
	{
		

		function get_payment_method_list($data){
			$data['handler'] = 'payment_methods';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}

		function get_payment_method_details($data){

			$data['handler'] = 'payment_methods';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}

		function manage_payment_method($data){
			$data['handler'] = 'payment_methods';
			
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}


	



	}
?>