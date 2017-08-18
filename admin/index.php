 <?php 
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   include 'includes/global/config.php';
   include 'includes/global/autoloader.php';
   include '../plug_in/html_purifier/library/HTMLPurifier.auto.php';
   $config = HTMLPurifier_Config::createDefault();
   $purifier = new HTMLPurifier($config);
   
   //if(!isset($_SESSION[$_SESSION_ID]['configuration']))
   {
   	$param = array();
   	$param['conditionParam']['param']['id'] = 1;
   	$_SESSION[$_SESSION_ID]['configuration'] = $System->get_configuration_details($param)['data'];
   }
 
   if(!isset($_SESSION[$_SESSION_ID]['guestAccessToken']))
   	$_SESSION[$_SESSION_ID]['guestAccessToken'] = $Generic->generate_random_alphanumeric_string(50);
   include ('includes/global/head.php');
   $user = null;
   if(isset($_SESSION[$_SESSION_ID]['admin']))
   	include ('includes/global/header.php');
   if(isset($_SESSION[$_SESSION_ID]['admin']))
   	$user = $_SESSION[$_SESSION_ID]['admin'];
   
   if($user != null)
   	include 'includes/global/left_bar.php';
   
   ?>
<script>
   jQuery("ul.collapse").slideUp(0);
</script>
<?php 
   switch(@base64_decode($_GET['url']))
   {
   // start dashboard		
   case "dashboard" :
   	{
   		include("includes/content/dashboard.php");
   		break;
   	}
   // end dashboard
   // start configuration
   case "configuration" :
   	{
   		include("includes/content/configuration.php");
   		break;
   	}
   // end configuration
    case "notification" :
      {
         include("includes/content/notification.php");
         break;
      }
   // start Admin  user
      case "admin" :
   	{
   		include("includes/content/admin.php");
   		break;
   	}
   // end Admin user
   // start user
      case "user" :
   	{
   		include("includes/content/user.php");
   		break;
   	}
   // end user
   
   // start user
      case "user" :
      {
         include("includes/content/user.php");
         break;
      }
   // end user
      case "saleSummary" :
      {
         include("includes/content/reports/saleSummary.php");
         break;
      }

       case "saleByHour" :
      {
         include("includes/content/reports/saleByHour.php");
         break;
      }

       case "todaySale" :
      {
         include("includes/content/reports/todaySale.php");
         break;
      }

        case "paymentReport" :
      {
         include("includes/content/reports/paymentReport.php");
         break;
      }

          case "salesreports" :
      {
         include("includes/content/reports/salesreports.php");
         break;
      }


      case "customerReport" :
      {
         include("includes/content/reports/customerReport.php");
         break;
      }
   
  
   // start customer
   case "customer" :
   	{
   		include("includes/content/customer.php");
   		break;
   	}
   // end customer
  
       
   // start default 
   	default :
   	{
   		if($user != null)
   			include("includes/content/dashboard.php");
   		else
   			include("includes/content/login.php");
   		break;
   	}
   // end Default
   }
   ?>
<?php
   if(isset($_SESSION[$_SESSION_ID]['admin']))
   	include ('includes/global/footer.php') 
   ?>