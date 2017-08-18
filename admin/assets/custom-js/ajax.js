	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="assets/images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="assets/images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';

	  function post_ajax(formData)
		{
		  
		     $('.loading').removeAttr('style');

		 
			var formData = formData;
			var result = null;
			httpRequest = jQuery.ajax({
				url: 'ajax_form_handler.php',
				type: 'POST',
				async: false,
				data : formData,
				success: function(data) {
		      setTimeout(function(){
		      $('.loading').attr('style','display:none');
		    },2000);
					result = data;
				},
				error: function(e)
				{
				//	toastr.success('Somthing is Missing !!');
		    swal('Somthing is Missing !!');
				}
			});

			return result;
		}


		function getFilterRecords(selectId,startDateField,endDateField){

			 var startDate = jQuery("#"+startDateField).val();
		     var endDate = jQuery("#"+endDateField).val();
		     var userId = jQuery("#"+selectId).val();

		if(startDate == '' && endDate == '' && userId == '')
		{
			alert("Please Select any one to apply Filter.");
			return;
		}
		// if(startDate == '' && endDate != '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		// if(startDate != '' && endDate == '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		if((startDate != '' && endDate != '')&&(startDate > endDate))
		{
			alert("Start Date cannot be Greater than End Date");
			return;
		}
		
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getFilteredQuote','startDate':startDate,'endDate':endDate,'userId':userId},
		  success: function(data) {

		  
		  		$("#datatable-buttons").html(data);
			 
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+holder).html(ACTION_ERROR).fadeIn(100);
			}
		});

	            
		}



		function getHourFilterRecords(selectId){

			 
		     var userId = jQuery("#"+selectId).val();

		if(userId == '')
		{
			alert("Please Select Company to apply Filter.");
			return;
		}
	
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getFilteredHour','userId':userId},
		  success: function(data) {
		  		//alert(data);
		  
		  		$("#datatable-buttons").html(data);
			 
		  }
		 
		});

	            
		}
	
		function getTodayFilterRecords(selectId){

			 
		     var userId = jQuery("#"+selectId).val();

		if(userId == '')
		{
			alert("Please Select Company to apply Filter.");
			return;
		}

	
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getFilteredToday','userId':userId},
		  success: function(data) {
		  	//	alert(data);
		  
		  		$("#datatable-buttons").html(data);
			 
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				// jQuery("#"+holder).html(ACTION_ERROR).fadeIn(100);
			}
		});

	            
		}

		function getCustomerFilterRecords(selectId,startDateField,endDateField){
             console.log();
			 var startDate = jQuery("#"+startDateField).val();
		     var endDate =jQuery("#"+endDateField).val();
		     var userId = jQuery("#"+selectId).val();

		if(startDate == '' && endDate == '' && userId == '')
		{
			alert("Please Select any one to apply Filter.");
			return;
		}
		// if(startDate == '' && endDate != '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		// if(startDate != '' && endDate == '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		if((startDate != '' && endDate != '')&&(startDate > endDate))
		{
			alert("Start Date cannot be Greater than End Date");
			return;
		}
	
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getFilteredCustomer','startDate':startDate,'endDate':endDate,'userId':userId},
		  success: function(data) {

		
		  		$("#datatable-buttons").html(data);
			 
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+holder).html(ACTION_ERROR).fadeIn(100);
			}
		});

	            
		}     


		
	function getPaymentFilterRecords(selectId,paymentId,startDateField,endDateField){

			 var startDate = jQuery("#"+startDateField).val();
		     var endDate = jQuery("#"+endDateField).val();
		     var userId = jQuery("#"+selectId).val();
		     var paymentId = jQuery("#"+paymentId).val();

		// if(startDate == '' && endDate == '' && userId == '' && paymentId == '')
		// {
		// 	alert("Please Select any one to apply Filter.");
		// 	return;
		// }
		// if(startDate == '' && endDate != '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		// if(startDate != '' && endDate == '')
		// {
		// 	alert("Please Select Both Start Date and End Date to apply Filter.");
		// 	return;
		// }
		if((startDate != '' && endDate != '')&&(startDate > endDate))
		{
			alert("Start Date cannot be Greater than End Date");
			return;
		}
	
		jQuery.ajax({
		  url: 'ajax_form_handler.php',
		  type: 'GET',
		  data: {'access':'true','action':'getFilteredPayment','startDate':startDate,'endDate':endDate,'userId':userId,'paymentId':paymentId},
		  success: function(data) {

		  
		  		$("#datatable-buttons").html(data);
			 
		  },
		  error: function(e)
			{
				//alert("Some error occurred and request could not be completed.");
				jQuery("#"+holder).html(ACTION_ERROR).fadeIn(100);
			}
		});

	            
		}

		// function resetCustomerFilter(userId,startDate,endDate) {

		// 	alert("jdch");
			
		// 	$('#'+userId).html('');
		// 	$('#'+startDate).html('');
		// 	$('#'+endDate).html('');
		// }
	