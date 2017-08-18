<?php 
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$list = $HR_Job->get_job_application_list($param)['data'];
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$jobOpeningsList = $HR_Job->get_job_openings_list($param)['data'];
	$param = array();
	$param['orderBy'] = 'indexValue';
	$param['conditionParam']['param']['1'] = 1;
	$jobApplicationStatusList = $HR_Job->get_job_application_status_list($param)['data'];
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
						<li class="active">HR.Job Applications Management</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<?php 
					if($_GET['tab']=="View")
					{ 
				?> 
            	<div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>HR.Job Applications  > View</h3>
                    </div>
                  <!--  <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=hr_job_applications&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>-->
                </div>
						<div class="row">
							<div class="col-xs-12">
									<div class="col-xs-12" style="overflow:auto">
										<table id="tblDataTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>jobId</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Mail Id</th>
													<th>Contact Number</th>
													<th>Resume</th>
													<th>Remark</th>
													<th>Status</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
												for($count=0;$count<count($list);$count++)
												{
													$item = $list[$count];
													$param = array();
													$param['conditionParam']['param']['id'] = $item['status'];
													$statusDetails = $HR_Job->get_job_application_status_details($param)['data'];
												?>
												<tr >
													<td><?= $count+1 ?></td>
													<td><?= $purifier->purify($item['jobId']) ?></td>
													<td><?= $purifier->purify($item['firstName']) ?></td>
													<td><?= $purifier->purify($item['lastName']) ?></td>
													<td><?= $purifier->purify($item['mailId']) ?></td>
													<td><?= $purifier->purify($item['contactNumber']) ?></td>
													<td><?= $purifier->purify($item['resume']) ?></td>
													<td><?= $purifier->purify($item['remarks']) ?></td>
													<td><?= $purifier->purify($statusDetails->statusName) ?></td>
													<!--<td>
														<a id="edit" class="green" href="?url=hr_job_applications&tab=Edit&id=<?= $item['id'] ?>" title="Edit">
														<i class="ace-icon fa fa-pencil bigger-130"></i>Edit</a> |<a href="./form_handler.php?action=manageHRJobApplication&type=Delete&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>"  >
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
exit;	
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $HR_Job->get_job_application_details($param)['data'];
	} 
	?>             
		<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        <h3>HR.Job Applications > <?php echo $purifier->purify($tab); ?></h3>
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=hr_job_applications&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php?action=manageHRJobApplication' method="post" enctype="multipart/form-data">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Job Id </label>
										<div class="col-sm-9">
											<select name="jobId" id="job" class="form-control">
												<option>Select</option>
												<?php
													for($count=0;$count<count($jobOpeningsList);$count++)
													{
														$jobOpeningsListitem = $jobOpeningsList[$count];
												?>
												<option value="<?= $jobOpeningsListitem['id'] ?>"><?= $jobOpeningsListitem['jobId']  ?></option>
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
											jQuery("#job").val("<?= $details->jobId ?>");
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
											<input type="text" required name="lastName" placeholder="Last Name" class="form-control" value="<?= isset($details)?$purifier->purify($details->lastName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mail Id </label>

										<div class="col-sm-9">
											<input type="text" required name="mailId" placeholder="Mail Id" class="form-control" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact Number </label>

										<div class="col-sm-9">
											<input type="text" required name="contactNumber" placeholder="Contact Number" class="form-control" value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Resume </label>
										<?php
											if(isset($details) && ($details->resume != 'null'))
											{
										?>
										<div class="col-sm-9">
										<a target="_blank" href="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->resume) ?>">Download Resume</a>
										</div>
										<?php
											}
										?>
										<div class="col-sm-9">
											<input type="file" required name="resume" placeholder="Resume" class="form-control" value="<?= isset($details)?$purifier->purify($details->resume):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Remark </label>

										<div class="col-sm-9">
											<input type="text" required name="remarks" placeholder="Remark" class="form-control" value="<?= isset($details)?$purifier->purify($details->remarks):'' ?>" />
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
										<select name="status" id="status" class="form-control">
											<option>Select</option>
											<?php
												for($count=0;$count<count($jobApplicationStatusList);$count++)
												{
													$jobApplicationStatusItem = $jobApplicationStatusList[$count];
											?>
											<option value="<?= $jobApplicationStatusItem['id'] ?>"><?= $jobApplicationStatusItem['statusName']  ?></option>
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
//	if($user != null)
// 	/	include 'includes/content/blocks/right_bar.php';	
    ?>