<?php

	class Order extends Generic

	{

		



		function get_order_list($data){

			$data['handler'] = 'orders';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_list($data);

			return $response;

		}

     

		function get_order_details($data){



			$data['handler'] = 'orders';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_details($data);

			return $response;

		}



		function manage_order($data){
			
			$data['handler'] = 'orders';

			$Generic = new Generic();

			$response = $Generic->manage_row($data);

			return $response;

		}









	







	}

?>