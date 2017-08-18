<?php
/* GLOBAL VARIABL */
$myDomain='http://epos.goeasypos.com';
 // $myDomain='http://localhost/immidia';

	
	$_SESSION_ID = 'cnstesti_'; // define session Id
	$_SESSION_DOMAIN = $myDomain;
	$_SESSION_ADMIN_DOMAIN = $myDomain.'/admin';

	$_PATH = array(
		'adminPrefix'=>'admin/',
		'websiteRoot'=>$myDomain,
		'root'=>$myDomain.'/admin',
		'assets'=>$myDomain.'/admin/assets',
		'images'=>$myDomain.'/admin/assets\front\images',
		'uploads'=>$myDomain.'/assets/uploads',
		'formHandler'=>$myDomain.'/admin/form_handler.php',
		'ajaxFormHandler'=>$myDomain.'/admin/ajax_form_handler.php'
	);
	$_ADMIN_PATH = array(
		'adminPrefix'=>'',
		'websiteRoot'=>$myDomain,
		'root'=>$myDomain.'/admin',
		'assets'=>$myDomain.'/admin/assets',
		'images'=>$myDomain.'/admin/assets\front\images',
		'uploads'=>$myDomain.'/assets/uploads',
		'formHandler'=>$myDomain.'/admin/form_handler.php',
		'ajaxFormHandler'=>$myDomain.'/admin/ajax_form_handler.php'
	);
	 define('alertCounter',0);
?>

