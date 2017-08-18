<?php 
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['orderBy'] = 'indexValue';
	$list = $Supplier->get_supplier_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$bankList = $System->get_bank_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$paymentTermList = $System->get_payment_terms_list($param)['data'];
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
					 
						<li class="active">Supplier Management</li>
					</ul><!-- /.breadcrumb -->

					
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?>
				<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Supplier > View</h3>
                    </div>
                   <!-- <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=suppliers&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>-->
                    
                </div>
				
                                        
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<div class="col-xs-12" style="overflow:auto">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Supplier Nuber</th>
													<th>Supplier Name</th>
													<th>Address1</th>
													<th>Address2</th>
													<th>PO Box NO.</th>
													<th>EMI Rate</th>
													<th>Contact Number</th>
													<th>MailId</th>
													<th>Payment Term</th>
													<th>Trade License</th>
													<th>Bank Name</th>
													<th>Account Number</th>
													<th>Index</th>
													<th>Status</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['bankName'];
													$bankDetails = $System->get_bank_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($item['supplierNumber']) ?></td>
													<td><?= $purifier->purify($item['supplierName']) ?></td>
													<td><?= $purifier->purify($item['address1']) ?></td>
													<td><?= $purifier->purify($item['address2']) ?></td>
													<td><?= $purifier->purify($item['POBoxNumber']) ?></td>
													<td><?= $purifier->purify($item['emirate']) ?></td>
													<td><?= $purifier->purify($item['contactNumber']) ?></td>
													<td><?= $purifier->purify($item['mailId']) ?></td>
													<td><?= $purifier->purify($item['paymentTerms']) ?></td>
													<td><?= $purifier->purify($item['tradeLicense']) ?></td>
													<td><?= $purifier->purify($bankDetails->bankName) ?></td>
													<td><?= $purifier->purify($item['accountNumber']) ?></td>
													<td><?= $purifier->purify($item['indexValue']) ?></td>
													<td><?= $purifier->purify($item['status']==1?'Active':'Inactive') ?></td>
												<!--	<td>
														<a id="edit" class="green" href="?url=suppliers&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |
														<a href="./form_handler.php?action=manageSuppliers&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
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
                  <!--END BLOCK SECTION -->
            
                 
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
               
                
            </div>
                    
                    
    <?php }
    
	else
	{  
	$tab=$_GET['tab'];
exit;	
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Supplier->get_suppliers_details($param)['data'];
	} 
	?>        

		<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Supplier > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=suppliers&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageSuppliers' method="post">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<?php
									}
									?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Number </label>

										<div class="col-sm-9">
											<input type="text" required name="supplierNumber" placeholder="Supplier Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->supplierNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name</label>

										<div class="col-sm-9">
											<input type="text" required name="supplierName" placeholder="Supplier Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->supplierName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Address1</label>

										<div class="col-sm-9">
											<input type="text" required name="address1" placeholder="address1" class="form-control" value="<?= isset($details)?$purifier->purify($details->address1):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address2 </label>

										<div class="col-sm-9">
											<input type="text" required name="address2" placeholder="Address2" class="form-control" value="<?= isset($details)?$purifier->purify($details->address2):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PO Box Number </label>

										<div class="col-sm-9">
											<input type="text" required name="POBoxNumber" placeholder="PO Box Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->POBoxNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Emirate </label>

										<div class="col-sm-9">
											<input type="text" required name="emirate" placeholder="Emirate" class="form-control" value="<?= isset($details)?$purifier->purify($details->emirate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

										<div class="col-sm-9">
											<input type="text" required name="contactNumber" placeholder="Contact Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MailId</label>

										<div class="col-sm-9">
											<input type="text" required name="mailId" placeholder="MailId" class="form-control" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Payment Terms </label>

										<div class="col-sm-9">
											<select name="paymentTerms" id="paymentTerm" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($paymentTermList);$count++)
														{
															$paymentTermListitem = $paymentTermList[$count];
													?>
												<option value="<?= $paymentTermListitem['id'] ?>"><?= $paymentTermListitem['paymentTermCode']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#bank").val("<?= $details->paymentTerms ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trade License </label>

										<div class="col-sm-9">
											<input type="text" required name="tradeLicense" placeholder="Trade License" class="form-control" value="<?= isset($details)?$purifier->purify($details->tradeLicense):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Name </label>

										<div class="col-sm-9">
											<select name="bankName" id="bank" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($bankList);$count++)
														{
															$bankListitem = $bankList[$count];
													?>
												<option value="<?= $bankListitem['id'] ?>"><?= $bankListitem['bankName']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#bank").val("<?= $details->bankName ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account Number </label>

										<div class="col-sm-9">
											<input type="text" required name="accountNumber" placeholder="Account Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->accountNumber):'' ?>" />
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
  