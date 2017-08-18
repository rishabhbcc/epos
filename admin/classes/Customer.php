<?php
	class Customer extends Generic
	{
		

		function get_customer_list($data){
			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}

		function get_customer_details($data){

			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}

		function manage_customer($data){

			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}

		function check_customer_email($data) // For Manual Email Validation
		{
			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	



	}
?>