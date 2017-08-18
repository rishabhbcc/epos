	jQuery(document).ready(
		function(){
			jQuery(".confirmDelete").click(function(){
				return confirm('Do you really want to Delete this Record? All other records related to this will also be deleted...');
			});
		}
	);
	function selectAll(currentField,selectableFields)
	{
		if($('#'+currentField).is(':checked'))
		{
			$('.'+selectableFields).each(function() { 
                this.checked = true;                 
            });
		}
		else{
			$('.'+selectableFields).each(function() { 
                this.checked = false;                 
            });
		}
	}
	function createDatePicker(element)
	{
		new JsDatePick({
			useMode:2,
			target:element,
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	}
	function checkUserType(isAdminField,franchiseField)
	{
		if($('#'+isAdminField).is(':checked'))
		{
			jQuery("#"+franchiseField).val("");
			jQuery("#"+franchiseField).attr("disabled","disabled");
			jQuery("#"+franchiseField).removeAttr("required");
		}
		else{
			jQuery("#"+franchiseField).attr("required",1);
			jQuery("#"+franchiseField).removeAttr("disabled");
		}
	}
	function checkCustomerType(customerIsNewField,customerFieldContainer,searchFieldContainer)
	{
		if($('#'+customerIsNewField).is(':checked'))
		{
			jQuery("#"+searchFieldContainer).hide();
			//jQuery("#"+customerFieldContainer+" input").attr("required",1);
			//jQuery("#"+customerFieldContainer+" select").attr("required",1);
			jQuery("#"+customerFieldContainer+" input").removeAttr("readonly");
			jQuery("#"+customerFieldContainer+" select").removeAttr("readonly");
		}
		else{
			jQuery("#"+searchFieldContainer).show();
			//jQuery("#"+customerFieldContainer+" input").removeAttr("required");
			jQuery("#"+customerFieldContainer+" input").attr("readonly","readonly");
			//jQuery("#"+customerFieldContainer+" select").removeAttr("required");
			jQuery("#"+customerFieldContainer+" select").attr("readonly","readonly");
		}
	}
	function fillCustomerDetails(name,fields,values,resultContainer)
	{
		alert(values);
		for (var count = 0; count < fields.length; count++) {
			jQuery("#"+fields[count]).val(values[count]);
		}
		jQuery("#"+resultContainer).html('').hide();
	}
	function removePackageRow(rowId,priceField,totalAmountField)
	{
		jQuery("#"+totalAmountField).val(parseInt(jQuery("#"+totalAmountField).val())-parseInt(jQuery("#"+priceField).val()));
		jQuery("#"+rowId).remove();
	}
	function removeProductRow(rowId,priceField,grossTotalField,netAmountField)
	{
		var totalPrice = parseInt(jQuery("#"+grossTotalField).val())-parseInt(jQuery("#"+priceField).val());
		alert(totalPrice);
		jQuery("#"+grossTotalField).val(totalPrice);
		jQuery("#"+netAmountField).val(totalPrice);
		jQuery("#"+rowId).remove();
	}
	function reloadServiceInvoice(referenceNumberField,invoiceDateField,jobEstimateField)
	{
		var referenceNumber = jQuery("#"+referenceNumberField).val();
		var invoiceDate = jQuery("#"+invoiceDateField).val();
		var jobEstimateId = jQuery("#"+jobEstimateField).val();
		if(referenceNumber == '' || invoiceDate == '' || jobEstimateId == '')
		{
			alert("Please Select All of these fields : Reference Number, Invoice Date, Job Estimate Id");
			return false;
		}
		window.location = './?url=service_invoice&tab=Add&referenceNumber='+referenceNumber+'&invoiceDate='+invoiceDate+'&jobEstimateId='+jobEstimateId;
	}
	function toggleFields(element,fields)
	{
		if(jQuery('#'+element).is(":checked")==true)
		{
			$('.'+fields).each(function(){
				jQuery(this).prop('required', false);
				jQuery(this).attr('readonly', "readonly");
			});
		}
		else{
			$('.'+fields).each(function(){
				jQuery(this).prop('required', true);
				jQuery(this).removeAttr('readonly');
			});
		}
	}
	
	
	
	