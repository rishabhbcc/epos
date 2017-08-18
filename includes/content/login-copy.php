<!-- Breadcums Start -->
<section class=" bread">
<div class="wrapper">
<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
	<li>You are here: &nbsp;</li>
	<li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-home"></i> Home</a></li>
	<li class="active">Login</li>
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
		    	<input type="hidden" name="action" value="login" />
		    	<input type="hidden" name="guestAccessToken" value="<?= $_SESSION[$_SESSION_ID]['guestAccessToken'] ?>" />
			      <h1>Member Login</h1>
			      <div class="login-fields">
			        <p>Please provide your details</p>
			        <div class="field">
			          <label for="username">Username</label>
			          <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field">
			        </div>
			        <!-- /field -->
			        <div class="field">
			          <label for="password">Password:</label>
			          <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field">
			        </div>
			        <!-- /password -->
			      </div>
			      <!-- /login-fields -->
			      <div class="login-actions"> <span class="login-checkbox">
			        <input type="checkbox" id="Field" name="Field" class="field login-checkbox" value="First Choice" tabindex="4">
			        <label class="choice" for="Field">Keep me signed in</label>
			        </span>
			        <button class="button btn btn-success btn-large">Sign In</button>
			      </div>
			      <!-- .actions -->
		    </form>
		  </div>
  <!-- /content -->
</div>
    </div>
    <div class="clear"></div>
    <div class="login-extra">
    	<div class="col-md-5"><a href="forget_pass.html">Reset Password</a></div>
        <div class="col-md-7 text-right">You do not have an account?<br>
        <a href="register.html">Sign up free!</a></div>
    </div>
</div>
</div>
</section>