<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$list = $Products->get_product_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$recipeList = $Products->get_recipes_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$UOMList = $Products->get_UOM_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$attributeList = $Attribute->get_attribute_set_list($param)['data'];
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
					 
						<li class="active">Product Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Product > View</h3>
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    	<!--	<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=products&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>-->
							<div class="table-header" align="center">
								<a  class="btn btn-purple btn-sm btnExport" style="float:left;color:white;">Export</a>
							</div>
                    	</h2>
                    </div>
                </div>
                	<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12">
										<table id="customTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td class="tableHeading">Sr.No.</td>
													<td class="tableHeading">Recipe</td>
													<td class="tableHeading">Product Name</td>
													<td class="tableHeading">Image</td>
													<td class="tableHeading">Total Price</td>
													<td class="tableHeading">UOM</td>
													<td class="tableHeading">UOM Value</td>
													<td class="tableHeading">Status</td>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['recipeId'];
													$recipeDetails = $Products->get_recipes_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['UOM'];
													$UOMDetails = $Products->get_UOM_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($recipeDetails->recipeName) ?></td>
													<td><?= $purifier->purify($item['productName']) ?></td>
													<td><img style="height:100px;width:100px" src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$item['image']) ?>" alt="product image" /></td>
													<td><?= $purifier->purify($item['totalPrice']) ?></td>
													<td><?= $purifier->purify($UOMDetails->UOM) ?></td>
													<td><?= $purifier->purify($item['UOMValue']) ?></td>
													<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
												<!--	<td>
														<a id="edit" class="green" href="?url=products&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> 
														|
														<a href="./form_handler.php?action=manageProducts&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a>|
														<a href=".?url=product_categories&tab=Add&productId=<?= $item['id'] ?>">Manage Category</a>
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
	$tab = $purifier->purify($_GET['tab']);  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Products->get_product_details($param)['data'];
	} 
	?>             
		<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3> Products > <?php echo $tab; ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=products&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
	           		<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
									<input type="hidden" name="action" value="manageProducts" >
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Recipe</label>
										<div class="col-sm-9">
										<select name="recipeId" id="recipeName" class="form-control">
											<option value=""> Select</option>
											<?php
												for($count=0;$count<count($recipeList);$count++)
												{
													$recipeListitem = $recipeList[$count];
											?>
											<option value="<?= $recipeListitem['id'] ?>"><?= $recipeListitem['recipeName']  ?></option>
											<?php
												}
											?>
										</select>
										</div>
									</div>
									<script>
											jQuery("#recipeName").val("<?= $details->recipeId ?>");
										</script>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

										<div class="col-sm-9">
											<input type="text" required name="productName" placeholder="Product Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->productName):'' ?>" />
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
											<input type="file" id="form-field-1" name="image" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" />
											<input type="hidden" name="oldImage" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Base Price</label>

										<div class="col-sm-9">
											<input type="text"   name="basePrice" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->basePrice):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Discount</label>

										<div class="col-sm-9">
											<input type="number"   name="discount" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->discount):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Total Price</label>

										<div class="col-sm-9">
											<input type="number"   name="totalPrice" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->totalPrice):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> UOM</label>

										<div class="col-sm-9">
											<select name="UOM" id="UOMName" class="form-control">
											<option value=""> Select</option>
											<?php
												for($count=0;$count<count($UOMList);$count++)
												{
													$UOMListitem = $UOMList[$count];
											?>
											<option value="<?= $UOMListitem['id'] ?>"><?= $UOMListitem['UOM']  ?></option>
											<?php
												}
											?>
										</select>
										</div>
										<script>
											jQuery("#UOMName").val("<?= $details->UOM ?>");
										</script>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> UOM Value</label>

										<div class="col-sm-9">
											<input type="number" name="UOMValue" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->UOMValue):'' ?>" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Index </label>

										<div class="col-sm-9">
											<input type="number" name="indexValue" placeholder="Integer" class="form-control" value="<?= isset($details)?$purifier->purify($details->indexValue):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Attribute Set</label>
										<div class="col-sm-9">
											<select name="attributeSetId" class="form-control" onchange='getAttributeFields("attribute","blkAttributeFields")' id="attribute">
											<option>Select</option>
											<?php
												for($count=0;$count<count($attributeList);$count++)
												{
													$attributeListItem = $attributeList[$count];
											?>
											<option value="<?= $attributeListItem['id'] ?>"><?= $attributeListItem['attributeSetName']  ?></option>
											<?php
												}
											?>
										</select>
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