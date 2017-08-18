<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$countryList = $Location->get_country_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['roleId'] = 4;
	$param['conditionParam']['param']['status'] = 1;
	$userList = $User->get_user_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$roleList = $User->get_role_list($param)['data'];
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='filterRecords'))
	{
		$param = array();
		$param['conditionParam']['param']['roleId'] = 2;
		if(isset($_REQUEST['firstName']) && ($_REQUEST['firstName'] != ''))
		$param['conditionParam']['param']['firstName'] = $_REQUEST['firstName'];	
		if(isset($_REQUEST['contactNumber']) && ($_REQUEST['contactNumber'] != ''))
		$param['conditionParam']['param']['contactNumber'] = $_REQUEST['contactNumber'];	
		if(isset($_REQUEST['landline']) && ($_REQUEST['landline'] != ''))
		$param['conditionParam']['param']['landline'] = $_REQUEST['landline'];	
		if(isset($_REQUEST['mailId']) && ($_REQUEST['mailId'] != ''))
		$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
		$userList = $User->get_user_list($param)['data'];
	}
?>
<?php 
	if(isset($_GET['flag']) && $_GET['flag'] <= 0)
	{ 
	?>
		 
	<?php 
	}
	if(isset($_GET['flag']) && $_GET['flag'] > 0)
	{
	?>
		 
	<?php 
	} 
?>
			<div id="content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="<?= $_PATH['root'] ?>">Home</a>						
						</li>
						<li class="active">Florist Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Delivery Agent > View</h3>
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    		<!--  <button type="button" class="btn btn-info" onclick="window.location='./?url=raw_materials&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>-->
                    	</h2>
                    </div>
                </div>
				<div class="table-header" align="center">
					<form method="post" class="form-horizontal" role="form">
						<input type="hidden" name="action" value="filterRecords">
						<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
						Name :
						<input type="text" name="firstName" value="<?= (isset($_REQUEST['firstName'])?$_REQUEST['firstName']:'')?>">
						&nbsp;&nbsp;&nbsp;
						Contact No :
						<input type="text" name="contactNumber" value="<?= (isset($_REQUEST['contactNumber'])?$_REQUEST['contactNumber']:'')?>">
						&nbsp;&nbsp;&nbsp;
						Landline :
						<input type="text" name="landline" value="<?= (isset($_REQUEST['landline'])?$_REQUEST['landline']:'')?>">
						<br />
						<br />
						&nbsp;&nbsp;&nbsp;
						Email :
						<input type="text" name="mailId" value="<?= (isset($_REQUEST['mailId'])?$_REQUEST['mailId']:'')?>">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-info" type="submit" style="padding:0px;">
							Submit
						</button>
						&nbsp;&nbsp;&nbsp;
						<button class="btn btn-info" type="reset" style="padding:0px;">
							<a href="./?url=florists&tab=View">Reset  Filter</a>
						</button>
					</form>
				</div>
				<br/>
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Role.</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>MailId</th>
													<th>Contact Number</th>
													<th>Landline</th>
													<th>Country</th>
													<th>State</th>
													<th>City</th>
													<th>Zip Code</th>
													<th>Status</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($userList);$count++)
												{
													$item = $userList[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['roleId'];
													$roleDetails = $User->get_role_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['countryId'];
													$countryDetails = $Location->get_country_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['stateId'];
													$stateDetails = $Location->get_state_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['cityId'];
													$cityDetails = $Location->get_city_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($roleDetails->roleName) ?></td>
													<td><?= $purifier->purify($item['firstName']) ?></td>
													<td><?= $purifier->purify($item['lastName']) ?></td>
													<td><?= $purifier->purify($item['mailId']) ?></td>
													<td><?= $purifier->purify($item['contactNumber']) ?></td>
													<td><?= $purifier->purify($item['landline']) ?></td>
													<td><?= $purifier->purify($countryDetails->countryName) ?></td>
													<td><?= $purifier->purify($stateDetails->stateName) ?></td>
													<td><?= $purifier->purify($cityDetails->cityName) ?></td>
													<td><?= $purifier->purify($item['zipcode']) ?></td>
													<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
													<!--<td>
														<a id="edit" class="green" href="?url=users&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> 
														|
														<a href="./form_handler.php?action=manageUsers&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a>
														<a href="./?url=trips&tab=View&deliveryAgentId=<?= $item['id'] ?>"  >Manage Trips</a>-->
													</td>
												</tr>
												<?php
												}
											
											?>
                                             
											</tbody>
										</table>
								</div>
                    </div>
                </div>
            </div>          
    <?php }
    
	else
	{  
	$tab = $purifier->purify($_GET['tab']);  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $User->get_user_details($param)['data'];
	
	$param = array();
	$param['conditionParam']['param']['countryId'] = $details->country;
	$stateList = $Location->get_state_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['stateId'] = $details->state;
	$cityList = $Location->get_city_list($param)['data'];
	}
	?>         
		<div class="row">
				<div class="row" style="padding:0 30px;">
                    <div class="col-sm-10">
                        <h3>User > <?php echo $tab; ?></h3>
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=users&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>
                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
									<input type="hidden" name="action" value="manageUsers" >
									<input type="hidden" name="type" value="<?= $purifier->purify($_REQUEST['tab']) ?>" >
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									}
									?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Role </label>
										<div class="col-sm-9">
											<select name="roleId" id="role" class="form-control">
											<option>Select</option>
												<?php
													for($count=0;$count<count($roleList);$count++)
													{
														$roleListItem = $roleList[$count];
												?>
												<option value="<?= $roleListItem['id'] ?>"><?= $roleListItem['roleName']  ?></option>
												<?php
													}
												?>
											</select>
										</div>
										<?php
											if($_REQUEST['tab']=='Edit')
											{
										?>
										<script>
											jQuery("#role").val("<?= $details->roleId ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name</label>
										<div class="col-sm-9">
											<input type="text" required name="firstName" placeholder="First Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->firstName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-9">
											<input type="text" required name="lastName" placeholder="lastName" class="form-control" value="<?= isset($details)?$purifier->purify($details->lastName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MailId  </label>

										<div class="col-sm-9">
											<input type="text" required name="mailId" placeholder="MailId" class="form-control" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

										<div class="col-sm-9">
											<input type="text" required name="password" placeholder="Password" class="form-control" value="<?= isset($details)?$purifier->purify($details->password):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Contact Number</label>
										<div class="col-sm-9">
											<input type="text" required name="contactNumber" placeholder="Contact Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->	contactNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Country </label>
										<div class="col-sm-9">
											<select name="country" id="country" class="form-control" 
											onchange='getStateList("country")'>
												<option>Select</option>
												<?php
													for($count=0;$count<count($countryList);$count++)
													{
														$countryListItem = $countryList[$count];
												?>
												<option value="<?= $countryListItem['id'] ?>"><?= $countryListItem['countryName']  ?></option>
												<?php
													}
												?>
											</select>
										</div>
										<?php
											if($_REQUEST['tab']=='Edit')
											{
										?>
										<script>
											jQuery("#country").val("<?= $details->country ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> State</label>

										<div class="col-sm-9">
										<select name="state" id="state" class="form-control" onchange='getCityList("state")'>
											<option>Select</option>
											<?php
											if($_REQUEST['tab']=='Edit')
											{	
												for($count=0;$count<count($stateList);$count++)
												{
													$stateListItem = $stateList[$count];
											?>
											<option value="<?= $stateListItem['id'] ?>"><?= $stateListItem['stateName']  ?></option>
											<?php
												}
											}	
											?>
										</select>
										</div>
										<?php
											if($_REQUEST['tab']=='Edit')
											{
										?>
										<script>
											jQuery("#state").val("<?= $details->state ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> City </label>
										<div class="col-sm-9">
										<select name="city" id="city" class="form-control">
											<option>Select</option>
											<?php
											if($_REQUEST['tab']=='Edit')
											{	
												for($count=0;$count<count($cityList);$count++)
												{
													$cityListItem = $cityList[$count];
											?>
											<option value="<?= $cityListItem['id'] ?>"><?= $cityListItem['cityName']  ?></option>
											<?php
												}
											}	
											?>
										</select>
										</div>
										<?php
											if($_REQUEST['tab']=='Edit')
											{
										?>
										<script>
											jQuery("#city").val("<?= $details->city ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Zipcode</label>

										<div class="col-sm-9">
											<input type="number" name="zipcode" placeholder="Zipcode" class="form-control" value="<?= isset($details)?$purifier->purify($details->zipcode):'' ?>" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Index </label>

										<div class="col-sm-9">
											<input type="number" name="indexValue" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->indexValue):'' ?>" />
										</div>
									</div>
									<div class="form-group" id="blkAttributeFields"></div>
									
									<!-- /section:elements.form -->
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status </label>

										<div class="col-sm-9">
											<label>
													<input   type="radio" name="status" value="1" <?php if((isset($details) && $details->status==1) || $tab=="Add"){  ?> checked="checked" <?php } ?> class="ace">
													<span class="lbl">Active</span>
											</label>		
											&nbsp; &nbsp; 
											<label>
													<input   type="radio" name="status" <?php if(isset($details) && $details->status==0){ ?> checked="checked" <?php } ?> value="0" class="ace">
													<span class="lbl">Inactive</span>
											</label>	
										</div>
									</div>
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
										
								</form>
								<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
            	<?php 
            }	
            ?>

        </div>
       	<?php
	if($user != null)
		include 'includes/content/blocks/right_bar.php';	
    ?>
		 