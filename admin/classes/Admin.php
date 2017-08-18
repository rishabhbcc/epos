<?php
	class Admin extends Generic
	{
		function manage_account($data)
		{	
			$data['handler'] = 'admin';
			if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
			{
				$oldLogo = isset($data['oldLogo']) ? $data['oldLogo'] : "";
				if (!empty($oldLogo)) {
					@unlink("../" . $oldLogo . "");
				}
				$uploadPath = "../assets/uploads/";
				$databasePath = "assets/uploads/";
				$filename = $_FILES['image']['name'];
				$unique = rand(0, 50) . '_' . $filename;
				$uploadPath.= $unique;
				$databasePath.= $unique;
				$upload = move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
				$data['image'] = $databasePath;
			}
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_user_list($data)
		{
			$data['handler'] = 'admin';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_user_details($data)
		{
			$data['handler'] = 'admin';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>