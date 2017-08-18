<?php 
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$list = $Order->get_order_assignment_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['status'] = 1;
	$orderStatusList = $Order->get_order_status_list($param)['data'];
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
					 
						<li class="active">Order Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Assignments > View</h3>
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    		<!--  <button type="button" class="btn btn-info" onclick="window.location='./?url=raw_materials&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>-->
                    	</h2>
                    </div>
                </div>
                                        
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12">
										<form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
											<input type="hidden" name="action" value="manageOrderRouting" >
											<input type="hidden" name="type" value="Add" >
											<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
											<?php
												if(isset($_SESSION[$_SESSION_ID]['admin']))
												{
											?>
											<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
											<?php
												}
											?>
											<table id="tblDataTable" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th></th>
														<th>Order </th>
														<th>Florist</th>			
														<th>Order Item</th>			
														<th>Total Price</th>			
														<th>Address</th>			
														<th>Status</th>			
														<th>Option</th>			
													</tr>
												</thead>
												<tbody>
												<?php
													for($count=0;$count<count($list);$count++)
													{
														$item = $list[$count];
														print_r($item);
														$param = array();
														$param['conditionParam']['param']['orderId'] = $item['id'];
														$details = $Order->get_order_routing_details($param)['data'];
														$param = array();
														$param['conditionParam']['param']['orderId'] = $item['orderId'];
														$orderItemlist = $Order->get_order_item_list($param)['data'];
														$param = array();
														$param['conditionParam']['param']['id'] = $item['orderId'];
														$orderDetails = $Order->get_orders_details($param)['data'];
														$param = array();
														$param['conditionParam']['param']['id'] = $item['userId'];
														$userDetails = $User->get_user_details($param)['data'];
														$param = array();
														$param['conditionParam']['param']['id'] = $orderDetails->status;
														$orderStatusDetails = $Order->get_order_status_details($param)['data'];
													?>
													<tr>
														<th>
															<input required <?= ($details != null?'checked':'')?> type="checkbox" name="orderIds[]" value="<?= $item['id'] ?>"></th>
														<td><?= $purifier->purify($orderDetails->orderId) ?></td>
														<td>
															<?= $purifier->purify($userDetails->firstName) ?>
														</td>
														<td>
														<?php
															for($innerCount1=0;$innerCount1<count($orderItemlist);$innerCount1++)
															{
																$orderItem = $orderItemlist[$innerCount1];
																$param = array();
																$param['conditionParam']['param']['id'] = $orderItem['productId'];
																$productDetails = $Products->get_product_details($param)['data'];
														?>
														<?= $productDetails->productName ?>(<?= $orderItem['quantity'] ?>)<br />
														
														<?php
															}
														?>
														<td><?= $orderDetails->totalPrice ?></td>
														</td>
														<td><?= $orderDetails->address ?></td>
														<td><?= $orderStatusDetails->statusName ?></td>
														<td>
														<?php
															if($item['status'] == 2)
															{
														?>
															<a id="edit" class="green" href="./form_handler.php?action=manageOrderStatusByFlorist&type=Edit&orderId=<?= $orderDetails->id ?>&floristId=<?= $_REQUEST['floristId'] ?>&editId=<?= $item['id'] ?>&status=3&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" title="Edit">
															<i class="ace-icon fa fa-pencil bigger-130"></i>Accept/<a id="edit" class="green" href="./form_handler.php?action=manageOrderStatusByFlorist&type=Delete&orderId=<?= $orderDetails->id ?>&floristId=<?= $_REQUEST['floristId'] ?>&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" title="Delete">
															<i class="ace-icon fa fa-pencil bigger-130">Reject</a> 
														<?php
															}
															elseif($item['status'] == 3)
															{
														?>
														<a id="edit" class="green" href="./form_handler.php?action=manageOrderStatusByFlorist&type=Edit&orderId=<?= $orderDetails->id ?>&floristId=<?= $_REQUEST['floristId'] ?>&editId=<?= $item['id'] ?>&status=5&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" title="Edit">
															<i class="ace-icon fa fa-pencil bigger-130"></i>Mark As Prepared</a>
														<?php
															}
														?>
															<!--|<a href="./form_handler.php?action=manageRawMaterial&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
															<i class="ace-icon fa fa-trash-o bigger-130"></i></a>-->
														</td>
													</tr>
													<?php
													}
												
												?>
												 
												</tbody>
											</table>
										</form>
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
		$details = $Order->get_order_preparation_details($param)['data'];
	} 
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['orderId'];
		$orderDetails = $Order->get_orders_details($param)['data'];
	?>            
			<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Assignments > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=user_order_routing&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
					
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
							<form class="form-horizontal" role="form" action="<?= $_ADMIN_PATH['formHandler'] ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									<input type="hidden" name="action" value="manageUpdateOrderStatus" >
									<input type="hidden" name="orderId" value="<?= $_REQUEST['orderId'] ?>" >
									<input type="hidden" name="userId" value="<?= $_REQUEST['floristId'] ?>" >
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<input type="hidden" name="modifiedBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									}
									?>
									<!-- /section:elements.form -->
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">OrderId</label>
										<div class="col-sm-9">
											<input type="text" disable class="form-control" value="<?= $orderDetails->orderId ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status </label>

										<div class="col-sm-9">
											<select name="status" id="status">
												<option value="">Select</option>
												<?php
												for($innerCount2=0;$innerCount2<count($orderStatusList);$innerCount2++)
												{
													$orderStatusItem = $orderStatusList[$innerCount2];
													if(($orderStatusItem['id'] == 3) || ($orderStatusItem['id'] == 4))
													{
												?>
												<option value="<?= $orderStatusItem['id'] ?>"><?= $orderStatusItem['statusName'] ?></option>
											<?php
												}
											}
											?>
											
										<select>
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
		 