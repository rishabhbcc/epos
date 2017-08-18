	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="assets/images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="assets/images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';
	var TEXT_LOADING = 'Loading...Please wait.<img src="assets/images/loading.gif">';
	var ACTION_ERROR = 'Request could not be completed.';
	var MAIL_ID_NOT_AVAILABLE = '<label style="color:Red;display:block"><img src="assets/images/error.png" alt="loading" style="vertical-align:middle;height:20px;width:20px" /> This Email Id has already been used.</label>';
	var USERNAME_NOT_AVAILABLE = '<label style="color:Red;display:block"><img src="assets/images/error.png" alt="loading" style="vertical-align:middle;height:20px;width:20px" /> This Username has already been used.</label>';
	
	function resetDropDown(field)
	{
		jQuery("#"+field).html('<option value="">Select Option</option>');
	}
	function getStateList(countryField,stateField,status)
    {
		var countryId = jQuery("#"+countryField).val();
		if(countryId == '')
		{
			resetDropDown(stateField);
			return;
		}
		jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&countryId="+countryId+"&action=getStateList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+stateField).html(data);
            jQuery("#"+status).html('').hide(100);
        },
        error: function(e)
        {
        	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
        	setTimeout(
        	function()
        	{ 
        		jQuery("#"+status).html('').hide(100); 
        	}, 2000);
        }
        });
    }
	function getCityList(stateField,cityField,status)
    {
		var stateId = jQuery("#"+stateField).val();
		if(stateId == '')
		{
			resetDropDown(stateField);
			resetDropDown(cityField);
			return;
		}
		jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&stateId="+stateId+"&action=getCityList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+cityField).html(data);
            jQuery("#"+status).html('').hide(100);
        },
        error: function(e)
        {
        	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
        	setTimeout(
        	function()
        	{ 
        		jQuery("#"+status).html('').hide(100); 
        	}, 2000);
        }
        });
    }
	function getProductPriceList(priceLevelField,resultHolder)
    {
		var priceLevelId = jQuery("#"+priceLevelField).val();
		if(priceLevelId == '')
		{
			jQuery("#"+resultHolder).html('Please Select Price Level...').fadeIn();
			return;
		}
		jQuery("#"+resultHolder).html("Loading data...").fadeIn();
        var formData = "access=true&priceLevelId="+priceLevelId+"&action=getProductList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+resultHolder).html(data);
        },
        error: function(e)
            {
                jQuery("#"+resultHolder).html(ACTION_ERROR).fadeIn();;
            }
        });
    }
    function getPackagePriceList(priceLevelField,resultHolder)
	{
        var priceLevelId = jQuery("#"+priceLevelField).val();
        if(priceLevelId == '')
        {
        	jQuery("#"+resultHolder).html('Please Select Price Level').fadeIn();
        	return;
        }
        jQuery("#"+resultHolder).html('Loading data...').fadeIn();
        var formData = "access=true&priceLevelId="+priceLevelId+"&action=getPackagePriceList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+resultHolder).html(data);
        },
        error: function(e)
        {
            jQuery("#"+resultHolder).html(ACTION_ERROR).fadeIn();;
        }
        });
	}
    function getCategoryList(groupField,categoryField,status)
	{   
    	var groupId = jQuery("#"+groupField).val();
    	if(groupId == '')
    	{
    		resetDropDown(categoryField);
    		return;
    	}
    	jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&groupId="+groupId+"&action=getCategoryList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+categoryField).html(data);
            jQuery("#"+status).html('').fadeOut();
        },
        error: function(e)
            {
                jQuery("#"+status).html(ACTION_ERROR).fadeOut();
            }
        });
	}
    function getSubcategoryList(categoryField,subcategoryField,status)
	{   
    	var productCategory = jQuery("#"+categoryField).val();
    	if(productCategory == '')
    	{
    		resetDropDown(subcategoryField);
    		return;
    	}
    	jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&parentId="+productCategory+"&action=getSubcategoryList";    
        $.ajax({
        url: "ajax_form_handler.php",
        type: "POST",
        data : formData,
        success: function (data) {
            $("#"+subcategoryField).html(data);
            jQuery("#"+status).html('').fadeOut();
        },
        error: function(e)
            {
                jQuery("#"+e).html(ACTION_ERROR).fadeIn();
                jQuery("#"+status).html('').fadeOut();
            }
        });
	}
	function getCustomerList(customerId,customerDetail)
	{  
        var customerId = jQuery("#"+customerId).val();
        var formData = "access=true&id="+customerId+"&action=getCustomerList";  
        if (customerId == 1) {        
            $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
                $("#"+customerDetail).html(data);
            },
            error: function(e)
                {
                    jQuery("#"+e).html(ACTION_ERROR).fadeIn();;
                }
            });
        }  
	}
	function getPackagePrice(packageField,priceField,status,totalAmountField)
	{  
        var packageId = jQuery("#"+packageField).val();
        if(packageId == '')
        {
        	jQuery("#"+totalAmountField).val(parseInt(jQuery("#"+totalAmountField).val())-parseInt(jQuery("#"+priceField).val()));
        	jQuery("#"+priceField).val(0);
        	return false;
        }
        var price = jQuery("#"+priceField).val();
        if(price == '') price = 0;
        else price = parseInt(jQuery("#"+priceField).val());
        jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&packageId="+packageId+"&action=getPackagePrice";  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
               jQuery("#"+priceField).val(data);
               var totalAmount = parseInt(jQuery("#"+totalAmountField).val())+parseInt(jQuery("#"+priceField).val())-price;
               jQuery("#"+totalAmountField).val(totalAmount);
               jQuery("#"+status).html('').hide(100);
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function calculateTaxRate(grossTotalField,taxField,taxPercentageField,taxAmountField,totalTaxField,netAmountField,status)
	{  
        var taxId = jQuery("#"+taxField).val();
        if(taxId == '')
        {
        	jQuery("#"+taxPercentageField).val(0);
        	jQuery("#"+taxAmountField).val(0);
        	return false;
        }
        jQuery("#"+status).html('Loading').fadeIn();
        var grossAmount = jQuery("#"+grossTotalField).val();
        var formData = "access=true&taxId="+taxId+"&action=getTaxRate";  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+taxPercentageField).val(data);
            	var totalTaxAmount = (parseInt(grossAmount)*data/100);
            	//var totalTaxAmount = taxAmount+parseInt(grossAmount);
            	jQuery("#"+taxAmountField).val(totalTaxAmount);
            	jQuery("#"+totalTaxField).val(totalTaxAmount);
            	jQuery("#"+netAmountField).val(parseFloat(grossAmount)+parseFloat(totalTaxAmount));
            	jQuery("#"+status).html('').fadeOut();
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function calculateProductPrice(productField,unitAmountField,amountField,grossTotalField,discountAmountField,totalTaxField,netAmountField,status)
	{  
        var productId = jQuery("#"+productField).val();
        if(productId == '')
        {
        	jQuery("#"+unitAmountField).val(0);
        	jQuery("#"+amount).val(0);
        	jQuery("#"+grossTotalField).val(0);
        	jQuery("#"+discountAmountField).val(0);
        	jQuery("#"+totalTaxField).val(0);
        	jQuery("#"+netAmountField).val(0);
        	return false;
        }
        jQuery("#"+status).html('Loading').fadeIn();
        var grossAmount = jQuery("#"+grossTotalField).val();
        var formData = "access=true&productId="+productId+"&action=getProductPrice";  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	var grossTotal = parseInt(jQuery("#"+grossTotalField).val())+parseInt(data);
            	var netAmount = parseInt(jQuery("#"+netAmountField).val())+parseInt(data);
            	jQuery("#"+unitAmountField).val(data);
            	jQuery("#"+amountField).val(data);
            	jQuery("#"+grossTotalField).val(grossTotal);
            	jQuery("#"+netAmountField).val(netAmount);
            	jQuery("#"+status).html('').fadeOut();
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function updateValueCardFields(allocationDateField,amountTypeField,cardAmountField,discountPercentageField,netAmountField,validityMonthsField,validTillField,jsExecuter,status)
	{  
		var allocationDate = '';
		if(jQuery("#"+allocationDateField).length)
			allocationDate = jQuery("#"+allocationDateField).val();
		if(allocationDate == '')
		{
			alert("Please Select Allocation Date");
			return false;
		}
        var amountTypeId = jQuery("#"+amountTypeField).val();
        if(amountTypeId == '')
        {
        	jQuery("#"+discountPercentage).val('');
        	jQuery("#"+netAmountField).val('');
        	jQuery("#"+validityMonthsField).val('');
        	jQuery("#"+validTillField).val('');
        	return false;
        }
        jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&amountTypeId="+amountTypeId+"&action=updateValueCardFields&allocationDate="+allocationDate+"&cardAmountField="+cardAmountField+"&discountPercentageField="+discountPercentageField+"&netAmountField="+netAmountField+"&validityMonthsField="+validityMonthsField+"&validTillField="+validTillField;  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+jsExecuter).html(data);
            	jQuery("#"+status).html('').fadeOut();
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function getValueCardListByFranchiseId(franchiseField,container)
	{  
        var franchiseId = jQuery("#"+franchiseField).val();
        if(franchiseId == '')
        {
        	jQuery("#"+container).html('').fadeIn();
        	return false;
        }
        jQuery("#"+container).html('Loading').fadeIn();
        var formData = "access=true&franchiseId="+franchiseId+"&action=getValueCardListByFranchiseId";  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+container).html(data);
            },
            error: function(e)
            {
            	jQuery("#"+container).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+container).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function getValueCardValueListByFranchiseId(franchiseField,container)
	{  
        var franchiseId = jQuery("#"+franchiseField).val();
        if(franchiseId == '')
        {
        	jQuery("#"+container).html('').fadeIn();
        	return false;
        }
        jQuery("#"+container).html('Loading').fadeIn();
        var formData = "access=true&franchiseId="+franchiseId+"&action=getValueCardValueListByFranchiseId";  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+container).html(data);
            },
            error: function(e)
            {
            	jQuery("#"+container).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+container).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function generatePackageRow(packageFieldContainer,loopCounterField,status)
	{  
		var loopCounter = parseInt(jQuery("#"+loopCounterField).val());
		jQuery("#"+loopCounterField).val(loopCounter+1);
		jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&action=generatePackageRow&loopCounter="+loopCounter;  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+status).html('').hide();
            	$('#'+packageFieldContainer+' tr:last').after(data);
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function generateProductRow(fieldContainer,loopCounterField,status)
	{  
		var loopCounter = parseInt(jQuery("#"+loopCounterField).val());
		jQuery("#"+loopCounterField).val(loopCounter+1);
		jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&action=generateProductRow&loopCounter="+loopCounter;  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+status).html('').hide();
            	$('#'+fieldContainer+' tr:last').after(data);
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function getCustomerSuggestionList(customerNameField,resultContainer)
	{  
		var customerName = jQuery("#"+customerNameField).val();
		if(customerName.length < 3)
		{
			jQuery("#"+resultContainer).html('').hide();
			return false;
		}
		
		jQuery("#"+resultContainer).html('Loading').fadeIn();
        var formData = "access=true&action=getCustomerSuggestionList&customerName="+customerName+"&resultContainer="+resultContainer;  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+resultContainer).html(data).show();
            },
            error: function(e)
            {
            	jQuery("#"+resultContainer).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+resultContainer).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function getAvailableSlotList(jobDateField,timeSlotField,status)
	{  
		var jobDate = jQuery("#"+jobDateField).val();
		if(jobDate == '')
		{
			jQuery("#"+status).html('<label style="color:Red">Please Select A Date</label>').hide();
			return false;
		}
		jQuery("#"+status).html('Loading Slots...').fadeIn();
        var formData = "access=true&action=getAvailableSlotList&jobDate="+jobDate;  
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+status).html('').hide();
            	jQuery("#"+timeSlotField).html(data).show();
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	
	function getCustomerDetails(searchContactNumberField,customerIdField,salutationField,firstNameField,lastNameField,mailIdField,dateOfBirthField,addressField,contactNumberField,landlineNumberField,anniversaryDateField,status)
	{  
        var searchContactNumber = jQuery("#"+searchContactNumberField).val();
        if(contactNumber == '')
        {
        	jQuery("#"+status).html('<label style="color:Red">Please Enter Contact Number</label>').fadeIn();
        	return false;
        }
        jQuery("#"+customerIdField).val('');
        jQuery("#"+salutationField).val('');
        jQuery("#"+firstNameField).val('');
        jQuery("#"+lastNameField).val('');
        jQuery("#"+mailIdField).val('');
        jQuery("#"+dateOfBirthField).val('');
        jQuery("#"+addressField).val('');
        jQuery("#"+contactNumberField).val('');
        jQuery("#"+landlineNumberField).val('');
        jQuery("#"+anniversaryDateField).val('');
        jQuery("#"+status).html('Loading').fadeIn();
        var formData = "access=true&contactNumber="+searchContactNumber+"&action=getCustomerDetails&customerIdField="+customerIdField+"&salutationField="+salutationField+"&firstNameField="+firstNameField+"&lastNameField="+lastNameField+"&mailIdField="+mailIdField+"&dateOfBirthField="+dateOfBirthField+"&addressField="+addressField+"&contactNumberField="+contactNumberField+"&landlineNumberField="+landlineNumberField+"&anniversaryDateField="+anniversaryDateField;
        $.ajax({
            url: "ajax_form_handler.php",
            type: "POST",
            data : formData,
            success: function (data) {
            	jQuery("#"+status).html(data);
            },
            error: function(e)
            {
            	jQuery("#"+status).html(ACTION_ERROR).fadeIn();
            	setTimeout(
            	function()
            	{ 
            		jQuery("#"+status).html('').hide(100); 
            	}, 2000);
            }
            });
	}
	function calculateDiscount(grossTotalField,discountPercentageField,discountAmountField,netAmountField,status)
	{
		var discountPercentage = jQuery("#"+discountPercentageField).val();
		if(isNaN(discountPercentage) == false)
		{
			if(discountPercentage == '') discountPercentage = 0;
			discountPercentage = parseInt(discountPercentage);
			var grossTotal = parseInt(jQuery("#"+grossTotalField).val());
			var discountAmount = (grossTotal*discountPercentage/100);
			var netAmount = grossTotal;
			netAmount = netAmount - discountAmount;
			jQuery("#"+discountAmountField).val(discountAmount);
			jQuery("#"+netAmountField).val(netAmount);
		}
		else alert("Only Integer Number is valid in Discount Percentage Field.");
	}
	function calculateProductPriceByQuantity(unitAmountField,quantityField,amountField,grossTotalField,discountAmountField,totalTaxField,netAmountField,status)
	{  
        var quantity = jQuery("#"+quantityField).val();
        if(isNaN(quantity) == false)
        {
        	var unitAmount = parseInt(jQuery("#"+unitAmountField).val());
        	if(quantity == '') quantity = 1;
        	var amount = unitAmount*quantity;
        	//var grossTotal = parseInt(jQuery("#"+grossTotalField).val());
        	var grossTotal = amount;
        	jQuery("#"+grossTotalField).val(grossTotal);
        	jQuery("#"+netAmountField).val(grossTotal);
        }
	}