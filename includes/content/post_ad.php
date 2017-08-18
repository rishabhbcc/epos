<?php 
	$param = array();
	$param['conditionParam']['param']['status'] = 1;
	$categories = $Ad->get_category_list($param)['data'];
	$currentCategory = $categories[0]['id'];
	if(isset($_REQUEST['category']) && ($_REQUEST['category']!=null))
	{
		$currentCategory = $_REQUEST['category'];
		$param = array();
		$param['conditionParam']['param']['category'] = $_REQUEST['category'];
		$param['conditionParam']['param']['status'] = 1;
	}
	else {
		$param = array();
		$param['conditionParam']['param']['category'] = $currentCategory;
		$param['conditionParam']['param']['status'] = 1;
	}
	$subcategories = $Ad->get_subcategory_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['category'] = $currentCategory;
	$param['conditionParam']['param']['status'] = 1;
	$param['orderBy'] = 'indexValue';
	$formFields = $Ad->get_category_field_list($param)['data'];
?>
<section class=" bread">
	<div class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li>You are here: &nbsp;</li>
					<li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="active">Post Ads</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<!-- Breadcums Ends -->

<!-- Listing Start -->

<section class="common_listing">
<div class="wrapper">
<div class="row">
<div class="col-md-3">
	<div id='cssmenu'>
    <h1>Categories</h1>
		<ul>
			<?php 
			for($count=0;$count<count($categories);$count++)
			{
			?>
			<li class="<?= ($count==0?'active':'') ?>"><i class="fa fa-sign-out"></i> <a href="<?= $_PATH['root'] ?>/?url=post_ad&category=<?= $categories[$count]['id'] ?>"><span><?= $categories[$count]['categoryName'] ?></span></a></li>
			<?php 
			}
			?>
		  </ul>
	 </div>
</div>
<div class="col-md-9 post_ads">
	<h1>Create Your Ads	</h1>
	<form action="<?= $_PATH['formHandler'] ?>" method="post">
	    <div class="form-group">
	        <label class="col-sm-2 control-label" for="inputEmail3">Subcategory:</label>
	        <div class="col-sm-10">
	          	<select class="form-control list_menu_1" name="subcategory" required>
		        	<option value="">Select</option>
		        	<?php 
		        	for($count=0;$count<count($subcategories);$count++)
		        	{
		        	?>
		        	<option value="<?= $subcategories[$count]['id'] ?>"><?= $subcategories[$count]['subcategoryName'] ?></option>
		        	<?php 	
		        	}
		        	?>	
		      	</select>
	        </div>
	        <div class="clear"></div>
	      </div> 
	      <div class="form-group">
	        <label class="col-sm-2 control-label" for="inputEmail3">Ad Title:</label>
	        <div class="col-sm-10">
	          <input type="text" name="title" placeholder="Enter the ad title" class="form-control list_menu_1">
	        </div>
	        <div class="clear"></div>
	      </div>
	      <?php include 'includes/content/forms/frm_post_ad.php'; ?>     
	      <!--  
	      
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Pictures:<br>
			<small>Add up to six photos</small></label>
	        <div class="col-sm-10">
	        	<div class="col-sm-2 no_pad">
	            	<div class="float-left relative aiupload-left">
						  <input type="file" multiple="" data-url="/ai/upload_images/1" accept="image/jpeg,image/gif,image/png,image/bmp" name="images[]" class="imageupload" tabindex="-1">
						  <div class="panel-dashed text-center pam">
						  <i class="fa fa-camera"></i>
						  </div>
						  <span class="btn btn-yellow mtxs js-aiupload-btn"> Add Photos </span> 
	  				</div>
	            </div>
	            <div class="col-sm-10">
	            	<div class="panel-body">
						<h5>Did you know that ads with real images <strong> sold 7 times faster </strong>? Begins to climb the upload now!</h5>
					</div>
	            </div>
	        </div>
	        <div class="clear"></div>
	      </div>
	      -->
	      <h1><i class="fa fa-user"></i> Vendor Information</h1>
	      
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">I am:</label>
	        <div class="col-sm-10">
	      <label class="radio-inline">
	        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
	      A Particular<br>
	</label>
	      <label class="radio-inline">
	        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
	      A professional / company      </label>      
	        </div>
	        <div class="clear"></div>
	      </div>
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">First Name:</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control list_menu_1" placeholder="Enter Name">
	        </div>
	        <div class="clear"></div>
	      </div>
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Postal Address:</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control list_menu_1" placeholder="Your email address">
	        </div>
	        <div class="clear"></div>
	      </div>
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">Phone:</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control list_menu_1" placeholder="Your phone number">
	        </div>
	        <div class="clear"></div>
	      </div>
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
	        <div class="col-sm-10">
	      <label class="checkbox-inline">
	      <input type="checkbox" value="option1" id="inlineCheckbox1"> Hide the Phone Number
	      </label>
	      <label class="checkbox-inline">
	      <input type="checkbox" value="option2" id="inlineCheckbox2"> I use WhatsApp
	      </label>
	        </div>
	        <div class="clear"></div>
	      </div>
	      <div class="form-group">
	        <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
	        <div class="col-sm-10">
	          <button type="submit" class="btn btn-success">Post Your Ad</button>
	        </div>
	        <div class="clear"></div>
	      </div>
      </form>
</div>
</div>
</div>
</section>