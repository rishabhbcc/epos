//validation for franchise.php//
// When the browser is ready...
   $(function() { 
    $("#franchiseSubmit").click(function(){
//});   
    // Setup form validation on the #franchiseForm element	
    $("#franchiseForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
			firstName: {
						 required: true,
                         },
			lastName: {
						 required: true,
                         },			
			displayName: {
						 required: true,
                         },	
			address: {
						 required: true,
                         },	
			landlineNumber: {
						 required: true,
                         },
			mobileNumber:{
                        required: true,
                         number: true,
                         minlength: 10,
                         maxlength: 11
                        },		
			mailId: {
						 required: true,
						 email: true
                         },						
			contactPerson: {
						 required: true,
                         },	
			serviceTaxStatus: {
						 required: true,
                         },
			stateId	: {
						 required: true,
                         },	
			cityId : {
						 required: true,
                         },	
			priceLevelId : {
						 required: true,
                         },	
			},
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            firstName:" Please Enter first name !!",
            lastName:" Please Enter last name!!",
			displayName:" Please Enter display name !!",
			address:" Please Enter franchise address  !!",
			landlineNumber:" Please Enter landline number  !!",
			mobileNumber:" Please Enter mobile number  !!",
			mailId: {
                required: " Please enter a valid email address !!",
                minlength: " Please enter a valid email address !!",
                remote: jQuery.format("{0} is already in use")
            },
			contactPerson:" Please Enter contact person !!",
			serviceTaxStatus:" Please Enter  service tax status !!",
			stateId:" Please select region !!",
			priceLevelId:" Please select price level !!",
			cityId:" Please select city !!",
	  },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  /*
   $(document).ready(function(){
    $('#franchiseForm').submit(function() {  // franchiseForm = form_id, submit = input_type 
        var error = 0;
        var stateId = $('#stateId').val(); // stateId = select_id

        if (stateId == "") {                
            error = 1;
            alert('You should select a region id.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});


$(document).ready(function(){
    $('#franchiseForm').submit(function() {  // franchiseForm = form_id, submit = input_type 
        var error = 0;
        var cityId = $('#cityId').val(); // cityId = select_id

        if (cityId == "") {                 
            error = 1;
            alert('You should select a city id.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});

$(document).ready(function(){
    $('#franchiseForm').submit(function() {  // franchiseForm = form_id, submit = input_type 
        var error = 0;
        var priceLevel = $('#priceLevelId').val(); // priceLevel = select_id

        if (priceLevel == "") {                 
            error = 1;
            alert('You should select a price level.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
 */ 
// validation for user.php

$(function () { 
		$("#userSubmit").click(function(){
	//});   
		// Setup form validation on the #userForm element	
		$("#userForm").validate({
		
			// Specify the validation rules
			rules: {
				indexValue: "required",
				firstName: {
							 required: true,
							 },
				lastName: {
							 required: true,
							 },			
				image: {
							 required: true,
							 image:true
							 },	
				address: {
							 required: true,
							 },	
				password: {
							 required: true,
							 },
				contactNumber:{
							required: true,
							 number: true,
							 minlength: 10,
							 maxlength: 11
							},		
				mailId: {
							 required: true,
							 email: true
							 },						
				franchiseId:{
							required:true,
							},			 
				},
			
			// Specify the validation error messages
			messages: {
				indexValue:" Please Enter index value !!",
				firstName:" Please Enter first name !!",
				lastName:" Please Enter last name!!",
				image:" Please fill image !!",
				address:" Please Enter franchise address  !!",
				password:" Please Enter password !!",
				contactNumber:" Please Enter mobile number  !!",
				mailId: {
					required: "Please enter an email address  !!",
					minlength: "Please enter a valid email address  !!",
					remote: jQuery.format("{0} is already in use")
						},
				franchiseId: " Please select franchises !!",
		   },
			
			submitHandler: function(form) {
				form.submit();
			}
		});

	  });
	  
	  
	  });
	

/////   Validation for country.php////	


	  // When the browser is ready...
   $(function() { 
    $("#countrySubmit").click(function(){
//});   
    // Setup form validation on the #countryForm element	
    $("#countryForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: {
                        required: true,
                         number: true,
                        
                        },
            countryName:{
                        required: true,                       
                        },
           
                },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please fill index integer value !!",
            countryName : " Please enter country name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
  // Validation for city.php //
  
  // When the browser is ready...
   $(function() { 
    $("#citySubmit").click(function(){
//});   
    // Setup form validation on the #cityForm element	
    $("#cityForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: {
                        required: true,
                         number: true,
                        
                        },
            cityName:{
                        required: true,                       
                        },
			stateId: {
					required:true,
					},
			countryId: {
					required:true,
					},		
                },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please fill index integer value !!",
            cityName : " Please enter city name !!",
            stateId : " Please select state!!",
			countryId : " Please select country !!",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
/*  
   $(document).ready(function(){
    $('#cityForm').submit(function() {  
        var error = 0;
        var stateId = $('#state').val(); 

        if (stateId == "--Select State--") {                 
            error = 1;
            alert('You should select a state Id.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});

$(document).ready(function(){
    $('#cityForm').submit(function() {  
        var error = 0;
        var regionId = $('#region').val(); 

        if (regionId == "--Select Region--") {                  
            error = 1;
            alert('You should select a region Id.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
*/
        
  // Validation for city.php //
  
  // When the browser is ready...
   $(function() { 
    $("#companieSubmit").click(function(){
//});   
    // Setup form validation on the #companieForm element	
    $("#companieForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
			companyCode: {
						 required: true,
                         },
			companyName: {
						 required: true,
                         },			
			shortName: {
						 required: true,
                         },	
			address: {
						 required: true,
                         },	
			phoneCode: {
						 required: true,
                         },
			
			phoneNumber1: {
						 required: true,
						
                         },						
							 
			},
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            companyCode:" Please Enter company code !!",
            companyName:" Please Enter company name !!",
			shortName:" Please Enter short name !!",
			address:" Please Enter address !!",
			phoneCode:" Please Enter phone code !!",
			phoneNumber1:" Please Enter phone number  !!",
			
	   },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  //////Validation For discount.php /////
  
   // When the browser is ready...
   $(function() { 
    $("#discountSubmit").click(function(){
//});   
    // Setup form validation on the #discountForm element	
    $("#discountForm").validate({
    
        // Specify the validation rules
        rules: {
            title: {
                        required: true,
                    },
            
            description:    {
                        required: true,
                    },
			indexValue:    {
                        required: true,
                    },
			discountPercentage:    {
                        required: true,
                    },
			validFrom:    {
                        required: true,
                    },
			validTill:    {
                        required: true,
                    },
        },
        
        // Specify the validation error messages
        messages: {
            title:" Please Enter reference number !!",
            description : "Please Enter description !! ",
			indexValue : "Please Enter index value !! ",
			discountPercentage : "Please Enter discount percentage !! ",
			validFrom : "Please Enter valid From !! ",
			validTill : "Please Enter valid Till !! ",
          //  shortName: "Please Enter short name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  ///  Validation for franchise_list.php ///
  
   $(document).ready(function(){
    $('#franchise_listForm').submit(function() {  // franchise_listForm = form_id, submit = input_type 
        var error = 0;
        var franchise_active = $('#franchise_active').val(); // PriceLevel = select_id

        if (franchise_active == '0') {                  // --0-- is the default value in select
            error = 1;
            alert('You should select a franchise active.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
  
  //// validation for region.php /////
  
  
  $(function() { 
    $("#regionSubmit").click(function(){
//});   
    // Setup form validation on the #regionForm element	
    $("#regionForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: {
                        required: true,
                         number: true,
                        
                        },
            regionName:{
                        required: true,                       
                        },
           
                },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please fill index integer value !!",
            regionName : " Please enter region name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });

  /// validation for state.php /////
  
  $(function() { 
    $("#stateSubmit").click(function(){
//});   
    // Setup form validation on the #stateForm element	
    $("#stateForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: {
                        required: true,
                         number: true,	
                        
                        },
            stateName:{
                        required: true,                       
                        },
			countryId:{
                        required: true,                       
                        },
                },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please fill index integer value !!",
            stateName : " Please enter state name !!",
            countryId : " Please select country Id !!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  /*
   $(document).ready(function(){
    $('#stateForm').submit(function() {  // stateForm = form_id, submit = input_type 
        var error = 0;
        var countryId = $('#countryId').val(); // countryId = select_id

        if (countryId == "") {                  // --Select Country-- is the default value in select
            error = 1;
            alert('You should select a country Id.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
     */   
  ////// Validation for special_offer.php ////
  
   // When the browser is ready...
   $(function() { 
    $("#special_offerSubmit").click(function(){
//});   
    // Setup form validation on the #special_offerForm element	
    $("#special_offerForm").validate({
    
        // Specify the validation rules
        rules: {
            title:{
                        required: true,                       
                        },
			indexValue: {
                        required: true,
                         number: true,
                        
                        },
            
            description:{
                        required: true,                       
                        },
           
                },
        
        // Specify the validation error messages
        messages: {
			title : " Please enter offer name !!",
            indexValue:" Please fill index integer value !!",
            
            description: " Please enter description here !!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
  ///// Validation for price_level.php //////
  
   $(function() { 
    $("#price_levelSubmit").click(function(){
//});   
    // Setup form validation on the #driver_add element	
    $("#driver_add").validate({
    
        // Specify the validation rules
        rules: {
            levelName: "required",
            
            indexValue:    {
                        required: true,
                    },
            
        },
        
        // Specify the validation error messages
        messages: {
            levelName:"Please Enter price level Name",
            indexValue : "Please Enter Your Index Values",
            
          
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  /////Validation for promo.php /////
  
  $(function() { 
    $("#promoSubmit").click(function(){
//});   
    // Setup form validation on the #promoForm element	
    $("#promoForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            promoCode:{
                        required: true,
                        },
            validDate:    {
                        required: true,
                    },
            discount:    {
                        required: true,
                    },
			maximumQuantity:    {
						required: true,
                    },
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            promoCode : " Please Enter promo code ",
            validDate: " Please Enter valid Date !!",
           discount: " Please Enter discount percent !!",
		   maximumQuantity: " Please Enter max quantity !!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  //  Validation for unit_date.php  //
  
  $(function() { 
    $("#unit_dateSubmit").click(function(){
//});   
    // Setup form validation on the #unit_dateForm element	
    $("#unit_dateForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            unitName:    {
                        required: true,
                    },
            
			
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            unitName : " Please Enter unit name !! ",
            
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  /// Validation for ware_house.php ///
  
  $(function() { 
    $("#ware_houseSubmit").click(function(){
//});   
    // Setup form validation on the #ware_houseForm element	
    $("#ware_houseForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            warehouseName:    {
                        required: true,
                    },
          
			
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value !!",
            warehouseName : " Please Enter warehouse name !! ",
          //  shortName: "Please Enter short name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
  //  Validation for tax.php //

 $(function() { 
    $("#taxSubmit").click(function(){
//});   
    // Setup form validation on the #taxForm element	
    $("#taxForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            taxName:    {
                        required: true,
                    },
          
			
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            taxName : " Please Enter tax name !! ",
          //  shortName: "Please Enter short name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
	// Validation for video.php //
	
	 // When the browser is ready...
   $(function() { 
    $("#videoSubmit").click(function(){
//});   
    // Setup form validation on the #videoForm element	
    $("#videoForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            title:    {
                        required: true,
                    },
            description:    {
                        required: true,
                    },
			URL:    {
                        required: true,
                    },
					
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value !!",
            title : " Please Enter title !! ",
			description:" Please Enter description !!",
            URL : " Please Enter video URL !! ",
          //  shortName: "Please Enter short name !!",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
	//  Validation for product_group.php  //
	
	 $(function() { 
    $("#product_groupSubmit").click(function(){
//});   
    // Setup form validation on the #product_groupForm element	
    $("#product_groupForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            groupCode:    {
                        required: true,
                    },
            groupName:    {
                        required: true,
                    },
			shortName:    {
                        required: true,
                    },
					
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value!!",
            groupCode : " Please Enter product group code !! ",
            groupName: " Please Enter product group name !!",
            shortName: " Please Enter short name !!",
			groupId: " Please select product group !!",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
  // validation for product_category.php ///
  
   // When the browser is ready...
   $(function() { 
    $("#product_categorySubmit").click(function(){
 
    // Setup form validation on the #product_categoryForm element	
    $("#product_categoryForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            categoryCode:    {
                        required: true,
                    },
            categoryName:    {
                        required: true,
                    },
			shortName:    {
                        required: true,
                    },
			groupId:    {
                        required: true,
                    },		
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value!!",
            categoryCode : " Please Enter product category code !! ",
            categoryName: " Please Enter product category name !!",
            shortName: " Please Enter short name !!",
			groupId: " Please select product group !!",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
   $(document).ready(function(){
    $('#product_categoryForm').submit(function() {  // stateForm = form_id, submit = input_type 
        var error = 0;
        var groupId = $('#groupId').val(); // groupId = select_id

        if (groupId == "--Select Group--") {                  // --Select Country-- is the default value in select
            error = 1;
            alert('You should select a product group.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
    

// validation for product_sub_category.php //

		// When the browser is ready...
   $(function() { 
    $("#product_sub_categorySubmit").click(function(){
//});   
    // Setup form validation on the #product_sub_categoryForm element	
    $("#product_sub_categoryForm").validate({
    
        // Specify the validation rules
        rules: {
            categoryCode: "required",
            
            categoryName:    {
                        required: true,
                    },
            
			shortName:    {
                        required: true,
                    },
			parentId:    {
                        required: true,
                    },		
        },
        
        // Specify the validation error messages
        messages: {
            categoryCode:" Please Enter category code !!",
            categoryName : " Please Enter product category name !! ",
            
            shortName: " Please Enter short name !!",
			parentId: " Please select product category  !!",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
 /* 
   $(document).ready(function(){
    $('#product_sub_categoryForm').submit(function() {  
        var error = 0;
        var productCategory = $('#parentId').val();

        if (productCategory == "") {                  
            error = 1;
            alert('You should select a product category.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
 */    
	  
  //validation for product_make.php //
   
   $(function() { 
    $("#product_makeSubmit").click(function(){
 
    // Setup form validation on the #product_makeForm element	
    $("#product_makeForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            makeCode:    {
                        required: true,
                    },
            
			shortName:    {
                        required: true,
                    },
			makeName:    {
                        required: true,
                    },		
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value !!",
            makeCode: " Please Enter product make Code !! ",
            makeName: " Please Enter product make name !! ",
            shortName: " Please Enter short name !!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  
  
  
   //validation for product.php //
   
    // When the browser is ready...
   $(function() { 
    $("#productSubmit").click(function(){
   
    // Setup form validation on the #productForm element	
    $("#productForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            productCode:    {
                        required: true,
                    },
            
			productName:    {
                        required: true,
                    },
			shortName:    {
                        required: true,
                    },	
			categoryId:    {
                        required: true,
                    },
			subcategoryId:    {
                       // required: true,
                    },
			unitId:    {
                        required: true,
                    },
			makeId:    {
                        required: true,
                    },		
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value !!",
            productCode: " Please Enter product Code !! ",
            productName: " Please Enter product name !! ",
            shortName: " Please Enter short name !!",
			categoryId: " Please product select category !!",
			unitId: " Please select unit name !!",
			subcategoryId: " Please select product sub-category Id !!",
			makeId: " Please select product make name !!",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
  /*
	 $(document).ready(function(){
    $('#productForm').submit(function() {  // product_sub_categoryForm = form_id, submit = input_type 
        var error = 0;
        var subcategoryId = $('#productSubCategory').val(); // subcategoryId = select_id

        if (subcategoryId == "--Select SubCategory--") {                  // --Select SubCategory-- is the default value in select
            error = 1;
            alert('You should select a sub-category Id .');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
     
  $(document).ready(function(){
    $('#productForm').submit(function() {  // product_sub_categoryForm = form_id, submit = input_type 
        var error = 0;
        var unitName = $('#unitName').val(); // unitName = select_id

        if (unitName == "--Select Product Unit--") {                  // --Select Product Unit-- is the default value in select
            error = 1;
            alert('You should select a product unit name.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
   */   
//validation for product_price_list.php //
   
    $(function() { 
    $("#product_priceListSubmit").click(function(){
   
    // Setup form validation on the #car_makeForm element	
    $("#product_priceListForm").validate({
    
        // Specify the validation rules
        rules: {
            priceLevelId: "required",
			indexValue: "required",
				},
        
        // Specify the validation error messages
        messages: {
            priceLevelId:" Please select price list!!",
            indexValue:" Please enter integer index value!!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
	
 
   
   //validation for car_make.php //
   
    $(function() { 
    $("#car_makeSubmit").click(function(){
   
    // Setup form validation on the #car_makeForm element	
    $("#car_makeForm").validate({
    
        // Specify the validation rules
        rules: {
            makeName: "required",
			indexValue: "required",
				},
        
        // Specify the validation error messages
        messages: {
            makeName:" Please Enter vehicle name !!",
            indexValue:" Please enter integer index value!!",
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
   
   
   //validation for package.php //
   
    $(function() { 
    $("#packageSubmit").click(function(){
//});   
    // Setup form validation on the #packageForm element	
    $("#packageForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            packageName:    {
                        required: true,
                    },
            
			packageCode:    {
                        required: true,
                    },
			
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter index value !!",
            packageName: " Please Enter product name !! ",
            packageCode: " Please Enter package code !! ",
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
   
   //validation for package_price_list.php //
   
     
   
    $(function() { 
    $("#package_price_listSubmit").click(function(){
//});   
    // Setup form validation on the #packageForm element	
    $("#package_price_listForm").validate({
    
        // Specify the validation rules
        rules: {
            indexValue: "required",
            
            priceLevelId:    {
                        required: true,
                    },
            
			
			
        },
        
        // Specify the validation error messages
        messages: {
            indexValue:" Please Enter integer index value !!",
            priceLevelId: " Please select price level !! ",
            
           
         
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
   
	/*  $(document).ready(function(){
    $('#package_price_listForm').submit(function() {  // package_price_listForm = form_id, submit = input_type 
        var error = 0;
        var PriceLevel = $('#priceLevel').val(); // PriceLevel = select_id

        if (PriceLevel == "") {                  // --Select Price Level-- is the default value in select
            error = 1;
            alert('You should select a Price level.');
        }

        if (error) {
            return false;
        } else {
            return true;
        }

    });
});
    */
   
   
   //validation for franchise_list.php //
   $(function() { 
    $("#franchise_listSubmit").click(function(){
   
   
    $("#franchise_listForm").validate({
		rules: {
            status:    {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
   
   
   
   
   //validation for user_list.php //
   $(function() { 
    $("#user_listSubmit").click(function(){
   
   
    $("#user_listForm").validate({
		rules: {
            status:    {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
    
	
	
   //validation for product_list.php //
   $(function() { 
    $("#product_listSubmit").click(function(){
   
   
    $("#product_listForm").validate({
		rules: {
            status: {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
  
   //validation for package_listMIS.php //
   $(function() { 
    $("#package_listMISSubmit").click(function(){
   
   
    $("#package_listMISForm").validate({
		rules: {
            status: {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });

 
   //validation for customer_listMIS.php //
   $(function() { 
    $("#customer_listMISSubmit").click(function(){
   
   
    $("#customer_listMISForm").validate({
		rules: {
            status: {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
	
   //validation for value_card_saleMIS.php //
   $(function() { 
    $("#value_card_saleMISSubmit").click(function(){
   
   
    $("#value_card_saleMISForm").validate({
		rules: {
            status: {
                        required: true,
                    },
				},
        
       messages: {
            status:" Please select status !!", 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  });
	
	
	 //validation for admin_change_password.php //
	 
	 $(function() { 
    $("#admin_change_passwordSubmit").click(function(){
//});   
    // Setup form validation on the #admin_change_passwordForm element	
    $("#admin_change_passwordForm").validate({
    
        // Specify the validation rules
        rules: {
            oldPassword: "required",
			newPassword: "required",
			
			confirmPassword: {
						 required: true,
                         equalTo: "#newPassword"
						},
				},
        
        // Specify the validation error messages
        messages: {
            confirmPassword:" Please Enter old password !!",
            newPassword:" Please Enter new password !!",
            confirmPassword:" Please Enter confirm password same as new password !!",
			//confirmPassword:" password does not match !!",
		},
        
        submitHandler: function(form) {
            form.submit();
			 if(validator.form()){
  alert('Sucess');
 }
        }
    });

  });
  });
  
  
  // validation for second phase //

// validation for job_estimate.php

	$(function() { 
    $("#jobEstimateSubmit").click(function(){
   
   
    $("#jobEstimateForm").validate({       // Setup form validation on the #job_estimateForm element
        rules: {						// Specify the validation rules
           // jobNumber: "required",
			customerName: {
						 required: true,
                         },
			vehicleRegistrationNumber: {
						 required: true,
                         },			
			registrationYear: {
						 required: true,
                         },	
			address: {
						 required: true,
                         },	
			supervisorName: {
						 required: true,
                         },
			mobileNumber:{
                        required: true,
                         number: true,
                         minlength: 10,
                         maxlength: 11
                        },		
			mailId: {
						 required: true,
						 email: true
                         },						
			inTime: {
						 required: true,
                         },	
			outTime: {
						 required: true,
                         },
				},
        
        // Specify the validation error messages
        messages: {
            //jobNumber:" Please Enter job number !!",
            customerName:" Please Enter customer name !!",
            vehicleRegistrationNumber:" Please Enter vehicle registration number!!",
			registrationYear:" Please Enter registration year !!",
			address:" Please Enter franchise address  !!",
			supervisorName:" Please Enter supervisor name !!",
			mobileNumber:" Please Enter mobile number  !!",
			mailId: {
                required: " Please enter a valid email address !!",
                minlength: " Please enter a valid email address !!",
                remote: jQuery.format("{0} is already in use")
            },
			inTime:" Please Enter in time !!",
			outTime:" Please Enter  out time !!",
			stateId:" Please select region !!",
			priceLevelId:" Please select price level !!",
			cityId:" Please select city !!",
	  },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 


// validation for service_invoice.php  
$(function() { 
    $("#serviceInvoiceSubmit").click(function(){
   
   
    $("#serviceInvoiceForm").validate({       // Setup form validation on the #serviceInvoiceForm element
        rules: {						// Specify the validation rules
          
			invoiceReferenceNumber: {
						 required: true,
                         },
			invoiceDate: {
						 required: true,
                         },
				},
		 messages: {
           
            invoiceReferenceNumber:" Please Enter Invoice Reference Number !!",
            invoiceDate:" Please Enter Invoice Date!!",
			
			},
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 
 
// validation for accessory_invoice.php 

$(function() { 
    $("#accessoryInvoiceSubmit").click(function(){
   
   
    $("#accessoryInvoiceForm").validate({       // Setup form validation on the #job_estimateForm element
        rules: {						// Specify the validation rules
           // jobNumber: "required",
			invoiceReferenceNumber: {
						 required: true,
                         },
			invoiceDate: {
						 required: true,
                         },			
			customerName: {
						 required: true,
                         },	
			address: {
						 required: true,
                         },	
			
			mobileNumber:{
                        required: true,
                         number: true,
                         minlength: 10,
                         maxlength: 11
                        },		
			mailId: {
						 required: true,
						 email: true
                         },						
			
				},
        
        // Specify the validation error messages
        messages: {
            //jobNumber:" Please Enter job number !!",
            invoiceReferenceNumber:" Please Enter Invoice Reference Number !!",
            invoiceDate:" Please Enter Invoice Date!!",
			customerName:" Please Enter Customer Name !!",
			address:" Please Enter franchise address  !!",
			
			mobileNumber:" Please Enter mobile number  !!",
			mailId: {
                required: " Please enter a valid email address !!",
                minlength: " Please enter a valid email address !!",
                remote: jQuery.format("{0} is already in use")
            },
			
	  },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 

// validation for value_card_sale.php 

$(function() { 
    $("#valueCardSaleSubmit").click(function(){
   
   
    $("#valueCardSaleForm").validate({       // Setup form validation on the #job_estimateForm element
        rules: {						// Specify the validation rules
           // jobNumber: "required",
			transactionNumber: {
						 required: true,
                         },
			date: {
						 required: true,
                         },			
			customerName: {
						 required: true,
                         },	
			address: {
						 required: true,
                         },	
			
			mobileNumber:{
                        required: true,
                         number: true,
                         minlength: 10,
                         maxlength: 11
                        },		
			mailId: {
						 required: true,
						 email: true
                         },						
			cardNumber: {
						 required: true,
                         },
			cardAmount: {
						 required: true,
                         },
				},
        
        // Specify the validation error messages
        messages: {
            //jobNumber:" Please Enter job number !!",
            transactionNumber:" Please Enter Transaction Number !!",
            date:" Please Enter Date!!",
			customerName:" Please Enter Customer Name !!",
			address:" Please Enter franchise address  !!",
			
			mobileNumber:" Please Enter mobile number  !!",
			mailId: {
                required: " Please enter email address !!",
                minlength: " Please enter a valid email address !!",
                remote: jQuery.format("{0} is already in use")
            },
			cardNumber:" Please Enter Card Number !!",
			cardAmount:" Please Enter Card Amount !!",
	  },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 

/*
// validation for value_card_used_details.php  
$(function() { 
    $("#valueCardUsedDetailsSubmit").click(function(){
   
   
    $("#valueCardUsedDetailsForm").validate({       // Setup form validation on the #valueCardUsedDetailsForm element
        rules: {						// Specify the validation rules
          
			cardNumber: {
						 required: true,
                         },
			
		 messages: {
           
            cardNumber:" Please Enter Card Number !!",			
			},
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 
 

// validation for register_customer.php 

$(function() { 
    $("#registerCustomerSubmit").click(function(){
   
   
    $("#registerCustomerForm").validate({       // Setup form validation on the #registerCustomerForm element
        rules: {						// Specify the validation rules
           // jobNumber: "required",
			customerName: {
						 required: true,
                         },
			
			address: {
						 required: true,
                         },	
			
			mobileNumber:{
                        required: true,
                         number: true,
                         minlength: 10,
                         maxlength: 11
                        },		
			mailId: {
						 required: true,
						 email: true
                         },						
			
				},
        
        // Specify the validation error messages
        messages: {
            //jobNumber:" Please Enter job number !!",
            customerName:" Please Enter Customer Name !!",		
			address:" Please Enter franchise address  !!",
			
			mobileNumber:" Please Enter mobile number  !!",
			mailId: {
                required: " Please enter a valid email address !!",
                minlength: " Please enter a valid email address !!",
                remote: jQuery.format("{0} is already in use")
            },
			
	  },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  }); 
 */
  