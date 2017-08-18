	jQuery(document).ready(
		function(){
			jQuery(".confirmDelete").click(function(){
				return confirm('Do you really want to Delete this Record? All other records related to this will also be deleted...');
			});
		}
	);
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
	function checkApplicableOption(element)
	{
		var option = jQuery("#"+element).val();
		if(option == 6)
		{
			if(jQuery('#'+element).is(":checked")==true)
			{
				jQuery("#blkLicenceDetails").show(300);
				$('.licence-fields').each(function(){
					jQuery(this).prop('required', true);
				});
			}
			else {
				jQuery("#blkLicenceDetails").hide(300);
				$('.licence-fields').each(function(){
					jQuery(this).prop('value', "");
					jQuery(this).prop('required', false);
				});
			}
		}
		
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
	function viewMilestone(milestoneName,milestoneAmount,deliveryDate,description)
	{
		jQuery("#viewMilestoneName").val(milestoneName);
		jQuery("#viewMilestoneAmount").val(milestoneAmount);
		jQuery("#viewDeliveryDate").val(deliveryDate);
		jQuery("#viewMilestoneDescription").val(description);
		jQuery("#blkMilestone").fadeIn();
	}
	function calculateJobCost(bidField,perserbidChargeField,totalAmountField,defaultCharge,isPerserbidChargeApplicable)
	{
		var bid = jQuery("#"+bidField).val();
		var perserbidCharge = 0;
		var totalAmount = 0;
		if(isPerserbidChargeApplicable == 1)
		{
			if(!isNaN(bid))
			{
				perserbidCharge = (bid*defaultCharge/100);
				totalAmount = parseInt(bid)-parseInt(perserbidCharge);
				jQuery("#"+perserbidChargeField).val(perserbidCharge);
				jQuery("#"+totalAmountField).val(totalAmount);
			}
			else{
				alert("You have entered Invalid Value in Bid Field.");
				jQuery("#"+bidField).val('');
				jQuery("#"+perserbidChargeField).val('');
				jQuery("#"+totalAmountField).val('');
			}
		}
		else{
			totalAmount = parseInt(bid)-parseInt(perserbidCharge);
			jQuery("#"+perserbidChargeField).val(perserbidCharge);
			jQuery("#"+totalAmountField).val(totalAmount);
		}
		
	}
	
	function checkIndependency(field)
		{
			if(document.getElementById(field).checked)
			{
				jQuery("#companyName").val('');
			jQuery(".company_fields").hide(500);
		}			
		else jQuery(".company_fields").show(500);
	}
	function checkCompanyOwner(field)
	{
		if(document.getElementById(field).checked)
		{
			jQuery(".form_submitter").show(500);
			jQuery("#error_company_owner").hide(500);
		}
		else 
		{
			jQuery(".form_submitter").hide(500);
			jQuery("#error_company_owner").show(500);
		}
	}
	function checkTriCityArea()
	{
		if(document.getElementById("isTriCity").checked)
		{
			jQuery("#invalidAreaForm").hide(150,function(){
				jQuery("#validAreaForm").show(300);	
			});
		}
		else 
		{
			jQuery("#validAreaForm").hide(150,function(){
				jQuery("#invalidAreaForm").show(300);
			});
			
		}
	}