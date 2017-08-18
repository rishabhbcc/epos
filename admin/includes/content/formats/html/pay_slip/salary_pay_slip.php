<?php
	$param = array();
	$param['conditionParam']['param']['id'] = $_REQUEST['employeeId'];
	$details = $HR_Employee->get_employee_details($param)['data'];
	$param = array();
	$param['conditionParam']['param']['id'] = $details->designationId;
	$designationDetails = $HR_Employee->get_designation_details($param)['data'];
	$param = array();
	$param['conditionParam']['param']['id'] = $details->departmentId;
	$departmentDetails = $HR_Department->get_department_details($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$param['conditionParam']['param']['status'] = 1;
	$list = $HR_Employee->get_employee_salary_list($param)['data'];

?>
    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
        <!--PAGE CONTENT -->
		<div class="col-sm-10">
			<div style="padding:0px 0px;">
				<div id="content" style="width:100%">
					<div class="inner" style="min-height: 700px;padding: 0px 60px;">
						<div class="row">
							<div class="col-lg-1" style="margin-right: 60px;margin-top: 25px;">
								<img style="height:128px" src="<?= $_PATH['websiteRoot'] ?>/<?= $_SESSION[$_SESSION_ID]['configuration']->logo ?>"/>
							</div>
							<div class="col-lg-8">
								<a href="#"> <h1>Kadi Boutique</h1></a>
								<p><?= $_SESSION[$_SESSION_ID]['configuration']->address ?><br />
								Contact: <?= $_SESSION[$_SESSION_ID]['configuration']->contactNumber ?>  <br />
								Email: <?= $_SESSION[$_SESSION_ID]['configuration']->supportMailId ?><br />
								Web: <?= $_SESSION[$_SESSION_ID]['configuration']->websiteLink ?></p>
							</div>
					
						</div>
               
                 <!--BLOCK SECTION -->
                   <!--BLOCK SECTION -->
				    <div class="row">
						<div class="col-lg-12">
							<h1 style="FONT-SIZE:20PX; text-decoration:underline; text-align:center">Pay Slip for the month of August 1-31, 2015</h1>
						</div>
					</div>
					<br />	<br />
                 <div class="row">
                    <div class="col-lg-4 dshead">
                        <h4>Date : <span><?= date("Y-m-d")?></span></h4>
						<h4>Employee ID : <span><?= $details->employeeId ?></span></h4>
						<h4>Department : <span><?= $departmentDetails->departmentName ?></span></h4>
						<h4>Joining Date: <span><?= $details->joiningDate ?></span></h4>
						<h4>Days Worked: <span>26 days</span></h4>
                    </div>
					<div class="col-lg-4 dshead"></div>
					<div class="col-lg-4 dshead">
                        <h4>Employee Name: <span><?= $details->firstName ?>&nbsp;<?= $details->lastName ?></span></h4>
						<h4>Designation: <span><?= $designationDetails->designationName ?></span></h4>
                    </div>
                </div>
				<?php
					$totalSalary=0;
					$totalEarningSalary = 0;
					$totalDeductionSalary = 0;
					for($count=0;$count<count($list);$count++)
					{    
						$item = $list[$count];
						$param = array();
						$param['conditionParam']['param']['id'] = $item['fieldId'];
						$salaryFieldDetails = $HR_Employee->get_salary_field_details($param)['data'];
						//print_r($salaryFieldDetails);
						if($salaryFieldDetails->isEarning == 1)
						{
							if($item['fieldValue'] != null)
							{
								$totalEarningSalary = $totalEarningSalary + $item['fieldValue'];
							}
							else
							{
								$totalEarningSalary = $totalEarningSalary + 0;
							}
						}
						else if($salaryFieldDetails->isDeduction == 1)
						{
							if($item['fieldValue'] != null)
							{
								$totalDeductionSalary = $totalDeductionSalary + $item['fieldValue'];
							}
							else
							{
								$totalDeductionSalary = $totalDeductionSalary + 0;
							}
						}
				?>
				<div class="row">
					<div class="col-lg-4 dshead">
					<?php
						if($salaryFieldDetails->isEarning == 1)
						{
					?>
						<p><?= $salaryFieldDetails->fieldName ?> :  <span><?= $item['fieldValue'] ?></span></p>
					<?php
						}
					?>
					</div>
					<div class="col-lg-4 dshead"></div>
					<div class="col-lg-4 dshead">
						<?php
						if($salaryFieldDetails->isDeduction == 1)
						{
					?>
						<p><?= $salaryFieldDetails->fieldName ?> :  <span><?= $item['fieldValue'] ?></span></p>
					<?php
						}
					?>
					</div>
				</div>
				<?php
					}
				?>
				<div class="row">
					<div class="col-lg-4 dshead">
						<h4>Total Earnings: <span style="font-size: 18px !important;"><?php echo $totalEarningSalary; ?></span></h4>
					</div>
					<div class="col-lg-4 dshead"></div>
					<div class="col-lg-4 dshead">
						<h4>Total Deductions:<span style="font-size: 18px !important;"><?php echo $totalDeductionSalary; ?></span></h4>
					</div>
				</div>
                  <!--END BLOCK SECTION -->
				<div class="row">
                    <div class="col-lg-12">  
                    </div>
                </div>
				<br />	<br />
				<div class="row" >
                    <div class="col-lg-12 dshead" style="border-top:1px solid; border-bottom:1px solid; ">
						<h4>Being: <span style="float:none;">Salary for the month of <?= date("Y-m-d")?></span></h4>
                    </div>
					<div class="col-lg-3">
                    </div>
                </div>
            </div>
                  <!--END BLOCK SECTION -->
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
            </div>
</div>
        </div>
		
        <!--END PAGE CONTENT -->
    <!--END MAIN WRAPPER -->

</body>

    <!-- END BODY -->
	<style>
		ul li{
		list-style-type:none;
		}
		div ul li a{
		text-decoration:none;
		}
		.panel
		{
			box-shadow:0px 0px 0px red !important;
		}
	</style>
	
</html>
