<?php
	class Salutations extends Generic
	{
		

		function get_salutations_list($data){
			$data['handler'] = 'salutations';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}

		function get_salutations_details($data){

			$data['handler'] = 'salutations';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}

		function manage_salutations($data){
			$data['handler'] = 'salutations';
			
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}


	



	}
?>