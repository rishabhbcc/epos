<?php

	include_once('includes/global/config.php');

	include_once('includes/global/autoloader.php');

	include '../plug_in/html_purifier/library/HTMLPurifier.auto.php';
	

	$config = HTMLPurifier_Config::createDefault();

	$purifier = new HTMLPurifier($config);

	// secure request parameters

	$keys = array_keys($_REQUEST);

	for($count=0;$count<count($keys);$count++)

	{

		if(is_array($_REQUEST[$keys[$count]]))

		{

			$innerArray = $_REQUEST[$keys[$count]];

			for($countInner=0;$countInner<count($innerArray);$countInner++)

			{

				$innerArray[$countInner] = $purifier->purify($innerArray[$countInner]);

			}

			$_REQUEST[$keys[$count]] = $innerArray;

		}

		else $_REQUEST[$keys[$count]] = $purifier->purify($_REQUEST[$keys[$count]]);

	}

	if(isset($_REQUEST['access']) && $_REQUEST['access']=='true')

	{

		switch($_REQUEST['action'])

		{

	 	case 'getFilteredQuote':
				 
					$param = array();
					$param['conditionParam']['conditionType'] = 'aggregate';
					$param['conditionParam']['condition'] = array();

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] != '')){

				  	
				  	$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['startDate'].' 00:00:00';
				  	$condition['fieldOperator'] =  ' >= ';
				  	$param['conditionParam']['condition'][] = $condition;
				  	$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['endDate'].' 23:59:59';
				  	$condition['fieldOperator'] =  ' <= ';
				  	$param['conditionParam']['condition'][] = $condition;

					
				}

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] == '') ){
					/*print_r($_REQUEST['startDate']);
					echo "hello";*/
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['startDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}
				if($_REQUEST['endDate'] != '' && ($_REQUEST['startDate'] == '')  ){
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['endDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}

				if($_REQUEST['userId'] != ''){
					$condition = array();
				    $condition['param']['userId'] = $_REQUEST['userId'];
				    $condition['fieldOperator'] =  ' LIKE ';
				    $param['conditionParam']['condition'][] = $condition;
				   

				}
				   $list = $Order->get_order_list($param)['data'];
				include 'includes/content/blocks/blk_quote.php';
				break;

				case 'getFilteredHour':
				   $hour = time();
				   $currentDate = date("Y-m-d ", $hour);
				  
				       
				   $hour = time();
				   $currentTime = date("Y-m-d h:i:s", $hour);
				   $updatedHour = strtotime("-1 hour"); ;
				   $updatedTime = date("Y-m-d h:i:s", $updatedHour);

				   $param = array();
				   $param['conditionParam']['conditionType'] = 'aggregate';
				   $param['conditionParam']['condition'] = array();
				   $condition = array();
				   $condition['param']['createdOn'] =  $updatedTime;
				   $condition['fieldOperator'] =  ' >= ';
				   $condition['clauseOperator'] =  ' AND ';
				   $param['conditionParam']['condition'][] = $condition;
				   $condition = array();
				   $condition['param']['createdOn'] =  $currentTime;
				   $condition['fieldOperator'] =  ' <= ';
				   $condition['clauseOperator'] =  ' AND ';
				   $param['conditionParam']['condition'][] = $condition;
				   $condition = array();
				   $condition['param']['userId'] =  $_REQUEST['userId'];
				   $condition['fieldOperator'] =  ' = ';
				   $condition['clauseOperator'] =  ' AND ';
				   $param['conditionParam']['condition'][] = $condition;
				   $list = $Order->get_order_list($param)['data'];


				include 'includes/content/blocks/blk_sale_hour.php';
				break;


					case 'getFilteredToday':
				   $hour = time();
				   $currentDate = date("Y-m-d ", $hour);
				  

				   $param = array();
				   $param['conditionParam']['conditionType'] = 'aggregate';
				   $param['conditionParam']['condition'] = array();
				   $condition = array();
				   $condition['param']['createdOn'] =  $currentDate.'%';
				   $condition['fieldOperator'] =  ' LIKE ';
				   $condition['clauseOperator'] =  ' AND ';
				   $param['conditionParam']['condition'][] = $condition;
				   $condition = array();
				   $condition['param']['userId'] =  $_REQUEST['userId'];
				   $condition['fieldOperator'] =  ' = ';
				   $condition['clauseOperator'] =  ' AND ';
				   $param['conditionParam']['condition'][] = $condition;
				   $list = $Order->get_order_list($param)['data'];



				include 'includes/content/blocks/blk_sale_hour.php';
				break;

				case 'getFilteredCustomer':


					$param = array();
					$param['conditionParam']['conditionType'] = 'aggregate';
					$param['conditionParam']['condition'] = array();

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] != '')){

				  	
				  	$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['startDate'].' 00:00:00';
				  	$condition['fieldOperator'] =  ' >= ';
				  	$param['conditionParam']['condition'][] = $condition;
				  	$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['endDate'].' 23:59:59';
				  	$condition['fieldOperator'] =  ' <= ';
				  	$param['conditionParam']['condition'][] = $condition;

					
				}

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] == '') ){
					/*print_r($_REQUEST['startDate']);
					echo "hello";*/
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['startDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}
				if($_REQUEST['endDate'] != '' && ($_REQUEST['startDate'] == '')  ){
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['endDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}

				if($_REQUEST['userId'] != ''){
					$condition = array();
				    $condition['param']['userId'] = $_REQUEST['userId'];
				    $condition['fieldOperator'] =  ' LIKE ';
				    $param['conditionParam']['condition'][] = $condition;
				   

				}
				  $list = $Customer->get_customer_list($param)['data'];



				include 'includes/content/blocks/blk_customer.php';
				break;

				case 'getFilteredPayment':


				 $param = array();
				 $param['conditionParam']['conditionType'] = 'aggregate';
				 $param['conditionParam']['condition'] = array();

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] != ''))
				{
				 $condition = array();
				 $condition['param']['createdOn'] = $_REQUEST['startDate'].' 00:00:00';
				 $condition['fieldOperator'] =  ' >= ';
				 $param['conditionParam']['condition'][] = $condition;
				 $condition = array();
				 $condition['param']['createdOn'] = $_REQUEST['endDate'].' 23:59:59';
				 $condition['fieldOperator'] =  ' <= ';
				 $param['conditionParam']['condition'][] = $condition;

				}

				if(($_REQUEST['startDate'] != '') && ($_REQUEST['endDate'] == '') ){
					/*print_r($_REQUEST['startDate']);
					echo "hello";*/
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['startDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}
				if($_REQUEST['endDate'] != '' && ($_REQUEST['startDate'] == '')  ){
					$condition = array();
				  	$condition['param']['createdOn'] = $_REQUEST['endDate'].'%';
				  	$condition['fieldOperator'] =  'LIKE ';
				  	$param['conditionParam']['condition'][] = $condition;
				   

				}

				if($_REQUEST['userId'] != '')
				{
				 $condition = array();
				 $condition['param']['userId'] = $_REQUEST['userId'];
				 $condition['fieldOperator'] =  ' = ';
				 $param['conditionParam']['condition'][] = $condition;
				}
				if($_REQUEST['paymentId'] != '')
				{
				 $condition = array();
				 $condition['param']['paymentMethodId'] = $_REQUEST['paymentId'];
				 $condition['fieldOperator'] =  ' = ';
				 $param['conditionParam']['condition'][] = $condition;
				}
				 $list = $Order->get_order_list($param)['data'];
				 
				include 'includes/content/blocks/blk_quote.php';


				break;

		}

	}

?>	