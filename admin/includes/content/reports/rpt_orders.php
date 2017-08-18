<?php 
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$list = $Order->get_orders_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['roleId'] = 3; // For Customer
	$userList = $User->get_user_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$orderStatusList = $Order->get_order_status_list($param)['data'];
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$countryList = $Location->get_country_list($param)['data'];
	$stateList = array();
	$cityList = array();
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='filterRecords'))
	{
		$param = array();
		$param['conditionParam']['param']['1'] = 1;
		if(isset($_REQUEST['countryId']) && ($_REQUEST['countryId']!=''))
			$param['conditionParam']['param']['countryId'] = $_REQUEST['countryId'];
		if(isset($_REQUEST['stateId']) && ($_REQUEST['stateId']!=''))
			$param['conditionParam']['param']['stateId'] = $_REQUEST['stateId'];
		if(isset($_REQUEST['cityId']) && ($_REQUEST['cityId']!=''))
			$param['conditionParam']['param']['cityId'] = $_REQUEST['cityId'];
		if(isset($_REQUEST['orderId']) && ($_REQUEST['orderId'] != ''))
			$param['conditionParam']['param']['orderId'] = $_REQUEST['orderId'];
		if(isset($_REQUEST['userId']) && ($_REQUEST['userId'] != ''))
			$param['conditionParam']['param']['userId'] = $_REQUEST['userId'];
		$list = $Order->get_orders_list($param)['data'];
		if(isset($_REQUEST['countryId']) && ($_REQUEST['countryId']!='')){
			$param = array();
			$param['conditionParam']['param']['countryId'] = $_REQUEST['countryId'];
			$param['conditionParam']['param']['status'] = 1;
			$stateList = $Location->get_state_list($param)['data'];
		}
		if(isset($_REQUEST['stateId']) && ($_REQUEST['stateId']!='')){
			$param = array();
			$param['conditionParam']['param']['stateId'] = $_REQUEST['stateId'];
			$param['conditionParam']['param']['status'] = 1;
			$cityList = $Location->get_city_list($param)['data'];
		}
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
							<a href="<?= $_PATH['root'] ?>">Home</a>						</li>
					 
						<li class="active">Orders Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Orders > View</h3>
                    </div>
                  <!--  <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=orders&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>-->
                </div>
				
						<div class="table-header" align="center">
						<form class="form-horizontal" role="form" action='' method="post">
						<input type="hidden" name="action" value="filterRecords" >
						<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
						Country: 
							<select required name="countryId" id="country" onchange='getStateList("country")'style="width:20%;display: inline-block;" class="form-control">
								<option value="">Select</option>
								<?php
									for($count=0;$count<count($countryList);$count++)
									{
										$countryListItem = $countryList[$count];
								?>
								<option <?= (isset($_REQUEST['countryId'])&&($_REQUEST['countryId']==$countryListItem['id'])?'selected':'') ?> value="<?= $countryListItem['id'] ?>"><?= $countryListItem['countryName']  ?></option>
								<?php
									}
								?>
							</select>
							&nbsp;&nbsp;&nbsp;
						State:
							<select name="stateId" id="state" onchange='getCityList("state")'style="width:20%;display: inline-block;" class="form-control">
								<option value="">Select</option>
								<?php
								if(isset($_REQUEST['countryId']) && ($_REQUEST['countryId']!=''))
								{	
									for($count=0;$count<count($stateList);$count++)
									{
										$stateListItem = $stateList[$count];
								?>
								<option <?= (isset($_REQUEST['stateId'])&&($_REQUEST['stateId']==$stateListItem['id'])?'selected':'') ?> value="<?= $stateListItem['id'] ?>"><?= $stateListItem['stateName']  ?></option>
								<?php
									}
								}	
								?>
							</select> 
							&nbsp;&nbsp;&nbsp;
						City :
							<select name="cityId" id="city" style="width:20%;display: inline-block;" class="form-control">
								<option value="">Select</option>
								<?php
								if(isset($_REQUEST['stateId']) && ($_REQUEST['stateId']!=''))
								{	
									for($count=0;$count<count($cityList);$count++)
									{
										$cityListItem = $cityList[$count];
								?>
								<option <?= (isset($_REQUEST['cityId'])&&($_REQUEST['cityId']==$cityListItem['id'])?'selected':'') ?> value="<?= $cityListItem['id'] ?>"><?= $cityListItem['cityName']  ?></option>
								<?php
									}
								}	
								?>
						</select>
						&nbsp;&nbsp;&nbsp;
						<br />
							<br />
						
						Customer :
							<input type="text" name="userId">
							
						Order No:
							<input type="text" name="orderId" value="<?= (isset($_REQUEST['orderId'])?$_REQUEST['orderId']:'') ?>">
							
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<button class="btn btn-info" type="submit" style="padding:0px;">
							Submit
						</button>
						<button class="btn btn-info" type="reset" style="padding:0px;">
							<a href="./?url=orders&tab=View">Reset  Filter</a>
						</button>
						</div>
						  <br />       
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Delivery Date</th>
													<th>Order No</th>
													<th>User</th>
													<th>Total Price</th>
													<th>Tax</th>
													<th>Country</th>
													<th>State</th>
													<th>City</th>
													<th>Zipcode</th>
													<th>Address</th>
													<th>Status</th>
												<!--	<th class="hidden-480">Option</th>		-->											
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['countryId'];
													$countryDetails = $Location->get_country_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['stateId'];
													$stateDetails = $Location->get_state_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['cityId'];
													$cityDetails = $Location->get_city_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['userId'];
													$userDetails = $User->get_user_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['status'];
													$orderStatusDetails = $Order->get_order_status_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($item['deliveryDate']) ?></td>
													<td><?= $purifier->purify($item['orderId']) ?></td>
													<td><?= $purifier->purify($userDetails->firstName) ?></td>
													<td><?= $purifier->purify($item['totalPrice']) ?></td>
													<td><?= $purifier->purify($item['tax']) ?></td>
													<td><?= $purifier->purify($countryDetails->countryName) ?></td>
													<td><?= $purifier->purify($stateDetails->stateName) ?></td>
													<td><?= $purifier->purify($cityDetails->cityName) ?></td>
													<td><?= $purifier->purify($item['zipcode']) ?></td>
													<td><?= $purifier->purify($item['address']) ?></td>
													<td><?= $purifier->purify($orderStatusDetails->statusName) ?></td>
												<!--	<td>
														<a id="edit" class="green" href="?url=orders&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |<a href="./form_handler.php?action=manageOrder&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a>|
														<a class="green" href="?url=order_items&tab=View&orderId=<?= $item['id'] ?>" title="manageOrder">Manage Order Items	</a></td>-->
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
	$tab=$_GET['tab'];  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Order->get_orders_details($param)['data'];
		$param = array();
		$param['conditionParam']['param']['countryId'] = $details->countryId;
		$stateList = $Location->get_state_list($param)['data'];
		$param = array();
		$param['conditionParam']['param']['stateId'] = $details->stateId;
		$cityList = $Location->get_city_list($param)['data'];
	} 
	?>            
			<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Orders > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=orders&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
						<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageOrder' method="post">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<?php
									}
									?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Delivery Date</label>

										<div class="col-sm-9">
											<input type="date" name="deliveryDate"  class="form-control" placeholder="Delivery Date" value="<?= isset($details)?$purifier->purify($details->deliveryDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Order Id </label>

										<div class="col-sm-9">
											<input type="text" name="orderId"  class="form-control" placeholder="OrderId" value="<?= isset($details)?$purifier->purify($details->orderId): date("Ymdhis").rand(10,100) ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Name </label>
										<div class="col-sm-9">
										<select name="userId" id="user" class="form-control">
											<option>Select</option>
											<?php
												for($count=0;$count<count($userList);$count++)
												{
													$userListItem = $userList[$count];
											?>
											<option value="<?= $userListItem['id'] ?>"><?= $userListItem['firstName']  ?></option>
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
											jQuery("#user").val("<?= $details->userId ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Price </label>

										<div class="col-sm-9">
											<input type="number" name="price"  class="form-control" placeholder="Price" value="<?= isset($details)?$purifier->purify($details->price):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Coupon Code </label>

										<div class="col-sm-9">
											<input type="text" name="couponCode"  class="form-control" placeholder="Coupon Code" value="<?= isset($details)?$purifier->purify($details->couponCode):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discount  </label>

										<div class="col-sm-9">
											<input type="number" name="discount" placeholder="Discount" class="form-control" value="<?= isset($details)?$purifier->purify($details->discount):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total Price </label>

										<div class="col-sm-9">
											<input type="number" name="totalPrice" placeholder="TotalPrice" class="form-control" value="<?= isset($details)?$purifier->purify($details->totalPrice):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tax </label>

										<div class="col-sm-9">
											<input type="number" name="tax" placeholder="Tax" class="form-control" value="<?= isset($details)?$purifier->purify($details->tax):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Country </label>
										<div class="col-sm-9">
											<select name="countryId" id="country" class="form-control" 
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
											jQuery("#country").val("<?= $details->countryId ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> State</label>

										<div class="col-sm-9">
											<select name="stateId" id="state" class="form-control" onchange='getCityList("state")'>
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
											jQuery("#state").val("<?= $details->stateId ?>");
										</script>
										<?php
											}
										?>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> City </label>
										<div class="col-sm-9">
										<select name="cityId" id="city" class="form-control">
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
											jQuery("#city").val("<?= $details->cityId ?>");
										</script>
										<?php
											}
										?>
									</div>
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Address</label>

										<div class="col-sm-9">
											<input type="text" name="address" placeholder="Address" class="form-control" value="<?= isset($details)?$purifier->purify($details->address):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Index </label>

										<div class="col-sm-9">
											<input type="number" name="indexValue" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->indexValue):'' ?>" />
										</div>
									</div>
									
									<!-- /section:elements.form -->
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status </label>
										<div class="col-sm-9">
											<select name="status" id="status" class="form-control">
											<option>Select</option>
											<?php
												for($count=0;$count<count($orderStatusList);$count++)
												{
													$orderStatusItem = $orderStatusList[$count];
											?>
											<option value="<?= $orderStatusItem['id'] ?>"><?= $orderStatusItem['statusName']  ?></option>
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
											jQuery("#status").val("<?= $details->status ?>");
										</script>
										<?php
											}
										?>
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