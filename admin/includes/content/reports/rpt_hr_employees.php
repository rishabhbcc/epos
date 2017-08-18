<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$list = $HR_Employee->get_employee_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$departmentList = $HR_Department->get_department_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$designationList = $HR_Employee->get_designation_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$maritalList = $HR_Employee->get_marital_status_list($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$paymentTypeList = $HR_Employee->get_payment_type_list($param)['data'];
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$countryList = $Location->get_country_list($param)['data'];
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$bankList = $System->get_bank_list($param)['data'];
//	print_r($countryList);
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
			<div id="content" style="width:calc(100% - 220px)">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="<?= $_PATH['root'] ?>">Home</a>						</li>
					 
						<li class="active">Hr.Employees Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Hr.Employees > View</h3>
                    </div>
                   <!-- <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=hr_employees&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    		<a  class="btn btn-purple btn-sm btnExport" style="float:left;color:white;">Export</a>
                    	</h2>
                    </div>-->
                </div>
    
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12" style="overflow:auto">
										<table id="customTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td class="tableHeading">Sr.No.</td>
													<td class="tableHeading">EmployeeId</td>
													<td class="tableHeading">First Name</td>
													<td class="tableHeading">Last Name</td>
													<td class="tableHeading">joining Date</td>
													<td class="tableHeading">Designation</td>
													<td class="tableHeading">Department</td>
													<td class="tableHeading">Address</td>
													<td class="tableHeading">Country</td>
													<td class="tableHeading">State</td>
													<td class="tableHeading">City</td>
													<td class="tableHeading">Contact Number</td>
													<td class="tableHeading">MailId</td>
													<td class="tableHeading">Current Salary</td>
													<td class="tableHeading">Bank</td>
													<td class="tableHeading">Account Number</td>
													<td class="tableHeading">Status</td>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['designationId'];
													$designationDetails = $HR_Employee->get_designation_details($param)['data'];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['departmentId'];
													$departmentDetails = $HR_Department->get_department_details($param)['data'];
													
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($item['employeeId']) ?></td>
													<td><?= $purifier->purify($item['firstName']) ?></td>
													<td><?= $purifier->purify($item['lastName']) ?></td>
													<td><?= $purifier->purify($item['joiningDate']) ?></td>
													<td><?= $purifier->purify($designationDetails->designationName) ?></td>
													<td><?= $purifier->purify($departmentDetails->departmentName) ?></td>
													<td><?= $purifier->purify($item['address']) ?></td>
													<td><?= $purifier->purify($item['countryId']) ?></td>
													<td><?= $purifier->purify($item['stateId']) ?></td>
													<td><?= $purifier->purify($item['cityId']) ?></td>
													<td><?= $purifier->purify($item['contactNumber']) ?></td>
													<td><?= $purifier->purify($item['mailId']) ?></td>
													<td><?= $purifier->purify($item['currentSalary']) ?></td>
													<td><?= $purifier->purify($item['bankName']) ?></td>
													<td><?= $purifier->purify($item['bankAccountNumber']) ?></td>
													<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
													<!--<td>
														<a id="edit" class="green" href="?url=hr_employees&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> 
														|
														<a href="./form_handler.php?action=manageHREmployee&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
														<i class="ace-icon fa fa-trash-o bigger-130"></i>Delete</a>|
														<a class="green" href="?url=hr_employee_salary&tab=View&employeeId=<?= $item['id'] ?>">Manage Salary</a>|
														<a class="green" href="?url=salary_pay_slip&tab=View&employeeId=<?= $item['id'] ?>">View Pay Slip</a>
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
exit;	
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $HR_Employee->get_employee_details($param)['data'];
		//print_r($details->id);
	} 
	?>        
			<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3> HR.Employees > <?php echo $tab; ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=hr_employees&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
									<input type="hidden" name="action" value="manageHREmployee" >
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Id</label>

										<div class="col-sm-9">
											<input type="text" required name="employeeId" placeholder="Employee Id" class="form-control" value="<?= isset($details)?$purifier->purify($details->employeeId):"EMP".rand(10,1000) ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>

										<div class="col-sm-9">
											<input type="text" required name="firstName" placeholder="First Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->firstName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

										<div class="col-sm-9">
											<input type="text" required name="lastName" placeholder="Last Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->lastName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Joining Date </label>

										<div class="col-sm-9">
											<input type="date" required name="joiningDate" placeholder="Joining Date" class="form-control" value="<?= isset($details)?$purifier->purify($details->joiningDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Leaving Date </label>

										<div class="col-sm-9">
											<input type="date" name="leavingDate" placeholder="Leaving Date" class="form-control" value="<?= isset($details)?$purifier->purify($details->leavingDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Designation</label>
										<div class="col-sm-9">
											<select name="designationId" id="designation" class="form-control" required>
												<option> Select</option>
												<?php
													for($count=0;$count<count($designationList);$count++)
													{
														$designationListitem = $designationList[$count];
												?>
												<option value="<?= $designationListitem['id'] ?>"><?= $designationListitem['designationName']  ?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<script>
											jQuery("#designation").val("<?= $details->designationId ?>");
										</script>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Department</label>
										<div class="col-sm-9">
											<select name="departmentId" id="department" required class="form-control">
												<option> Select</option>
												<?php
													for($count=0;$count<count($departmentList);$count++)
													{
														$departmentListitem = $departmentList[$count];
												?>
												<option value="<?= $departmentListitem['id'] ?>"><?= $departmentListitem['departmentName']  ?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<script>
											jQuery("#department").val("<?= $details->departmentId ?>");
										</script>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
										<div class="col-sm-9">
											<input type="text" required name="address" placeholder="Address" class="form-control" value="<?= isset($details)?$purifier->purify($details->address):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Country </label>
										<div class="col-sm-9">
											<select name="countryId" id="country" required class="form-control">
												<option> Select</option>
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
									</div>
									<script>
											jQuery("#country").val("<?= $details->countryId ?>");
										</script>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

										<div class="col-sm-9">
											<input type="text" required name="contactNumber" placeholder="Contact Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Emergency Contact Number</label>

										<div class="col-sm-9">
											<input type="text"  required name="emergencyContactNumber" placeholder="emergencyContactNumber" class="form-control" value="<?= isset($details)?$purifier->purify($details->emergencyContactNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Father Name</label>

										<div class="col-sm-9">
											<input type="text" required name="fatherName" placeholder="Father Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->fatherName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Spouse Name</label>

										<div class="col-sm-9">
											<input type="text" required name="spouseName" placeholder="Spouse Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->spouseName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mother Name</label>

										<div class="col-sm-9">
											<input type="text" required name="motherName" placeholder="Mother Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->motherName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Insurance Number </label>

										<div class="col-sm-9">
											<input type="text" required name="insuranceNumber" placeholder="Insurance Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->insuranceNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> MaritalStatus</label>

										<div class="col-sm-9">
											<select name="maritalStatusId" id="maritalStatus" class="form-control" required>
											<option> Select</option>
											<?php
												for($count=0;$count<count($maritalList);$count++)
												{
													$maritalListitem = $maritalList[$count];
											?>
											<option value="<?= $maritalListitem['id'] ?>"><?= $maritalListitem['statusName']  ?></option>
											<?php
												}
											?>
										</select>
										</div>
										<script>
											jQuery("#maritalStatus").val("<?= $details->maritalStatusId ?>");
										</script>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Children</label>

										<div class="col-sm-9">
											<input type="number" required name="children" placeholder="Children" class="form-control" value="<?= isset($details)?$purifier->purify($details->children):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> EmirateId </label>

										<div class="col-sm-9">
											<input type="text" required name="emirateId" placeholder="EmirateId" class="form-control" value="<?= isset($details)?$purifier->purify($details->emirateId):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Emirate ExpiryDate </label>

										<div class="col-sm-9">
											<input type="date"  name="emirateExpiryDate" placeholder="EmirateExpiryDate" class="form-control" value="<?= isset($details)?$purifier->purify($details->emirateExpiryDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MailId</label>

										<div class="col-sm-9">
											<input type="text" required name="mailId" placeholder="MailId" class="form-control" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Current Salary</label>

										<div class="col-sm-9">
											<input type="number" required name="currentSalary" placeholder="Current Salary" class="form-control" value="<?= isset($details)?$purifier->purify($details->currentSalary):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Name </label>

											<div class="col-sm-9">
											<select name="bankName" id="bankName" class="form-control" required>
											<option> Select</option>
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
										</div>
										<script>
											jQuery("#bankName").val("<?= $details->bankName ?>");
										</script>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Account Number </label>

										<div class="col-sm-9">
											<input type="number" required name="bankAccountNumber" placeholder="Bank Account Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->bankAccountNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> IBAN </label>

										<div class="col-sm-9">
											<input type="text" required name="IBAN" placeholder="IBAN" class="form-control" value="<?= isset($details)?$purifier->purify($details->IBAN):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Payment Type</label>
										<div class="col-sm-9">
											<select name="paymentTypeId" id="paymentType" class="form-control" required>
												<option> Select</option>
												<?php
													for($count=0;$count<count($paymentTypeList);$count++)
													{
														$paymentTypeitem = $paymentTypeList[$count];
												?>
												<option value="<?= $paymentTypeitem['id'] ?>"><?= $paymentTypeitem['paymentType']  ?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<script>
											jQuery("#paymentType").val("<?= $details->paymentTypeId ?>");
										</script>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Details </label>

										<div class="col-sm-9">
											<input type="text" required name="bankDetails" placeholder="Bank Details" class="form-control" value="<?= isset($details)?$purifier->purify($details->bankDetails):'' ?>" />
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
	//if($user != null)
//		include 'includes/content/blocks/right_bar.php';	
    ?>