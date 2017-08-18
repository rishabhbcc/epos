<?php
include_once 'includes.php';
function generateBraintreeId($request)
{ 	
	$response = array();
	$braintreeId = '';
	//$dateOfBirthSplitted = explode('/',$request['dateOfBirth']);
	//$dateOfBirth = $dateOfBirthSplitted[2].'-'.$dateOfBirthSplitted[0].'-'.$dateOfBirthSplitted[1];
	$result = Braintree_MerchantAccount::create(
	  array(
	    'individual' => array(
	      'firstName' => $request['firstName'],
	      'lastName' => $request['lastName'],
	      'email' => $request['mailId'],
	      'phone' => $request['phoneNumber'],
	      'dateOfBirth' => $request['dateOfBirth'],
	      'ssn' => '',
	      'address' => array(
	        'streetAddress' => $request['streetAddress'],
	        'locality' => $request['locality'],
	        'region' => $request['region'],
	        'postalCode' => $request['postalCode']
	      )
	    ),
	     'funding' => array(
	      'destination' => Braintree_MerchantAccount::FUNDING_DESTINATION_BANK,
	      'accountNumber' => '1123581321',
	      'routingNumber' => '071101307'
	    ),
	   
	    'tosAccepted' => true,
	    'masterMerchantAccountId' => "qw292wxwhq6s5vs2",
	    'id' => ""
	  ) 
	);
	if ($result->success) {
	   	$braintreeId = $result->merchantAccount->id;
		$response['status'] = 1;
		$response['braintreeId'] = $braintreeId;
	}
	else 
	{
	    $response['status'] = 0;
	    $response['braintreeId'] = null;
	    $response['errors'] = $result->errors->deepAll();
	    /*echo("Validation errors:<br/>");
	    foreach (($result->errors->deepAll()) as $error) {
	        echo("- " . $error->message . "<br/>");
	        //die;
	    }*/
	}
	return $response;
}
?>