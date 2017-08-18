	var ACTION_ERROR = 'Your action could not be completed. Please try again.';
	var ICON_SUCCESS = '<img src="images/icon_success.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_ERROR = '<img src="images/error.png" alt="loading" style="height:20px;width:20px" />';
	var ICON_LOADING = '<img src="assets/images/loading.gif" alt="loading" style="height:20px;width:20px" />';
	
	function toggleBlock(element)
	{
		jQuery( "#"+element ).slideToggle(400);
	}	
	function checkDataType(dataType,textAreaOptions,dependentFieldOption,dependentField,fileFieldOptions)
	{
		var dataType = jQuery("#"+dataType).val();
		if(dataType == 7) // if data type =  textarea
			jQuery("#"+textAreaOptions).show(500);
		else if(dataType == 8) // if data type = file field
			jQuery("#"+fileFieldOptions).show(500);
		else if(dataType == 9) // if data type = dependent list
		{
			jQuery("#"+dependentFieldOption).show(500);
			jQuery("#"+dependentField).attr('required',1);
		}
		if(dataType != 9) 
		{
			jQuery("#"+dependentField).val('');
			jQuery("#"+dependentField).removeAttr("required");
			jQuery("#"+dependentFieldOption).hide(500);
		}
		if(dataType != 7) 
		{
			jQuery("#"+textAreaOptions).hide(500);
		}
		if(dataType != 8) 
		{
			jQuery("#"+fileFieldOptions).hide(500);
		}
	}
	function generateHandler(source,target)
	{
		var fieldValue = jQuery("#"+source).val();
		var handler = fieldValue.replace(/ /gi, "_");
		jQuery("#"+target).val(handler);
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
	function applyDataTable(tableName)
	{
		var oTable1 = 
			jQuery('#'+tableName)
			//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
			.dataTable( {
				bAutoWidth: false,
				"aoColumns": [
				  { "bSortable": false },
				  null, null,null, null, null,
				  { "bSortable": false }
				],
				"aaSorting": [],
		
				//,
				//"sScrollY": "200px",
				//"bPaginate": false,
		
				//"sScrollX": "100%",
				//"sScrollXInner": "120%",
				//"bScrollCollapse": true,
				//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
				//you may want to wrap the table inside a "div.dataTables_borderWrap" element
		
				"iDisplayLength": 100
			} );
	}

	