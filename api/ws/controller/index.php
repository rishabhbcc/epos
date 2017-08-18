<?php
header("Access-Control-Allow-Headers: content-type");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
include '../../../includes/global/config.php';
include '../includes/global/autoloader.php';
include '../../../plug_in/phpmailer/vendor/autoload.php';
include '../../../plug_in/html_purifier/library/HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
// secure all request parameters
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

/*
URL to access : http://client.zoneonedigital.com/bitsmart/api/ws/controller
Parameters required have been enlisted underneath for each method.
Necessary parameters to be used for each web service (used for logging):
- userId (Integer/Optional (userId of logged in user))
- deviceIMEI (Integer)
- IP (String (Optional))
- latitude (String)
- longitude (String)
*/
$action = null;
if(isset($_REQUEST['action']) && ($_REQUEST['action']!=null))
	$action = $_REQUEST['action'];
else {
	echo 'You are not authorised to use this service.';
	die();
}
if(isset($_REQUEST['access']) && $_REQUEST['access']=='true')
{
	switch($action){
//  start login
		case "user_login":
		$param =array();
// $param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
		$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
		$param['conditionParam']['param']['password'] = md5($_REQUEST['password']);
		$param['conditionParam']['param']['status'] = 1;
		$param['conditionParam']['param']['roleId'] = 2;
		$list = $User->get_user_details($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Login Successfully";
		}else{
			$response['status'] = false;
			$response['data'] = null;
			$response['displyMessage'] ="Invalid Credentials";
		}
		print_r(json_encode($response));
		break;
// end login

// start manage user
		case "manage_user":
		if($_REQUEST['type'] === 'Add' )
		{
//print_r($_REQUEST);exit;
			$param =array();
			$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
			$userdetails = $User->get_user_details($param)['data'];
//print_r($userdetails);exit;
			if ($userdetails == null) {
				if(isset($_FILES) && count($_FILES) > 0){  
//print_r($_FILES);exit;

					$sound_path = "../../../assets/uploads/";

					$goal_path = $sound_path .basename( $_FILES['uploaded_file']['name']);  

					if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $goal_path))  
					{  

						$_REQUEST['image'] = $_PATH['assets'].'/uploads/'.basename( $_FILES['uploaded_file']['name']);

//print_r($_REQUEST);exit;

						$_REQUEST['rawPassword'] = $_REQUEST['password']; 
						$_REQUEST['password'] = md5($_REQUEST['password']);
						$_REQUEST['roleId'] = '2';

						$flag = $User->manage_user($_REQUEST);
						$msg = 'Successfully Updated';
					}


				}else{

					$_REQUEST['rawPassword'] = $_REQUEST['password']; 
					$_REQUEST['password'] = md5($_REQUEST['password']);
					$_REQUEST['roleId'] = '2';

					$flag = $User->manage_user($_REQUEST);
					$msg = 'Successfully Updated';
				}

//print_r($flag);exit;
				$param =array();
				$param['conditionParam']['param']['id'] = $flag;
				$userdetails = $User->get_user_details($param)['data'];
				$msg = 'Successfully Added';

			}
			$emsg = 'Already Registered';
		}
		else if($_REQUEST['type'] === 'Edit' )
		{
			$flag = $user->manage_user($_REQUEST);
			$param =array();
			$param['conditionParam']['param']['id'] = $_REQUEST['editId'];
			$userdetails = $User->get_user_details($param)['data'];
			$msg = 'Successfully Updated';
			$emsg = 'Some error occured...Please Try again';
		}
		else if($_REQUEST['type'] === 'Delete' )
		{
			$msg = 'Successfully Deleted';
			$emsg = 'Some error occured...Please Try again';
		}
//print_r($flag);exit;
		if($flag != 0){
			$response['status'] = true;
			$response['data'] = $userdetails ;
			$response['displyMessage'] = $msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] = $emsg;
		}
		print_r(json_encode($response));
		break; 

//end manage user


  case "sendInvoiceMail":

    	if(!isset($_REQUEST['mailId']) && empty($_REQUEST['mailId']) )
  	   {
  	   		echo 'Email Id Is Required';exit;
  	   }

       $_REQUEST['orderId'] = base64_encode($_REQUEST['orderId']);
       $mailId = $_REQUEST['mailId'];
       $subject = "Invoice Information";
       $from = "payment@goeasypos.com";
       $fromName = "Cash Register";
       // echo '<pre>';print_r($_REQUEST);exit;
       ob_start();
       include('invoice/saleprintMailTemplate.php');
       $html = ob_get_contents();
       ob_end_clean();
       $isSent = 0;
       // echo $html;exit;
      if($html!=''){
       $phpMailerObject = new  GlobalMailer();
       $isSent = $phpMailerObject->sendMailInvoice($mailId, "Cash Register" , $html, $subject, $from, $fromName, new PHPMailer);
      }
       if($isSent>0){
       $response['status'] = true;
       $response['data'] = $isSent;
       $response['displyMessage'] ="Mail Send Successfully";
       }else{
       $response['status'] = false;
       $response['data'] = $isSent;
       $response['displyMessage'] ="Mail Send Failed";
       }
       print_r(json_encode($response));

      break;


  case "sendInvoiceMobileNumber":
       
  	   if(!isset($_REQUEST['mobileNumber']) && empty($_REQUEST['mobileNumber']) )
  	   {
  	   		echo 'Mobile Number Is Required';exit;
  	   }

       $mobileNumber = $_REQUEST['mobileNumber'];
       $userId = $_REQUEST['userId'];
       $isSent = 0;


       $param =array();
	   $param['conditionParam']['param']['id'] = $_REQUEST['orderId'];
	   $orderDetails = $Order->get_order_details($param)['data'];


       $param =array();
	   $param['conditionParam']['param']['id'] = $orderDetails->userId;
	   $userdetails = $User->get_user_details($param)['data'];

       $sms = new Sms();
       $msg = 'Thank you for visiting '.$userdetails->companyName.'. Your total Invoice bill is Rs '.$orderDetails->totalPrice.'. We look forward to your next visit. Have a nice day :-)';
       $isSent= $sms->send_sms($mobileNumber,$msg);
       
       if(isset($isSent) && !empty($isSent)){
	       $response['status'] = true;
	       $response['data'] = $isSent;
	       $response['displyMessage'] ="Invoice Sent Successfully Over Mobile";
       }else{
	       $response['status'] = false;
	       $response['data'] = $isSent;
	       $response['displyMessage'] ="Invoice Sent Failed Over Mobile";
       }
       print_r(json_encode($response));

      break;

       



   case "place_order":
   		$order = array();
   		$orderItem = array();

   	   $order['type'] = 'Add';
   	   $order['subtotal'] = $_REQUEST['subtotal'];
   	   $order['totalPrice'] = $_REQUEST['totalPrice'];
   	   $order['customerId'] = $_REQUEST['customerId'];
   	   $order['paymentMethod'] = $_REQUEST['paymentMethod'];
   	   $order['isConfirmed'] = $_REQUEST['isConfirmed'];
   	   $order['userId'] = $_REQUEST['userId'];
   	   if(isset($_REQUEST['checkNumber']))
   	   		$order['checkNumber'] = $_REQUEST['checkNumber'];
   	   if(isset($_REQUEST['bankName']))
   	   		$order['bankName'] = $_REQUEST['bankName'];

       $flag = $Order->manage_order($_REQUEST);

       if($flag>0)
       {

	       $itemArray = explode(",", $_REQUEST['itemId']);
	       $quantityArray = explode(",", $_REQUEST['quantity']);

	       foreach ($itemArray as $key => $value) 
	       {

	       		$param =array();
				$param['conditionParam']['param']['id'] = $value;
	       		$itemDetails = $Item->get_item_details($param)['data'];

	       		$orderItem = array();
	       		$orderItem['type'] = 'Add' ;
	       		$orderItem['orderId'] = $flag;
	       		$orderItem['itemId'] = $value;
	       		$orderItem['quantity'] = $quantityArray[$key];
	       		$orderItem['unitPrice'] = $itemDetails->sellPrice; 
	       		$orderItem['totalPrice'] = $itemDetails->sellPrice * $quantityArray[$key];

	       		$flagitems = $OrderItems->manage_orderitems($orderItem);

	       }
       }

       if($flag>0){
       $response['status'] = true;
       $response['displyMessage'] =" Order Placed Successfully ";
       $response['orderId'] = $flag;
       }else{
       $response['status'] = false;
       $response['displyMessage'] =" There is some error ! Please try again ";
       $response['orderId'] = $flag;
       }
       print_r(json_encode($response));
        break; 



// start change password
		case "change_password":
		$flag=0;
		/*echo '<pre>';print_r($_REQUEST);exit;*/
		$param =array();
		$param['conditionParam']['param']['id'] = $_REQUEST['editId'];
		$userdetails = $User->get_user_details($param)['data'];
//print_r($userdetails); exit;
		if($userdetails != null && $userdetails->password === md5($_REQUEST['password'])){
			$_REQUEST['type'] = "Edit";
			$_REQUEST['editId']=$userdetails->id;
			$_REQUEST['rawPassword'] = $_REQUEST['password1'];
			$_REQUEST['password']=md5($_REQUEST['password1']);
			$flag = $User->manage_user($_REQUEST);
		}

		if($flag != 0){
			$response['status'] = true;
			$response['displyMessage'] ="Your password has been Successfully Change";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="Error!! Please try Again!!";
		}
		print_r(json_encode($response));
		break; 
// end change password  
// start manage customer
		case "manage_customer":

			$flag = 0;
			$param =array();
			$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
			$param['conditionParam']['param']['contactNumber'] = $_REQUEST['contactNumber'];
			$customerdetails = $Customer->get_customer_list($param)['data'];

			if(count($customerdetails) <= 0)
			{

				if($_REQUEST['type'] === 'Add' )
				{
					$flag = $Customer->manage_customer($_REQUEST);
					$param =array();
					$param['conditionParam']['param']['id'] = $flag;
					$customerdetails = $Customer->get_customer_details($param)['data'];
					$msg = 'Successfully Added';
					$emsg = 'Already Registered';
				}
				else if($_REQUEST['type'] === 'Edit' )
				{
					$flag = $Customer->manage_customer($_REQUEST);
					$param =array();
					$param['conditionParam']['param']['id'] = $_REQUEST['editId'];
					$customerdetails = $Customer->get_customer_details($param)['data'];
					$msg = 'Successfully Updated';
					$emsg = 'Some error occured...Please Try again';
				}
				else if($_REQUEST['type'] === 'Delete' )
				{
					$msg = 'Successfully Deleted';
					$emsg = 'Some error occured...Please Try again';
				}	

			}

			


		if($flag>0){     
			$response['status'] = true;
			$response['data'] = $customerdetails ;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] =$emsg;
		}  
		print_r(json_encode($response));
		break;  
//end manage customer


// start manage category
		case "manage_category":

			$flag = 0;
			$param =array();
			$param['conditionParam']['param']['categoryName'] = $_REQUEST['categoryName'];
			$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
			$categorydetails = $Category->get_category_list($param)['data'];

			if(count($categorydetails) <= 0)
			{
				if($_REQUEST['type'] === 'Add' )
				{
					if(isset($_FILES)){  

						$sound_path = "images/";

						$goal_path_image = $sound_path.time().basename( $_FILES['image']['name']);  

						if(move_uploaded_file($_FILES['image']['tmp_name'], $goal_path_image))  
						{  
							$_REQUEST['image'] = $goal_path_image;
						}


						$flag = $Category->manage_category($_REQUEST);


					}else{
						$flag = $Category->manage_category($_REQUEST);
					}
					$param =array();
					$param['conditionParam']['param']['id'] = $flag;
					$categorydetails = $Category->get_category_details($param)['data'];
					$msg = 'Successfully Added';
					$emsg = 'Already Registered';
				}
				else if($_REQUEST['type'] === 'Edit' )
				{
					$flag = $Category->manage_category($_REQUEST);
					$param =array();
					$param['conditionParam']['param']['id'] = $_REQUEST['editId'];
					$categorydetails = $Category->get_category_details($param)['data'];
					$msg = 'Successfully Updated';
					$emsg = 'Some error occured...Please Try again';
				}
				else if($_REQUEST['type'] === 'Delete' )
				{
					$msg = 'Successfully Deleted';
					$emsg = 'Some error occured...Please Try again';
				}
			}

			

//print_r($list);exit;
		if($flag>0){     
			$response['status'] = true;
			$response['data'] = $categorydetails ;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] =$emsg;
		}  
		print_r(json_encode($response));
		break;   
//end manage category



// start category list
		case "get_category_list":
		$param =array();
		$param['conditionParam']['param']['userId'] = $_REQUEST['id'];
		$param['conditionParam']['param']['status'] = 1;
		$list = $Category->get_category_list($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;
// end category list  


case "get_payment_method_list":
		$param =array();
		$param['conditionParam']['param']['status'] = 1;
		$list = $PaymentMethods->get_payment_method_list($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;  


		case "get_recent_payments":
		$param =array();
		$param['orderBy'] = 'id DESC';
		$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
		$param['conditionParam']['param']['isConfirmed'] = 1;
		$list = $Order->get_order_list($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

		case "get_order_items_by_order":
		$param =array();
		$param['conditionParam']['param']['orderId'] = $_REQUEST['orderId'];
		$list = $OrderItems->get_orderitems_list($param)['data'];
		//print_r($list);
		foreach ($list as $key => $value) {
			//echo "<pre>"; print_r($value['itemId']);
			$param =array();
			$param['conditionParam']['param']['id'] = $value['itemId'];
			$itemdetails = $Item->get_item_details($param)['data'];
			
			$list[$key]['itemName'] = $itemdetails->productName;
		}//exit;
		
		// echo '<pre>';print_r($list);exit;
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;


// start category list
		case "get_parent_category_list":
		$param =array();
		$param['conditionParam']['param']['userId'] = $_REQUEST['id'];
		$param['conditionParam']['param']['parentCategory'] = 0;
		$param['conditionParam']['param']['status'] = 1;
		$list = $Category->get_category_list($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;
// end category list 



// start manage Product/item
		case "manage_product":


			$flag = 0;
			$param =array();
			$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
			$param['conditionParam']['param']['productName'] = $_REQUEST['productName'];
			$itemdetails = $Item->get_item_list($param)['data'];

			if(count($itemdetails) <= 0)
			{
				if($_REQUEST['type'] === 'Add' )
					{
						if(isset($_FILES)){  
						 

							$sound_path = "images/";

							$goal_path_image = $sound_path.time().basename( $_FILES['image']['name']);  

							if(move_uploaded_file($_FILES['image']['tmp_name'], $goal_path_image))  
							{  
								$_REQUEST['image'] = $goal_path_image;
							}
							

							$flag = $Item->manage_account($_REQUEST);


						}else{

			//print_r($_REQUEST);exit;

							$flag = $Item->manage_account($_REQUEST);
						}

						$param =array();
						$param['conditionParam']['param']['id'] = $flag;
						$itemdetails = $Item->get_item_details($param)['data'];
						$msg = 'Successfully Added';

					}
			}

					

//print_r($list);exit;
		if($flag>0){     
			$response['status'] = true;
			$response['data'] = $itemdetails ;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="Please try again!!";
		}  
		print_r(json_encode($response));
		break;   
//end manage Product/item

// start product list

		case "get_product_list":
		$param =array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Category->get_category_details($param)['data'];
		$list= $details;
		$param =array();
		$param['conditionParam']['param']['categoryId'] = $_REQUEST['id'];
		$list = $Item->get_item_list($param)['data'];
		if(count($list)>0){
			$response['status'] = true;
			$response['categorydetails'] = $details;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

// end product list

// start forgot password

		case "forgot_password":

		$param =array();
		$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
		$userdetails = $User->get_user_details($param)['data']; 
// print_r($userdetails);exit;
		if($userdetails != null){

// $subject = "ContactUs";

//     $from = "rishabh.saxena@dcubecoders.com";

//     $fromName = "Cash Register";         
//     $to = "anurag.sharma@dcubecoders.com";
//     $subject = "My subject";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type: plain/text; charset: utf8\r\n";
//     $headers = "From: support@yumtiff.com" . "\r\n" .
//     "CC: somebodyelse@example.com";
//     $text = substr(uniqid(), 0, 10);
//     $_REQUEST['password']=md5($text); 
//     $mail = mail($to,$subject,$text,$headers);


			$subject = "Forget Password";
			$from = "rishabh.saxena@companynonstop.com";
			$fromName = "Cash Register";
			$text = substr(uniqid(), 0, 10);
			$_REQUEST['editId']= $userdetails->id;
			$_REQUEST['type']='Edit';
			$_REQUEST['rawPassword']=$text; 
			$_REQUEST['password']=md5($text); 
			$flag = $User->manage_user($_REQUEST);
// print_r($flag);exit;
			$html = 
			'<p>Password :'.$text.'<br></p>';
			$phpMailerObject =   new  GlobalMailer();
//print_r($_REQUEST['email']);exit();
			$send =   $phpMailerObject->sendMail($_REQUEST['mailId'],'',$html,$subject,$from,$fromName,new PHPMailer);   



		}

		if($flag>0){
			$response['status'] = true;
			$response['displyMessage'] ="Your password has been sent to your Mail Id";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="Please enter registered email id!!";
		}
		print_r(json_encode($response));
		break; 

		case "get_category_by_product_list":
		$param =array();
		$param['conditionParam']['param']['status'] = 1;
		$param['conditionParam']['param']['userId'] = $_REQUEST['id'];
		$list = $Category->get_category_list($param)['data'];
		foreach ($list as $key => $value) {
			$param =array();
			$param['conditionParam']['param']['categoryId'] = $value['id'];
			$itemlist = $Item->get_item_list($param)['data'];
			$list[$key]['productdetails'] = $itemlist;
		}
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

		case "get_customer_details_by_number":
		$param =array();
		$param['conditionParam']['param']['contactNumber'] = $_REQUEST['contactNumber'];
		$param['conditionParam']['param']['userId'] = $_REQUEST['id'];
		$customerdetails = $Customer->get_customer_details($param)['data'];

		if(count($customerdetails)>0){
			$response['status'] = true;
			$response['data'] = $customerdetails;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

		case "get_customer_list":
		$param =array();
		$param['conditionParam']['param']['status'] = 1;
		$param['conditionParam']['param']['userId'] = $_REQUEST['id'];
		$list = $Customer->get_customer_list($param)['data'];

		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list;
			$response['displyMessage'] ="Successfully Listed";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

// end customer list

// start manage Product/item
		case "manage_cart":
// print_r($_REQUEST);exit;
		if($_REQUEST['type'] === 'Add' )
		{
//print_r($_REQUEST);exit;
			$flag = $Cart->manage_cart($_REQUEST);
			$param =array();
			$param['conditionParam']['param']['id'] = $flag;
			$itemdetails = $Cart->get_cart_details($param)['data'];
			$msg = 'Successfully Added';

		}
		if($_REQUEST['type'] === 'Delete' )
		{
//print_r($_REQUEST);exit;
			$flag = $Cart->manage_cart($_REQUEST);
			$param =array();
			$param['conditionParam']['param']['id'] = $flag;
			$itemdetails = $Cart->get_cart_details($param)['data'];
			$msg = 'Successfully Added';

		}

		if($flag>0){     
			$response['status'] = true;
			$response['data'] = $itemdetails ;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="Please try again!!";
		}  
		print_r(json_encode($response));
		break;   
//end manage Product/item

		case "check_cart": 



		$param=array();
		$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
		$list = $Cart->get_cart_list($param)['data']; 
		foreach ($list as $key => $value) {

			$param =array();
			$param['conditionParam']['param']['id'] = $value['itemId'];
			$details = $Item->get_item_details($param)['data'];
			$list[$key]['itemDetail'] = $details;
		}



//echo count($cartdetails);exit;
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $list ;
			$response['displyMessage'] ="Already Exist !";
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

		case "daily_sales": 

		$currentDate = date("Y-m-d",time());

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] = $currentDate."%";
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  'LIKE ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  ' = ';
		$param['conditionParam']['condition'][] = $condition;
		$list = $Order->get_order_list($param)['data']; 


//print_r($list);exit;
		$totalamount = 0;
		$msg = 'Successfully Listed';
		foreach ($list as $key => $value) {

			$totalamount =   $totalamount + $value['totalPrice'];
			$order['totalamount'] = $totalamount;
		}
		$order['Totaldailyorder'] = count($list);
//echo count($cartdetails);exit;
		if(count($list)>0){
			$response['status'] = true;
			$response['data'] = $order ;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;

		case "weekly_sales": 
		$monday = 0;
		$totalPriceMonday = 0;

		$tuesday = 0;
		$totalPriceTuesday = 0;

		$wednesday = 0;
		$totalPriceWednesday = 0;

		$thursday = 0;
		$totalPriceThursday = 0;

		$friday = 0;
		$totalPriceFriday = 0;

		$saturday = 0;
		$totalPriceSaturday = 0;

		$sunday = 0;
		$totalPriceSunday = 0;

		$weeklyarr = array();

		$date= date('Y-m-d', strtotime('last Monday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderMonday = $Order->get_order_list($param)['data']; 
// print_r($OrderMonday);
		foreach ($OrderMonday as $value) {
			$monday++;
			$totalPriceMonday = $totalPriceMonday + $value['totalPrice'];
		}

		$date= date('Y-m-d', strtotime('last Tuesday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderTuesday = $Order->get_order_list($param)['data']; 
//print_r($OrderTuesday);
		foreach ($OrderTuesday as $value) {
			$tuesday++;
			$totalPriceTuesday = $totalPriceTuesday + $value['totalPrice'];
		}

		$date= date('Y-m-d', strtotime('last Wednesday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderWednesday = $Order->get_order_list($param)['data']; 
// print_r($OrderWednesday);
		foreach ($OrderWednesday as $value) {
			$wednesday++;
			$totalPriceWednesday = $totalPriceWednesday + $value['totalPrice'];
		}
		$date= date('Y-m-d', strtotime('last Thursday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderThursday = $Order->get_order_list($param)['data']; 
//print_r($OrderThursday);
		foreach ($OrderThursday as $value) {
			$thursday++;
			$totalPriceThursday = $totalPriceThursday + $value['totalPrice'];
		}
		$date= date('Y-m-d', strtotime('last Friday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderFriday = $Order->get_order_list($param)['data']; 
//print_r($OrderFriday);
		foreach ($OrderFriday as $value) {
			$friday++;
			$totalPriceFriday = $totalPriceFriday + $value['totalPrice'];
		}
		$date= date('Y-m-d', strtotime('last Saturday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;

		$OrderSaturday = $Order->get_order_list($param)['data']; 
// print_r($OrderSaturday);
		foreach ($OrderSaturday as $value) {
			$saturday++;
			$totalPriceSaturday = $totalPriceSaturday + $value['totalPrice'];
		}
		$date= date('Y-m-d', strtotime('last Sunday'));

		$param = array();
		$param['conditionParam']['conditionType'] = 'aggregate';
		$param['conditionParam']['condition'] = array();
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 00:00:00';
		$condition['fieldOperator'] =  ' >= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['createdOn'] =  $date.' 23:59:59';
		$condition['fieldOperator'] =  ' <= ';
		$condition['clauseOperator'] =  ' AND ';
		$param['conditionParam']['condition'][] = $condition;
		$condition = array();
		$condition['param']['userId'] = $_REQUEST['userId'];    
		$condition['clauseOperator'] =  ' AND ';
		$condition['fieldOperator'] =  '=';
		$param['conditionParam']['condition'][] = $condition;      
		$OrderSunday = $Order->get_order_list($param)['data'];
// print_r($OrderSunday); 
		foreach ($OrderSunday as $value) {
			$sunday++;
			$totalPriceSunday = $totalPriceSunday + $value['totalPrice'];
		}   

		$count = array("monday"=>$monday,"tuesday"=>$tuesday,"wednesday"=>$wednesday,"thursday"=>$thursday,"friday"=>$friday,"saturday"=>$saturday,"sunday"=>$sunday);

		$count['Totalweeklycount'] = $monday + $tuesday + $wednesday + $thursday + $friday + $saturday + $sunday;

		$sale = array("totalPriceMonday"=>$totalPriceMonday, "totalPriceTuesday"=>$totalPriceTuesday,"totalPriceWednesday"=>$totalPriceWednesday,"totalPriceThursday"=>$totalPriceThursday,"totalPriceFriday"=>$totalPriceFriday,"totalPriceSaturday"=>$totalPriceSaturday,"TotalPriceSunday"=>$totalPriceSunday);   

		$sale['TotalweeklyAmount'] = $totalPriceMonday + $totalPriceTuesday + $totalPriceWednesday + 
		$totalPriceThursday + $totalPriceFriday + $totalPriceSaturday +
		$totalPriceSunday ;      

		$msg = 'Successfully Listed';
		if(count($count)>0){
			$response['status'] = true;
			$response['sale'] = $count;
			$response['price'] = $sale;
			$response['displyMessage'] =$msg;
		}else{
			$response['status'] = false;
			$response['displyMessage'] ="No data Found!!";
		}
		print_r(json_encode($response));
		break;



case "get_sales_by_month":  // for sales according to month

$param = array();
$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
$param['conditionParam']['param']['status'] = 1;
$list = $Order->get_order_list($param)['data'];

$jan = 0;
$totalPriceJan = 0;

$feb = 0;
$totalPriceFeb = 0;

$mar = 0;
$totalPriceMar = 0;

$apr = 0;
$totalPriceApr = 0;

$may = 0;
$totalPriceMay = 0;

$june = 0;
$totalPriceJune = 0;

$july = 0;
$totalPriceJuly = 0;

$aug = 0;
$totalPriceAug = 0;

$sep = 0;
$totalPriceSep = 0;

$oct = 0;
$totalPriceOct = 0;

$nov = 0;
$totalPriceNov = 0;

$dec = 0;
$totalPriceDec = 0;

$date = time();
$currentyear = date("Y", $date);

foreach ($list as $value) {

	$month = substr($value['createdOn'],5,-12);

	$year = substr($value['createdOn'],0,-15);   
	if($month == '01' && $year == $currentyear){
		$jan++;
		$totalPriceJan = $totalPriceJan + $value['totalPrice'];
	}
	elseif($month == '02' && $year == $currentyear){
		$feb++;
		$totalPriceFeb = $totalPriceFeb + $value['totalPrice'];
	}
	elseif ($month == '03' && $year == $currentyear) {
		$mar++;
		$totalPriceMar = $totalPriceMar + $value['totalPrice'];
	}
	elseif ($month == '04' && $year == $currentyear) {
		$apr++;
		$totalPriceApr = $totalPriceApr + $value['totalPrice'];
	}
	elseif ($month == '05' && $year == $currentyear) {
		$may++;
		$totalPriceMay = $totalPriceMay + $value['totalPrice'];
	}
	elseif ($month == '06' && $year == $currentyear) {
		$june++;
		$totalPriceJune = $totalPriceJune + $value['totalPrice'];
	}
	elseif ($month == '07' && $year == $currentyear) {
		$july++;
		$totalPriceJuly = $totalPriceJuly + $value['totalPrice'];
	}
	elseif ($month == '08' && $year == $currentyear) {
		$aug++;
		$totalPriceAug = $totalPriceAug + $value['totalPrice'];
	}
	elseif ($month == '09' && $year == $currentyear) {
		$sep++;
		$totalPriceSep = $totalPriceSep + $value['totalPrice'];
	}
	elseif ($month == '10' && $year == $currentyear) {
		$oct++;
		$totalPriceOct = $totalPriceOct + $value['totalPrice'];
	}
	elseif ($month == '11' && $year == $currentyear) {
		$nov++;
		$totalPriceNov = $totalPriceNov + $value['totalPrice'];
	}
	elseif ($month == '12' && $year == $currentyear) {
		$dec++;
		$totalPriceDec = $totalPriceDec + $value['totalPrice'];
	}
}

$count = array("january"=>$jan,"February"=>$feb,"March"=>$mar,"April"=>$apr,"May"=>$may,"June"=>$june,"July"=>$july,"August"=>$aug,"September"=>$sep,"October"=>$oct,"November"=>$nov,"December"=>$dec);

$count['Totalyearlysale'] = $jan + $feb + $mar + $apr + $may + $june + $july + $aug + $sep + $oct + 
$nov + $dec;

$sale = array("TotalPriceJan"=>$totalPriceJan, "TotalPriceFeb"=>$totalPriceFeb,"TotalPriceMar"=>$totalPriceMar,"TotalPriceApr"=>$totalPriceApr,"TotalPriceMay"=>$totalPriceMay,"TotalPriceJune"=>$totalPriceJune,"TotalPriceJuly"=>$totalPriceJuly,"TotalPriceAug"=>$totalPriceAug,"TotalPriceSep"=>$totalPriceSep,"TotalPriceOct"=>$totalPriceOct,"TotalPriceNov"=>$totalPriceNov,"TotalPriceDec"=>$totalPriceDec); 

$sale['TotalyearlyAmount'] = $totalPriceJan + $totalPriceFeb + $totalPriceMar + $totalPriceApr +     
$totalPriceMay + $totalPriceJune + $totalPriceJuly + $totalPriceAug +
$totalPriceSep + $totalPriceOct + $totalPriceNov + $totalPriceDec;
if(count($count)>0){
	$response['status'] = true;
	$response['month'] = $count;
//$response['Totalyearlysale'] = $count;
	$response['price'] = $sale;
	$response['displyMessage'] ="Successfully Listed";
}else{
	$response['status'] = false;
	$response['data'] = null;
	$response['displyMessage'] ="No data Found!!";
}
print_r(json_encode($response));
break;



case "get_sales_by_year":  // for sales according to year

$param = array();
$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
$param['conditionParam']['param']['status'] = 1;
$list = $Order->get_order_list($param)['data'];

$saleCount = 0;
$totalPrice = 0;

$date = time();
$currentyear = date("Y", $date);

foreach ($list as $value) {

	$year = substr($value['createdOn'],0,-15);

	if($year == $currentyear){
		$saleCount++;
		$totalPrice = $totalPrice + $value['totalPrice'];
	}

}
if(count($saleCount)>0){
	$response['status'] = true;
	$response['saleCount'] = $saleCount;
	$response['price'] = $totalPrice;
	$response['displyMessage'] ="Successfully Listed";
}else{
	$response['status'] = false;
	$response['data'] = null;
	$response['displyMessage'] ="No data Found!!";
}
print_r(json_encode($response));
break;


case "get_top_10_sales_by_day":  


$date=date("Y-m-d");

$param = array();
$param['conditionParam']['conditionType'] = 'aggregate';
$param['conditionParam']['condition'] = array();
$condition = array();
$condition['param']['createdOn'] =  $date.' 00:00:00';
$condition['fieldOperator'] =  ' >= ';
$condition['clauseOperator'] =  ' AND ';
$param['conditionParam']['condition'][] = $condition;
$condition = array();
$condition['param']['createdOn'] =  $date.' 23:59:59';
$condition['fieldOperator'] =  ' <= ';
$condition['clauseOperator'] =  ' AND ';
$param['conditionParam']['condition'][] = $condition;
$list = $OrderItems->get_orderitems_list($param)['data'];
//print_r($datials);exit;
//SELECT * FROM `tbl_order_items` WHERE createdOn = '2017-06-23' AND status = '1' ORDER BY `id` DESC
// $data = SELECT Count(id) FROM order_items;
// $list = raw_query($data);
if(count($list)>0){
	$response['status'] = true;
	$response['data'] = $list;
	$response['displyMessage'] ="Successfully Listed";
}else{
	$response['status'] = false;
	$response['data'] = null;
	$response['displyMessage'] ="No data Found!!";
}
print_r(json_encode($response));
break;

default:
echo "sorry some parameters is Missing!!";
break;

}

} 
?>






<?php 
// cash register
?>