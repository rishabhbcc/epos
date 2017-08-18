<?php 
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['orderBy'] = 'indexValue';
	$list = $Finance->get_supplier_invoice_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$paymentTermList = $System->get_payment_terms_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$purchaseOrderList = $Requisition->get_purchase_order_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$supplierList = $Supplier->get_supplier_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$currencyList = $System->get_currency_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$invoiceList = $Finance->get_invoice_type_list($param)['data'];
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
					 
						<li class="active">Supplier Invoice Management</li>
					</ul><!-- /.breadcrumb -->

					
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?>
				<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Supplier Invoice > View</h3>
                    </div>
                  <!--  <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=supplier_invoice&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
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
													<th>Invoice Id</th>
													<th>Purchase Order Id</th>
													<th>Supplier</th>
													<th>Supplier Number</th>
													<th>Invoice Date</th>
													<th>Invoice Number</th>
													<th>Invoice Currency</th>
													<th>Invoice Amount</th>
													<th>Tax</th>
													<th>Payment Date</th>
													<th>Payment Currency</th>
													<th>Payment Terms</th>
													<th>GL Date</th>
													<th>Status</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['invoiceTypeId'];
													$invoiceTypeDetails = $Finance->get_invoice_type_details($param)['data'];$param = array();
													$param['conditionParam']['param']['id'] = $item['supplierId'];
													$supplierDetails = $Supplier->get_suppliers_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($invoiceTypeDetails->invoiceType) ?></td>
													<td><?= $purifier->purify($item['purchaseOrderId']) ?></td>
													<td><?= $purifier->purify($supplierDetails->supplierName) ?></td>
													<td><?= $purifier->purify($supplierDetails->contactNumber) ?></td>
													<td><?= $purifier->purify($item['invoiceDate']) ?></td>
													<td><?= $purifier->purify($item['invoiceNumber']) ?></td>
													<td><?= $purifier->purify($item['invoiceCurrency']) ?></td>
													<td><?= $purifier->purify($item['invoiceAmount']) ?></td>
													<td><?= $purifier->purify($item['tax']) ?></td>
													<td><?= $purifier->purify($item['paymentDate']) ?></td>
													<td><?= $purifier->purify($item['paymentCurrency']) ?></td>
													<td><?= $purifier->purify($item['paymentTerms']) ?></td>
													<td><?= $purifier->purify($item['glDate']) ?></td>
													<td><?= $purifier->purify($item['status']==1?'Active':'Inactive') ?></td>
													<!--<td>
														<a id="edit" class="green" href="?url=supplier_invoice&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |
														<a href="./form_handler.php?action=manageSupplierInvoice&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a> | 
														<a id="edit" class="green" href="?url=supplier_payment&tab=View&invoiceId=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Supplier Payment</a> 
														|	
														<a href=".?url=purchase_order_slip&tab=View&invoiceId=<?= $item['id'] ?>">Purchase Order Slip</a>	
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
	{  	exit;
	$tab=$_GET['tab'];  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Finance->get_supplier_invoice_details($param)['data'];
	} exit;
	?>        

		<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Supplier Invoice> <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=supplier_invoice&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageSupplierInvoice' method="post">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Invoice  Type </label>
										<div class="col-sm-9">
											<select name="invoiceTypeId" id="invoice" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($invoiceList);$count++)
														{
															$invoiceItem = $invoiceList[$count];
													?>
												<option value="<?= $invoiceItem['id'] ?>"><?= $invoiceItem['invoiceType']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#invoice").val("<?= $details->invoiceTypeId ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Purchase Order  </label>
										<div class="col-sm-9">
											<select name="purchaseOrderId" id="purchaseOrder" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($purchaseOrderList);$count++)
														{
															$purchaseOrderitem = $purchaseOrderList[$count];
													?>
												<option value="<?= $purchaseOrderitem['id'] ?>"><?= $purchaseOrderitem['id']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#purchaseOrder").val("<?= $details->purchaseOrderId ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name </label>
										<div class="col-sm-9">
											<select name="supplierId" id="supplier" class="form-control" onchange='getSupplierNumber("supplier")'>
												<option>Select</option>
												<?php
													for($count=0;$count<count($supplierList);$count++)
													{
														$supplierList = $supplierList[$count];
													?>
												<option value="<?= $supplierList['id'] ?>"><?= $supplierList['supplierName']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#supplier").val("<?= $details->supplierId ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Number </label>
										<div class="col-sm-9">
											<input type="text" id="number" required name="supplierNumber" placeholder="Supplier Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->supplierNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Invoice Date </label>

										<div class="col-sm-9">
											<input type="date" required name="invoiceDate" placeholder="Invoice Date" class="form-control" value="<?= isset($details)?$purifier->purify($details->invoiceDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ivoice Number </label>

										<div class="col-sm-9">
											<input type="text" required name="invoiceNumber" placeholder="invoice Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->invoiceNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Invoice Currency </label>
										<div class="col-sm-9">
											<select name="invoiceCurrency" id="currency" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($currencyList);$count++)
														{
															$currencyItem = $currencyList[$count];
													?>
												<option value="<?= $currencyItem['id'] ?>"><?= $currencyItem['currencyName']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#currency").val("<?= $details->invoiceCurrency ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Invoice Amount</label>

										<div class="col-sm-9">
											<input type="text" required name="invoiceAmount" placeholder="Invoice Amount" class="form-control" value="<?= isset($details)?$purifier->purify($details->invoiceAmount):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Tax </label>

										<div class="col-sm-9">
											<input type="text" required name="tax" placeholder="Tax" class="form-control" value="<?= isset($details)?$purifier->purify($details->tax):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Payment Date </label>

										<div class="col-sm-9">
											<input type="date" required name="paymentDate" placeholder="Payment Date" class="form-control" value="<?= isset($details)?$purifier->purify($details->paymentDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Payment Currency </label>

										<div class="col-sm-9">
											<select name="paymentCurrency" id="paymentCurrency" class="form-control" >
												<option>Select</option>
													<?php
														for($count=0;$count<count($currencyList);$count++)
														{
															$currencyItem = $currencyList[$count];
													?>
												<option value="<?= $currencyItem['id'] ?>"><?= $currencyItem['currencyName']  ?></option>
													<?php
														}
													?>
											</select>
												<?php
													if($_REQUEST['tab']=='Edit')
													{
												?>
												<script>
													jQuery("#paymentCurrency").val("<?= $details->paymentCurrency ?>");
												</script>
												<?php
													}
												?>
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
													jQuery("#paymentTerm").val("<?= $details->paymentTerms ?>");
												</script>
												<?php
													}
												?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GL Date  </label>

										<div class="col-sm-9">
											<input type="date" required name="glDate" placeholder="Trade License" class="form-control" value="<?= isset($details)?$purifier->purify($details->glDate):'' ?>" />
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
	//if($user != null)
		//include 'includes/content/blocks/right_bar.php';	
    ?>