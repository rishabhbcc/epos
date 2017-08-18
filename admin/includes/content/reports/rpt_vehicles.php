<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$list = $Order->get_vehicle_list($param)['data'];
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
					 
						<li class="active">Vehicle Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Vehicle > View</h3>
                    </div>
                   <!-- <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=vehicles&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>-->
                </div>
                
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
									<div class="col-xs-12">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Vehicle Number</th>
													<th>Status</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($item['vehicleNumber']) ?></td>
													<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
												<!--	<td>
														<a id="edit" class="green" href="?url=vehicles&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |<a href="./form_handler.php?action=manageVehicle&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a> 
														
													</td>-->
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
		$details = $Order->get_vehicle_details($param)['data'];
	} 
	?>            
		<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Order > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=vehicles&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageVehicle' method="post">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
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
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vehicle Number </label>

										<div class="col-sm-9">
											<input type="text" required name="vehicleNumber" placeholder="Vehicle Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->vehicleNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Index </label>

										<div class="col-sm-9">
											<input type="number"   name="indexValue" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->indexValue):'' ?>" />
										</div>
									</div>
									
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
		 