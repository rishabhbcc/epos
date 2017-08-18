<?php
	class Category extends Generic
	{
		function manage_category($data)
		{	
			$data['handler'] = 'category';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_category_list($data)
		{
			$data['handler'] = 'category';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_category_details($data)
		{	
			$data['handler'] = 'category';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>