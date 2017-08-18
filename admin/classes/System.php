<?php
	class System extends Generic
	{
		function toDBDateFormat($unformatted)
		{
			$unformatted = explode("/",$unformatted);
			return $unformatted[2].'-'.$unformatted[1].'-'.$unformatted[0];
		}
		function toViewFormat($unformatted)
		{
			$unformatted = explode("-",$unformatted);
			return $unformatted[2].'/'.$unformatted[1].'/'.$unformatted[0];
		}
		function get_table_column_list($data)
		{
			$generic = new Generic();
			$response = array();
			$response['data'] = $generic->get_column_list($data);
			return $response;
		}
		function replace_tokens($content,$tokens,$object)
		{
			for($count=0;$count<count($tokens);$count++)
			{
				$token = '#{'.$tokens[$count].'}';
				if(strchr($content,$token)){
					$content = str_replace($token,$object->$tokens[$count],$content);
				}
			}
			return $content;
		}
		function manage_query_category($data)
		{
			$data['handler'] = 'query_categories';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		
		function manage_configuration($data)
		{
			$data['handler'] = 'configuration';
			if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))
			{
				$oldLogo = isset($data['oldLogo']) ? $data['oldLogo'] : "";
				if (!empty($oldLogo)) {
					@unlink("../" . $oldLogo . "");
				}
				$uploadPath = "../assets/uploads/images/logo/";
				$databasePath = "assets/uploads/images/logo/";
				$filename = $_FILES['logo']['name'];
				$unique = rand(0, 50) . '_' . $filename;
				$uploadPath.= $unique;
				$databasePath.= $unique;
				$upload = move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath);
				$data['logo'] = $databasePath;
			}
			if (isset($_FILES['fevicon']['name']) && !empty($_FILES['fevicon']['name']))
			{
				$oldFevicon = isset($data['oldFevicon']) ? $data['oldFevicon'] : "";
				if (!empty($oldFevicon)) {
					@unlink("../" . $oldFevicon . "");
				}
				$uploadPath = "../assets/uploads/images/logo/";
				$databasePath = "assets/uploads/images/logo/";
				$filename = $_FILES['fevicon']['name'];
				$unique = rand(0, 50) . '_' . $filename;
				$uploadPath.= $unique;
				$databasePath.= $unique;
				$upload = move_uploaded_file($_FILES['fevicon']['tmp_name'], $uploadPath);
				$data['fevicon'] = $databasePath;
			}
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_Payment_method($data)
		{	
			$data['handler'] = 'payment_method';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_bank($data)
		{	
			$data['handler'] = 'banks';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_payment_terms($data)
		{	
			$data['handler'] = 'payment_terms';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_currency($data)
		{	
			$data['handler'] = 'currencies';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_shipping_method($data)
		{	
			$data['handler'] = 'shipping_methods';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_query_category_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'query_categories';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_user_type_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'user_types';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_payment_method_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'payment_method';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_bank_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'banks';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_payment_terms_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'payment_terms';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_mail_template_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'mail_templates';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_mail_template_handler_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'mail_template_handlers';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_currency_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'currencies';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_shipping_method_list($data)
		{
			$generic = new Generic();
			$response = array();
			$data['handler'] = 'shipping_methods';
			$data['condition'] = $generic->generate_condition($data['conditionParam']);
			$response['data'] = $generic->get_list($data);
			return $response;
		}
		function get_configuration_details($data)
		{
			$data['handler'] = 'configuration';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_user_type_details($data)
		{
			$data['handler'] = 'user_types';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_query_category_details($data)
		{
			$data['handler'] = 'query_categories';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_field_type_details($data)
		{
			$data['handler'] = 'field_types';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_payment_method_details($data)
		{
			$data['handler'] = 'payment_method';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_bank_details($data)
		{
			$data['handler'] = 'banks';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_mail_template_handler_details($data)
		{
			$data['handler'] = 'mail_template_handlers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_payment_terms_details($data)
		{
			$data['handler'] = 'payment_terms';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_currency_details($data)
		{
			$data['handler'] = 'currencies';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>