	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="assets/images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="assets/images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';
	var TEXT_LOADING = 'Loading...Please wait.<img src="assets/images/loading.gif">';
	var ACTION_ERROR = 'Request could not be completed.';
	var MAIL_ID_NOT_AVAILABLE = '<label style="color:Red;display:block"><img src="assets/images/error.png" alt="loading" style="vertical-align:middle;height:20px;width:20px" /> This Email Id has already been used.</label>';
	var USERNAME_NOT_AVAILABLE = '<label style="color:Red;display:block"><img src="assets/images/error.png" alt="loading" style="vertical-align:middle;height:20px;width:20px" /> This Username has already been used.</label>';
	function getDependentList(currentCategory,fieldId,parentField,childField,status)
	{
		var optionId = jQuery("#"+parentField).val();
		resetDropDown("childField");
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&category="+currentCategory+"&fieldId="+fieldId+"&optionId="+optionId+"&action=getDependentListOptions";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+childField).html(data);
			  jQuery("#"+status).html('').fadeOut();
		  },
		  error: function(e)
		  {
			  jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
		  }
		});
	}
	function resetDropDown(element)
	{
		jQuery("#"+element).html('<option value="">Select</option>');
	}
	/*
	function validateMailId(mailIdField,status)
	{
		var mailId = jQuery("#"+mailIdField).val();
		if(mailId.trim() == '' )
			return;
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&mailId="+mailId+"&action=validateMailId";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  if(data == 1)
			  {
				  jQuery("#"+status).html(ICON_SUCCESS).fadeIn();
			  }
			  else
			  {
				  jQuery("#"+status).html(MAIL_ID_NOT_AVAILABLE).fadeIn();
				  jQuery("#"+mailIdField).val('');
			  }
			  setTimeout(function(){
				  jQuery("#"+status).html('').fadeOut(100);
			  },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
			}
		});
	}
	function validateUsername(usernameField,status)
	{
		var username = jQuery("#"+usernameField).val();
		if(username.trim() == '' )
			return;
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&username="+username+"&action=validateUsername";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  if(data == 1)
			  {
				  jQuery("#"+status).html(ICON_SUCCESS).fadeIn();
			  }
			  else
			  {
				  jQuery("#"+status).html(USERNAME_NOT_AVAILABLE).fadeIn();
				  jQuery("#"+usernameField).val('');
			  }
			  setTimeout(function(){
				  jQuery("#"+status).html('').fadeOut(100);
			  },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
			}
		});
	}
	function getNotificationListing(jobId,holder)
	{
		jQuery("#"+holder).html(ICON_LOADING).fadeIn();
		var formData = "access=true&jobId="+jobId+"&action=getNotificationListing";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+holder).html(data).fadeIn();
		  },
		  error: function(e)
			{
				jQuery("#"+holder).html(ACTION_ERROR).fadeIn();;
			}
		});
	}
	function getStateList(countryField,stateField,status)
	{
		var countryId = jQuery("#"+countryField).val();
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&countryId="+countryId+"&action=getStateList";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+stateField).html(data);
			  jQuery("#"+status).html('').fadeOut();
		  },
		  error: function(e)
		  {
			  jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
		  }
		});
	}
	function markAsRead(notificationId,status,notificationStatus,link)
	{
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&notificationId="+notificationId+"&action=markAsRead";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+notificationStatus).html('Read');
			  jQuery("#"+link).hide();
			  jQuery("#"+status).html(data).fadeIn();
			  
			  setTimeout(function(){
				  jQuery("#"+status).html('').hide(500);
			  },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
			}
		});
	}
	function markFlag(jobId,status)
	{
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&jobId="+jobId+"&action=markFlag";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			 jQuery("#"+status).html(data).fadeIn();
			 setTimeout(function(){
				 jQuery("#"+status).hide(500);
			 },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
			}
		});
	}
	function unmarkFlag(jobId,status)
	{
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&jobId="+jobId+"&action=unmarkFlag";
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			 jQuery("#"+status).html(data).fadeIn();
			 setTimeout(function(){
				 location.reload();
			 },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();
			}
		});
	}
	function previewAttachment(jobId,attachmentIndex,holder)
	{
		jQuery("#"+holder).html(ICON_LOADING).fadeIn();
		var formData = "access=true&jobId="+jobId+"&action=previewAttachment&attachmentIndex="+attachmentIndex+'&holder='+holder;
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+holder).html(data).fadeIn();
		  },
		  error: function(e)
			{
				jQuery("#"+holder).html(ACTION_ERROR).fadeIn();
				setTimeout(function(){
					 jQuery("#"+holder).hide();
				 },2000);
			}
		});
	}
	function deleteAttachment(jobId,attachmentIndex,status)
	{
		jQuery("#"+status).html(ICON_LOADING).fadeIn();
		var formData = "access=true&jobId="+jobId+"&action=deleteAttachment&attachmentIndex="+attachmentIndex;
		httpRequest = jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'POST',
		  //data: {'access':'true','action':'getProductList'},
		  data : formData,
		  success: function(data) {
			  jQuery("#"+status).html(data).fadeIn();
			  setTimeout(function(){
				  location.reload();
			  },2000);
		  },
		  error: function(e)
			{
				jQuery("#"+status).html(ACTION_ERROR).fadeIn();;
			}
		});
	}*/
	