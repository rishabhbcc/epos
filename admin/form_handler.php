<?php
   ob_start();
   include 'includes/global/config.php';
   include("includes/global/autoloader.php");
   include '../plug_in/html_purifier/library/HTMLPurifier.auto.php';
   
   $config = HTMLPurifier_Config::createDefault();
   $purifier = new HTMLPurifier($config);
   use Plivo\RestAPI;
   use Plivo\Response;
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
   $action = $_REQUEST['action'];
   $smessage="Data successfully updated.."; 
   $emessage="Data updation failed";
   switch($action)
   {	
// start login  
   	case "login":
   		$param = array();
   		$emessage = 'Invalid Login Credentials !!!';
   		$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
   		$param['conditionParam']['param']['password'] = md5($_REQUEST['password']);
         $param['conditionParam']['param']['roleId'] =1;
   
   		//$param['conditionParam']['param']['roleId'] = $_REQUEST['roleId'];			
   			$login = $User->get_user_details($param)['data'];
   			
   		if(($login != null))
   		{
   			$_SESSION[$_SESSION_ID]['accessToken'] = $Generic->generate_random_alphanumeric_string(50);
   			$_SESSION[$_SESSION_ID]['admin'] = $login;
   			header("Location: ./?url=dashboard");
   		}
   		else
   			header("Location: ./?status=error&msg=".$emessage);
   		break;
//end login 
//start manageconfiguration  	
   	case "manageConfiguration":
   		if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
   		{
   			include 'includes/content/blocks/invalid_access.php';
   			exit;
   		}
   		$flag = null;
   		$emessage = 'Configuration could be saved. Please try again.';
   		$smessage = 'Configuration has been saved successfully.';
   		$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
   		if(isset($_FILES['logo']['name']) && ($_FILES['logo']['name'] != null))
   		{
   			$fileName = $_FILES['logo']['name'];
   			$extension = explode('.',$fileName);
   			$logoExtension = strtoupper($extension[count($extension)-1]);
   			if(!in_array($logoExtension,$validExtensions))
   			{
   				$flag = -1;
   				$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
   			}
   		}
   		if(isset($_FILES['fevicon']['name']) && ($_FILES['fevicon']['name'] != null))
   		{
   			$fileName = $_FILES['fevicon']['name'];
   			$extension = explode('.',$fileName);
   			$feviconExtension = strtoupper($extension[count($extension)-1]);
   			if(!in_array($feviconExtension,$validExtensions))
   			{
   				$flag = -1;
   				$emessage.= 'Usupported Fevicon File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
   			}
   		}
   		if($flag == null)
   			$flag = $System->manage_configuration($_REQUEST);
   		
   		if($flag>0)
   		{
   			header('Location:./?url='.base64_encode('configuration').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
   		}
   		else
   		{
   			header('Location:./?url='.base64_encode('configuration').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
   		}
   	    break;
//  end manageconfiguration
//  start admin    
   		case "admin":
   		if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
   		{
   			include 'includes/content/blocks/invalid_access.php';
   			exit;
   		}
   		$flag = null;
   		$emessage = 'Admin could be saved. Please try again.';
   		$smessage = 'Your details has been updated successfully.';
   		$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
   		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != null))
   		{
   			$fileName = $_FILES['image']['name'];
   			$extension = explode('.',$fileName);
   			$logoExtension = strtoupper($extension[count($extension)-1]);
   			if(!in_array($logoExtension,$validExtensions))
   			{
   				$flag = -1;
   				$emessage.= 'Usupported Profile File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
   			}
   		}
   		
   		if($flag == null)
   			// $_REQUEST['type']="Edit";
   			//  $_REQUEST['edited']=$_SESSION[$_SESSION_ID]['admin']->id;
   			//  $_REQUEST['image']='assets/uploads/'.$_FILES['image']['name'];
   			 //echo "<pre>";print_r($_REQUEST); exit;
   			
   			$flag= $User->manage_user($_REQUEST);
   		//echo "<pre>";print_r($a); exit;
   		
   		if($flag>0)
   		{
   			header('Location:./?url='.base64_encode('admin').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
   		}
   		else
   		{
   			header('Location:./?url='.base64_encode('admin').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
   		}
   	    break;
// end admin

 // Start Manage Notification
 
   case "manageNotification" :
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Notification could not be added. record allready exists. Please try again.';
            $smessage = 'Notification has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Notification could not be edited. Please try again.';
            $smessage = 'Notification has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Notification could not be deleted. Please try again.';
            $smessage = 'Notification  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
         
               if($flag==null)
                     $flag = $Notification->manage_notification($_REQUEST);
                  
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('notification').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('notification').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
         break;


    // End Manage Notification
             
// start user 
          case "user":
   //print_r($_REQUEST);exit;
   
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
   
   
         {
            // server side validation here
            $emessage = 'user could not be added. Please try again.';
            $smessage = 'user has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'user could not be edited. Please try again.';
            $smessage = 'user has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'user could not be deleted. Please try again.';
            $smessage = 'user  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            $validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
            if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != null))
            {
               $fileName = $_FILES['image']['name'];
               $extension = explode('.',$fileName);
               $logoExtension = strtoupper($extension[count($extension)-1]);
               if(!in_array($logoExtension,$validExtensions))
               {
                  $flag = -1;
                  $emessage.= 'Usupported Profile File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
               }
            }
                  
            if($flag == null){
               if($_REQUEST['type']=='Add') {
               $_REQUEST['rawPassword']=$_REQUEST['password'];
               $_REQUEST['password']= md5($_REQUEST['password']);
   
             $flag = $User->manage_user($_REQUEST);
             // print_r($_REQUEST);
             // print_r($flag);
             // echo "Add";exit;
          }
         }
         }
         if($_REQUEST['type'] == 'Edit'){
// print_r($_REQUEST);exit;
            if($_REQUEST['status'] == 'Active'){
               
               $_REQUEST['editId'] =$_REQUEST['id'];
               $_REQUEST['status'] = 1;
               $flag = $User->manage_user($_REQUEST);
            }
            else if($_REQUEST['status'] == 'DeActive'){
               
               $_REQUEST['editId'] =$_REQUEST['id'];
               $_REQUEST['status'] = 0;
               $flag = $User->manage_user($_REQUEST);

            } else { // in case of visit reply

               
               $flag = $User->manage_user($_REQUEST);
            }
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('user').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('user').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
// end users

  case "customer":
   //print_r($_REQUEST);exit;
   
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
   
   
         {
            // server side validation here
            $emessage = 'Customer could not be added. Please try again.';
            $smessage = 'Customer has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Customer could not be edited. Please try again.';
            $smessage = 'Customer has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Customer could not be deleted. Please try again.';
            $smessage = 'Customer  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            $validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
            if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != null))
            {
               $fileName = $_FILES['image']['name'];
               $extension = explode('.',$fileName);
               $logoExtension = strtoupper($extension[count($extension)-1]);
               if(!in_array($logoExtension,$validExtensions))
               {
                  $flag = -1;
                  $emessage.= 'Usupported Profile File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
               }
            }
                  
            if($flag == null){
               
   
             $flag = $Customer->manage_customer($_REQUEST);
         }
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('customer').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('customer').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
// end users

// Start Story

          case "story":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Story could not be added. Please try again.';
            $smessage = 'New Story has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Story could not be edited. Please try again.';
            $smessage = 'Story has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Story could not be deleted. Please try again.';
            $smessage = 'Story  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Story->manage_story($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('story').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('story').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
          
 //end Story


// start event  
    
          case "event":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Event could not be added. Please try again.';
            $smessage = 'New Event has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Event could not be edited. Please try again.';
            $smessage = 'Event has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Event could not be deleted. Please try again.';
            $smessage = 'Event  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Event->manage_event($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('event').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('event').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
 //end event


// start gallery 
          case "gallery":
   //print_r($_REQUEST);exit;
   
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
   
   
         {
            // server side validation here
            $emessage = 'Gallery could not be added. Please try again.';
            $smessage = 'Gallery has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Gallery could not be edited. Please try again.';
            $smessage = 'Gallery has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Gallery could not be deleted. Please try again.';
            $smessage = 'Gallery  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            $validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
            if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != null))
            {
               $fileName = $_FILES['image']['name'];
               $extension = explode('.',$fileName);
               $logoExtension = strtoupper($extension[count($extension)-1]);
               if(!in_array($logoExtension,$validExtensions))
               {
                  $flag = -1;
                  $emessage.= 'Usupported Profile File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
               }
            }
                  
            if($flag == null)
              
   
             $flag = $Gallery->manage_gallery($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('gallery').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('gallery').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
// end users

// start project  
    
          case "project":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Project could not be added. Please try again.';
            $smessage = 'New Project has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add Project
            $emessage = 'Project could not be edited. Please try again.';
            $smessage = 'Project has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Project could not be deleted. Please try again.';
            $smessage = 'Project  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Project->manage_project($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('project').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('project').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
 //end project

// start visit  
    
          case "visit":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Visit could not be added. Please try again.';
            $smessage = 'New Visit has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add Visit
            $emessage = 'Visit could not be edited. Please try again.';
            $smessage = 'Visit has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Visit could not be deleted. Please try again.';
            $smessage = 'Visit  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Visit->manage_visit($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('visit').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('visit').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
 //end project

  // start job  
    
          case "job":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Job could not be added. Please try again.';
            $smessage = 'New Job has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add Job
            $emessage = 'Job could not be edited. Please try again.';
            $smessage = 'Job has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Job could not be deleted. Please try again.';
            $smessage = 'Job  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Job->manage_job($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('job').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('job').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
 //end project  

 // Start Batch Year

          case "batch":
         // print_r($_REQUEST);exit;
         if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
         {
            include 'includes/content/blocks/invalid_access.php';
            exit;
         }
         $flag = null;
         if(($_REQUEST['type']=='Add'))
         {
            // server side validation here
            $emessage = 'Batch Year could not be added. Please try again.';
            $smessage = 'New Batch Year has been added successfully.';
         }
         if(($_REQUEST['type']=='Edit'))
         {
            // server side validation on add event
            $emessage = 'Batch Year could not be edited. Please try again.';
            $smessage = 'Batch Year has been edited successfully.';
         }
         if($_REQUEST['type'] == 'Delete')
         {
            $emessage = 'Batch Year could not be deleted. Please try again.';
            $smessage = 'Batch Year  has been deleted successfully.';
            // server side validation on delete even
         }
         if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
         {
            
                  
            if($flag == null)
               $flag = $Batch->manage_batch($_REQUEST);
         
         }
         if($flag>0)
         {
            header('Location:./?url='.base64_encode('batch').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($smessage));
         }
         else
         {
            header('Location:./?url='.base64_encode('batch').'&tab='.base64_encode('View').'&flag='.base64_encode($flag).'&msg='.base64_encode($emessage));
         }
          break;
          
 //end Story      
 // logout
   
   		case "logout" :
   							unset($_SESSION[$_SESSION_ID]['accessToken']);
   							unset($_SESSION[$_SESSION_ID]['admin']);
   							@session_destroy();
   							header('location:' . $_PATH['websiteRoot']);
   							break;
   
   
   }
   ?>