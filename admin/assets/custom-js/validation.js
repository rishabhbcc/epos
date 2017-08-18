	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';
	function validateImportFile() {
		var input, file;

		// (Can't use `typeof FileReader === "function"` because apparently
		// it comes back as "object" on some browsers. So just see if it's there
		// at all.)
		if (!window.FileReader) {
			bodyAppend("The file API isn't supported on this browser yet.");
			return;
		}

		input = document.getElementById('importSource');
		if (!input) {
			bodyAppend("Um, couldn't find the fileinput element.");
		}
		else if (!input.files) {
			bodyAppend("This browser doesn't seem to support the `files` property of file inputs.");
		}
		else if (!input.files[0]) {
			bodyAppend( "Please select a file before clicking 'Load'");
		}
		else {
			file = input.files[0];
			bodyAppend("<div style='color:green;'>Uploaded File " + file.name + " is " + file.size + " bytes in size and is Valid for importing.</div>");
		}
		var extensionArray = file.name.split('.');
		var extension = extensionArray[extensionArray.length-1];
		var validExtensions = new Array('xls','xlsx');
		if(validExtensions.indexOf(extension) == -1)
		{
			jQuery("#uploadStatus").html('<div style="color:red;padding:5px">Uploaded file is not a Valid Excel File and hence cannot be imported. Please upload a valid Excel file.</div>');
		}
		
	}

	function bodyAppend(innerHTML) {
		jQuery("#uploadStatus").html(innerHTML);
	}	