<?php 
	$param = array();
	$param['conditionParam']['param']['status'] = 1;
	$userTypeList = $User->get_user_type_list($param)['data'];
?>
<section class=" bread">
<div class="wrapper">
<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
	<li>You are here: &nbsp;</li>
	<li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Register</li>
</ol>
</div>
</div>
</div>
</section>
<!-- Breadcums Ends -->

<!-- Listing Start -->

<section class="common_listing">
<div class="wrapper padLR15">
<div class="row">
	<div class="col-md-12">
    	<div class="account-container">
			  <div class="content clearfix">
			  	<?php 
					if(isset($_REQUEST['flag']) && $_REQUEST['flag'] <= 0)
					{ 
					?>
						<div class="alert alert-danger" > <?= $purifier->purify($_GET['msg']) ?> </div>
					<?php 
					}
					if(isset($_REQUEST['flag']) && $_REQUEST['flag'] > 0)
					{
					?>
						<div class="alert alert-block alert-success"> <?= $purifier->purify($_GET['msg']) ?>.</div>
					<?php 
					} 
				?>	
			    <form action="<?= $_PATH['formHandler'] ?>" method="post">
			    	<input type="hidden" name="access" value="true" />
			    	<input type="hidden" name="action" value="manageAccount" />
			    	<input type="hidden" name="type" value="Add" />
			    	<input type="hidden" name="guestAccessToken" value="<?= $_SESSION[$_SESSION_ID]['guestAccessToken'] ?>" />
			      <h1>Create an Account</h1>
			      <h2>All your favorite ads in the same place, for free!</h2>
			      <div class="login-fields">
			        <p>Please provide your details</p>
			        <div class="field">
			          <label for="username">User Type</label>
			          <?php 
			          for($count=0;$count<count($userTypeList);$count++)
			          {
			          ?>
			          <input style="width:auto;display:inline" <?= ($count==0?'checked':'') ?> type="radio" name="userType" value="<?= $userTypeList[$count]['id'] ?>" /> <?= $userTypeList[$count]['typeName'] ?> &nbsp;
			          <?php 
			          }
			          ?>
			        </div>
			        <div class="field">
			          <label for="username">First Name:</label>
			          <input type="text" id="firstName" required name="firstName" value="" placeholder="First Name" class="login username-field">
			        </div>
			        <div class="field">
			          <label for="username">Last Name:</label>
			          <input type="text" id="lastName" name="lastName" value="" placeholder="Last Name" class="login username-field">
			        </div>
			        <div class="field">
			          <label for="username">Username:</label>
			          <input type="text" id="username" required name="username" value="" placeholder="Username" class="login username-field">
			        </div>
			        <div class="field">
			          <label for="username">Your email address:</label>
			          <input type="email" id="mailId" required name="mailId" value="" placeholder="Your email address:" class="login mail-field">
			        </div>
			        <!-- /field -->
			        <div class="field">
			          <label for="password">Password:</label>
			          <input type="password" id="password" required name="password" value="" placeholder="Password" class="login password-field">
			        </div>
			        <div class="field">
			          <label for="password">Confirm Password:</label>
			          <input type="password" id="confirmPassword" required  value="" placeholder="Confirm Password" class="login password-field">
			        </div>
			        <!-- /password -->
			      </div>
			      <!-- /login-fields -->
			      <div class="login-actions"> <span class="login-checkbox">
			        <input type="checkbox" id="Field" name="Field" class="field login-checkbox" value="First Choice" tabindex="4">
			        </span>
			        <button class="button btn btn-success btn-large">Create Account</button>
			      </div>
			      <!-- .actions -->
			    </form>
			  </div>
			  <!-- /content -->
			</div>
    </div>
    <div class="clear"></div>
    <div class="login-extra">
        By clicking "Create Account" I recognize the Classified <a href="#">Privacy Policy</a>
        </div>
</div>
</div>
</section>