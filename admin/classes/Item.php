<?php

	class Item extends Generic

	{

		function manage_account($data)

		{	



			// if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))

			//    {

			//     $oldLogo = isset($data['oldLogo']) ? $data['oldLogo'] : "";

			//     if (!empty($oldLogo)) {

			//      @unlink("../" . $oldLogo . "");

			//     }

			//     $uploadPath = "../assets/uploads/product/";

			//     $databasePath = "assets/uploads/product/";

			//     $filename = $_FILES['image']['name'];
			//     $filename = str_replace(' ', '', $filename);

			//     $unique = rand(0, 50) . '_' . $filename;

			//     $uploadPath.= $unique;

			//     $databasePath.= $unique;

			//     $upload = move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

			//     $data['image'] = $databasePath;

			// }

			$data['handler'] = 'items';

			$Generic = new Generic();

			$response = $Generic->manage_row($data);

			return $response;

		}

		function get_item_list($data)

		{

			$data['handler'] = 'items';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_list($data);

			return $response;

		}

		function get_item_details($data)

		{	

			$data['handler'] = 'items';

			$Generic = new Generic();

			$response = array();

			$data['condition'] = $Generic->generate_condition($data['conditionParam']);

			$response['data'] = $Generic->get_details($data);

			return $response;

		}



		

		function manage_items($data){

			$data['handler'] = 'items';

			

			$Generic = new Generic();

			$response = $Generic->manage_row($data);

			return $response;

		}



	}

?>