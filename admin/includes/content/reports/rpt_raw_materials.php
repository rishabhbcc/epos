<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$list = $Products->get_raw_material_list($param)['data'];$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$currencyList = $System->get_currency_list($param)['data'];
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
			<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="<?= $_PATH['root'] ?>">Home</a>						</li>
					 
						<li class="active">Raw Material Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Raw Materials > View</h3>
                    </div>
                   <!-- <div class="col-sm-2">
                    	<h2>
                    		<button type="button" class="btn btn-info" onclick="window.location='./?url=raw_materials&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>-->
                </div>
               
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable">
                                    <thead>
										<tr>
											<th>Sr.No.</th>
											<th>Item Code</th>
											<th>Item Name</th>
											<th>Image</th>
											<th>Unit Price</th>
											<th>Currency</th>
											<th>Status</th>
											<!--<th class="hidden-480">Option</th>-->										
										</tr>
									</thead>
                                    <tbody>
                                    	<?php
											for($count=0;$count<count($list);$count++)
											{
												$item = $list[$count];
												$rowClass = 'odd gradeA';
												if(($count+1)%2==0)
													$rowClass = 'even gradeA';
												$param = array();
												$param['conditionParam']['param']['id'] = $item['currencyCodeId'];
												$currencyDetails = $System->get_currency_details($param)['data'];
											?>
											<tr class="<?= $rowClass ?>">
												<td><?= $count+1 ?></td>
												<td><?= $purifier->purify($item['itemCode']) ?></td>
												<td><?= $purifier->purify($item['itemName']) ?></td>
												<td><img style="height:100px;width:100px" src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$item['image']) ?>" alt=" image" /></td>
												<td><?= $purifier->purify($item['unitPrice']) ?></td>
												<td><?= $purifier->purify($currencyDetails->currencyCode) ?></td>
												<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
												<!--<td>
													<a id="edit" class="green" href="?url=raw_materials&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
													Edit
													</a> |
													<a href="./form_handler.php?action=manageRawMaterial&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
													Delete
													</a> 
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
            <?php
            }
            else
            {
            	$tab=$_GET['tab'];
            	if($tab=="Edit")
            	{
            		$param = array();
            		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
            		$details = $Products->get_raw_material_details($param)['data'];
            	}
            	?>
            	<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Raw Materials > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=raw_materials&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
					<div class="col-xs-9">
					
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" action='form_handler.php?action=manageRawMaterial' method="post" enctype="multipart/form-data">
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item Code </label>

								<div class="col-sm-9">
									<input type="text" required name="itemCode" placeholder="Item Code" class="form-control" value="<?= isset($details)?$purifier->purify($details->itemCode):'' ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Item Name </label>

								<div class="col-sm-9">
									<input type="text" required name="itemName" placeholder="Item Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->itemName):'' ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Admin Description </label>
								
								<div class="col-sm-9">
									<textarea class="ckeditor" id="adminDes" name="adminDescription" cols="40" class="form-control" rows="6" ><?= isset($details)?$purifier->purify($details->adminDescription):'' ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Description </label>

								<div class="col-sm-9">
									<textarea class="ckeditor" id="userDesc" name="userDescription" cols="40" class="form-control" rows="6"><?= isset($details)?$purifier->purify($details->userDescription):'' ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image</label>
								<div class="col-sm-9">
									<?php
									if(isset($details) && ($details->image!=null))
									{
									?>
									<img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->image) ?>" style="height:50px;width:50px;" />
									<?php	
									}
									?>
									<input required type="file" id="form-field-1" name="image" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" />
									<input type="hidden" name="oldImage" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" />
								</div>
							</div>
							<!--<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantity </label>

								<div class="col-sm-9">
									<input type="text" required name="quantity" placeholder="Quantity" class="form-control" value="<?= isset($details)?$purifier->purify($details->quantity):'' ?>" />
								</div>
							</div>-->
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price </label>

								<div class="col-sm-9">
									<input type="text" required name="unitPrice" placeholder="Price" class="form-control" value="<?= isset($details)?$purifier->purify($details->unitPrice):'' ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Currecny </label>

								<div class="col-sm-9">
									<select required name="currencyCodeId" id="currencyCode" class="form-control">
										<option>Select</option>
										<?php
											for($count=0;$count<count($currencyList);$count++)
											{
												$currencyCode = $currencyList[$count];
										?>
										<option value="<?= $currencyCode['id'] ?>"><?= $currencyCode['currencyCode']  ?></option>
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
										jQuery("#currencyCode").val("<?= $details->currencyCodeId ?>");
									</script>
									<?php
										}
									?>
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