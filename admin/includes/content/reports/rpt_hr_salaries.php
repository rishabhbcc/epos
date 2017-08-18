<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$employeeList = $HR_Employee->get_employee_list($param)['data'];
	$selectedDate = date('Y-m-d');
	
	
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
<?php
	if(isset($_REQUEST['action']) && ($_REQUEST['action']=='filterRecords'))
	{
		$selectedDate = $_REQUEST['date'];
		//print_r($selectedDate);
		$param = array();
		//$param['conditionParam']['param']['1'] = 1;
		$param['conditionParam']['param']['salaryDate'] = $selectedDate;
		$salaryList = $HR_Employee->get_employee_monthly_salary_list($param)['data'];
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
					 
						<li class="active">Salary Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>Salary Management > View</h3>
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    		<!--  <button type="button" class="btn btn-info" onclick="window.location='./?url=raw_materials&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>-->
                    	</h2>
                    </div>
                </div>
				<div>
					<form method="post" class="form-horizontal" role="form"> 
					<input type="hidden" name="action" value="filterRecords" >
						<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
						<input type="date" name="date" class="datepicker"> 
						<input type="submit" name="submit">
					</form>
				</div>
				<br />
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Employee</th>
													<th>Actual Salary</th>
													<th>Disbursed Salary</th>
													<th>Salary Date</th>
													<th>Comments</th>
													<!--<th class="hidden-480">Option</th>-->													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($employeeList);$count++)
												{
													$item = $employeeList[$count];
													$param = array();
													$param['conditionParam']['param']['employeeId'] = $item['id'];
													$param['conditionParam']['param']['status'] = 1;
													$salaryList = $HR_Employee->get_employee_salary_list($param)['data'];
												//	print_r($salaryList);
													$earningSalary = 0;
													$deductionSalary = 0;
													for($innerCount=0;$innerCount<count($salaryList);$innerCount++)
													{
														$salaryItem = $salaryList[$innerCount];
														//print_r($salaryItem);
														$param = array();
														$param['conditionParam']['param']['id'] = $salaryItem['fieldId'];
														$details = $HR_Employee->get_salary_field_details($param)['data'];
														if($details->isEarning == 1)
														{
															if($salaryItem['fieldId'] != null)
																{
																	$earningSalary = $earningSalary + $salaryItem['fieldValue'];
																}
																else
																{
																	$earningSalary = $earningSalary + 0;
																}
														}
														elseif($details->isDeduction == 1)
														{
															if($salaryItem['fieldId'] != null)
																{
																	$deductionSalary = $deductionSalary + $salaryItem['fieldValue'];
																}
																else
																{
																	$deductionSalary = $deductionSalary + 0;
																}	
														}
														//print_r($currentSalaryDetails);
													}
													$param = array();
													$param['conditionParam']['param']['employeeId'] = $item['id'];
													$param['conditionParam']['param']['salaryDate'] = $selectedDate;
													$currentSalaryDetails = $HR_Employee->get_employee_monthly_salary_details($param)['data'];
													
													$param = array();
													$param['conditionParam']['param']['id'] = $item['id'];
													$userDetails = $User->get_user_details($param)['data'];
													$totalSalary = $earningSalary - $deductionSalary;
												?>
												<?php
												if($currentSalaryDetails != null)
												{
												?>
													<tr >
														<td><?= $count+1 ?></td>
														<td><?= $purifier->purify($userDetails->firstName) ?></td>
														<td><?= $purifier->purify($totalSalary) ?></td>
														<td><?= $purifier->purify($currentSalaryDetails->disbursedSalary) ?></td>
														<td><?= $purifier->purify($currentSalaryDetails->salaryDate) ?></td>
														<td><?= $purifier->purify($currentSalaryDetails->comments) ?></td>
														<!--<td>
															<!--<a id="edit" class="green" href="?url=hr_salaries&employeeId=<?= $item['id'] ?>&tab=Edit&id=<?= $currentSalaryDetails->id ?>" title="Edit">
															<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a>
															<a id="add" class="green" href="?url=hr_salaries&tab=Add&employeeId=<?= $item['id'] ?>" title="Add">Add</a>
															
														</td>-->
													</tr>
												<?php
												}
												elseif($currentSalaryDetails == null){
												?>
												<tr >
														<td><?= $count+1 ?></td>
			 											<td><?= $purifier->purify($item['id']) ?></td>
														<td><?= $purifier->purify($totalSalary) ?></td>
														<td><?= $purifier->purify(0) ?></td>
														<td><?= $purifier->purify(0) ?></td>
														<td><?= $purifier->purify(0) ?></td>
														<!--<td>
															<!--<a id="edit" class="green" href="?url=hr_salaries&tab=Edit&id=<?= $item['id'] ?>&employeeId=<?= $item['id'] ?>" title="Edit">
															<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |
															<a id="add" class="green" href="?url=hr_salaries&tab=Add&employeeId=<?= $item['id'] ?>" title="Add">Add</a>
															
														</td>-->
													</tr>
												<?php
												}
												}
												
											?>
                                             
											</tbody>
										</table>
								</div>
                    </div>
                </div>
            </div>		
			<div>
			<?php
			echo 'Deduction : '.$deductionSalary;
			echo 'Earning : '.$earningSalary;
			?>
			</div>
    <?php }
    
	else
	{  
	$tab=$_GET['tab'];  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$param['conditionParam']['param']['employeeId'] = $_REQUEST['employeeId'];
		$details = $HR_Employee->get_employee_monthly_salary_details($param)['data'];
	} 
	$param = array();
	$param['conditionParam']['param']['employeeId'] = $_REQUEST['employeeId'];
	$param['conditionParam']['param']['status'] = 1;
	$salaryList = $HR_Employee->get_employee_salary_list($param)['data'];
	$earningSalary = 0;
	$deductionSalary = 0;
	for($innerCount=0;$innerCount<count($salaryList);$innerCount++)
	{
		$salaryItem = $salaryList[$innerCount];
		//print_r($salaryItem);
		$param = array();
		$param['conditionParam']['param']['id'] = $salaryItem['fieldId'];
		$salaryFieldDetails = $HR_Employee->get_salary_field_details($param)['data'];
		if($salaryFieldDetails->isEarning == 1)
		{
			if($salaryItem['fieldId'] != null)
				{
					$earningSalary = $earningSalary + $salaryItem['fieldValue'];
				}
				else
				{
					$earningSalary = $earningSalary + 0;
				}
		}
		elseif($salaryFieldDetails->isDeduction == 1)
		{
			if($salaryItem['fieldId'] != null)
				{
					$deductionSalary = $deductionSalary + $salaryItem['fieldValue'];
				}
				else
				{
					$deductionSalary = $deductionSalary + 0;
				}	
		}
	}
	$totalSalary = $earningSalary - $deductionSalary;
	?>             
			<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>Salary Management > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=hr_salaries&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageEmployeeMonthlySalary' method="post">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<input type="hidden" name="employeeId" value="<?= $_REQUEST['employeeId'] ?>" >
									<input type="hidden" name="actualSalary" value="<?php echo $totalSalary; ?>" >
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Actual Salary</label>

										<div class="col-sm-9">
											<input type="text" disabled name="actualSalary" placeholder="Actual Salary" class="form-control" value="<?php echo $totalSalary; ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Disbursed Salary</label>

										<div class="col-sm-9">
											<input type="text" required name="disbursedSalary" placeholder="Disbursed Salary" class="form-control" value="<?= isset($details)?$purifier->purify($details->disbursedSalary):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Salary Date</label>

										<div class="col-sm-9">
											<input type="date" required name="salaryDate" placeholder="Salary Date" class="form-control" value="<?= isset($details)?$purifier->purify($details->salaryDate):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Comments</label>

										<div class="col-sm-9">
											<textarea class="ckeditor" id="comment" name="comments" cols="40" class="form-control" rows="6" ><?= isset($details)?$purifier->purify($details->comments):'' ?></textarea>
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