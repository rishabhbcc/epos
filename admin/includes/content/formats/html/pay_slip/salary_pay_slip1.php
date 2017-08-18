<?php
	if (isset($_SERVER['REQUEST_URI'])) {
		$url = $_SERVER['REQUEST_URI'];
		if (substr($url, 0, 7)!=='http://') {
			$url = 'http://'.$_SERVER['HTTP_HOST'];
			if (ISSET($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT']!=80) {
				$url.= ':'.$_SERVER['SERVER_PORT'];
			}
			$url.= $_SERVER['REQUEST_URI'];
		}
	} else {
		$url = 'http://localhost/html2pdf/examples/forms.php';
	}
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
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/pay_slip_style.css">
  <!--<script src="./templates/assets/js/jquery.min.js"></script>
  <script src="./templates/assets/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
-->
<style type="text/css">

</style>
<page footer="form">
<div id="mainid">
<div class="container" id="middleContainer">
    <form action="<?php echo $url; ?>">
        <div class="row" style="height:140px; margin-top:100px;">
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3"><img style="height:100px; width:100px;" src="<?= $_PATH['websiteRoot'] ?>/<?= $_SESSION[$_SESSION_ID]['configuration']->logo ?>" /></div>
		  <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9">
                      <div class="row">
                          <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9" id="title_name">Kadi Flowers Trading</div>
                          <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9" id="title_name">Co LLC</div>
                          <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9" id="title_name">Dubai UAE</div>
                          <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9" id="title_name">Conatce No :+971 2552797</div>
                          <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9" id="title_name">Email :Sales@kadi.ae</div>
                      </div>
                  </div>
                 
        </div>
	<div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" id="title_address1" style="text-align:center; border-top: 2px solid #000;">Pay Sleep For Month Of Augusts 31 2015</div>
        </div>
    <div class="row">  
        <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6"  >
	    <div style="border-top:1px solid #ccc;float:left; margin-top:20px"> 
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address" >Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Aug 26 2015</div>
				 <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Employee Name :</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $details->firstName ?>   <?= $details->lastName ?></div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Designation &nbsp;:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $designationDetails->designationName ?> </div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Employee ID :</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $details->employeeId ?></div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Department &nbsp;:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $departmentDetails->departmentName ?></div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Date Of Joining :</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $details->joiningDate ?></div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Days Worked:&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">26 days</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Over Time Allowance:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">444</div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6">
	   <div style="border-top: 1px solid #ccc;float:right; margin-top:20px"> 
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
               <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $salaryFieldDetails->fieldName ?>:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?= $item['fieldValue'] ?></div>
                <!--<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">House Rent Allowance :</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">3000 Rs</div>-->
				<?php
					}
				?>
				<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Deduction &nbsp;:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?php echo $totalDeductionSalary; ?></div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address">Total Earning &nbsp;:</div>
                <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address"><?php echo $totalEarningSalary; ?> Rs</div>
	    </div>
        </div>	
        </div>
      <div class="row" >
             <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" id="title_address" style="text-align: center; border-top: 2px solid #000; ">Basic Salary of Month December 2014</div>
      </div> 
	  <div class="row" style="height:100px;"></div>
      <div class="row" style="margin-top:10px;">
            <table class="table table-striped table borderless">
                    <tbody>
                          <tr>
                              <td><div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address" style="text-align: center; border-top: 2px solid #000; width: 400px;">Printed Name Prepared By</div></td>
                              <td><div class="col-sm-6 col-md-6 col-xs-6 col-lg-6" id="title_address" style="text-align: center;border-top: 2px solid #000; width: 400px;">Printed Name Employee Signature</div></td>
                           </tr>
                    </tbody>
            </table>        
       </div>
	   <div class="row" style="height:300px;"></div>
       <div class="row" style="margin-top:10px;">
         <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" id="title_address" style="text-align: center; border-top: 2px solid #000; ">Kadi Boutique/ Dubai UAE / Email :sales@kadi.ae /Contact : +971 502552797 /Web :www.kadi.ae</div>
      </div>  
    <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" style="text-align:center "><a href="../forms.php" target="_blank"><h4>On Click To Convert Pdf</h4></a>
            </div>
    </div>
    </form>

  </div>
 </div>
</page>