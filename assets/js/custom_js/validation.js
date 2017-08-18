/**
 * 
 */
	function validateRegistration()
	{
		var errors = 'Form Errors : <br >';
		var isValid = true;
		var mailId = jQuery("#mailId").val();
		var confirmMailId = jQuery("#confirmMailId").val();
		var username = jQuery("#username").val();
		var password = jQuery("#password").val();
		var confirmPassword = jQuery("#confirmPassword").val();
		var phoneNumber = jQuery("#phoneNumber").val();
		if(mailId != confirmMailId)
		{
			errors+= '- Email Id and Confirm Email Id do not match.<br />';
			isValid = false;
		}
		if(isNaN(phoneNumber))
		{
			errors+= '- Phone Number should be numeric only..<br />';
			isValid = false;
		}
		if(phoneNumber.length < 10)
		{
			errors+= '- Phone Number should of 10 characters long..<br />';
			isValid = false;
		}
		if(password.length < 6)
		{
			errors+= '- Password should be atleast 6 characters long..<br />';
			isValid = false;
		}
		if(password != confirmPassword)
		{
			errors+= '- Passwords do not match.<br />';
			isValid = false;
		}
		if(username.length < 4)
		{
			errors+= '- Username should be atleast 4 characters long..<br />';
			isValid = false;
		}
		if(!isValid) {
			jQuery("#formErrors").html(errors).fadeIn();
			document.location = "#formErrors";
		}
		return isValid;
	}
	function validateChangePassword()
	{
		var errors = 'Form Errors : <br >';
		var isValid = true;
		var oldPassword = jQuery("#oldPassword").val();
		var newPassword = jQuery("#newPassword").val();
		var confirmNewPassword = jQuery("#confirmNewPassword").val();
		if(newPassword != confirmNewPassword)
		{
			errors+= '- Passwords do not match.<br />';
			isValid = false;
		}
		if(isValid)
		{
			if(newPassword == oldPassword)
			{
				errors+= '- New Password cannot be same as Old Password..<br />';
				isValid = false;
			}
			if(newPassword.length < 6)
			{
				errors+= '- Password should be atleast 6 characters long..<br />';
				isValid = false;
			}
			
		}
		if(!isValid) {
			jQuery("#formErrors").html(errors).fadeIn();
			document.location = "#formErrors";
		}
		return isValid;
	}