<?php

	class OrderItems extends Generic

	{

		

		function get_orderitems_list($data){

			$data['handler'] = 'order_items';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_list($data);

			return $response;

		}

     

		function get_orderitems_details($data){



			$data['handler'] = 'order_items';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_details($data);

			return $response;

		}



		function manage_orderitems($data){

			$data['handler'] = 'order_items';

			$Generic = new Generic();

			$response = $Generic->manage_row($data);

			return $response;

		}

	}

?>