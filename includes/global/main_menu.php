<?php 
	// get fresh notification count
	if($_SESSION['perserbid']['user']->userType == 1) // if user type = company
	{
		$param = array();
		$param['conditionParam']['param']['userId'] = $_SESSION['perserbid']['user']->id;
		$param['orderByFlow'] = false;
		$jobList = $Job->get_job_list($param)['data'];
	}
	else if($_SESSION['perserbid']['user']->userType == 2) // if user type = provider
	{
		$param = array();
		$param['fields'] = ' distinct(jobId) as id ';
		$param['conditionParam']['param']['userId'] = $_SESSION['perserbid']['user']->id;
		$jobList = $Job->get_bid_list($param)['data'];
	}
	$newNotifications = 0;
	for($count=0;$count<count($jobList);$count++)
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $jobList[$count]['id'];
		$job = $Job->get_job_details($param)['data'];
		if($job->visibleTill < date('Y-m-d') && ($_SESSION['perserbid']['user']->userType == 2)) continue; // do not count job which has expired for providers
		$param = array();
		$param['fields'] = ' count(id) as newNotifications ';
		$param['conditionParam']['param']['jobId'] = $jobList[$count]['id'];
		$param['conditionParam']['param']['userType'] = $_SESSION['perserbid']['user']->userType;
		$param['conditionParam']['param']['isRead'] = 0;
		$newNotificationCount = $System->get_notification_list($param)['data'];
		$newNotifications+= $newNotificationCount[0]['newNotifications'];
		//print_r($newNotificationCount);
	}
	
?>
<script>
	$(document).ready(function(){
 			$('.mobile-menu-link ').click(function(){
  			$('.mobile-menu').slideToggle(1000);
		});
	});
</script>
<div class="clear"></div>
<div id="header-gray" class="height-gray" >
  	<div class="header-gray">
    	<?php 
		if(isset($_SESSION['perserbid']))
		{
			if($_SESSION['perserbid']['user']->userType == 1) // user type = company
			{
			?>
			<!-- header-gray2 -->
			<div class="header-gray2">
			  	<div class="mobile-menu-link">menu</div>  
					<ul class="mobile-menu" >
			  			<li ><a href="<?= $_PATH['root'] ?>/?url=home">User Profile </a></li>
			      		<li ><a href="<?= $_PATH['root'] ?>/?url=my_posted_jobs&type=View">Jobs Posted</a></li>
			      		<li ><a href="<?= $_PATH['root'] ?>/?url=notifications">Notifications <span style="color:Red">(<?= $newNotifications ?>)</span></a></li>
			      		<li ><a href="<?= $_PATH['root'] ?>/?url=reviews&type=View">Reviews</a></li>
						<li id="manage" onmouseover='$("#dd-manage").fadeIn(100)'><a>Manage</a>
							<div class="dd" style="margin-left:420px;" id="dd-manage">
								<ul style="display:block">
									<li ><a href="<?= $_PATH['root'] ?>/?url=financial_accounts&type=View">Financial Accounts</a></li>
									<li><a href="<?= $_PATH['root'] ?>/?url=transactions/deposits">Transactions</a></li>
								</ul>
							</div>
						</li>
						<li ><a class='example7' href="<?= $_PATH['root'] ?>/?url=help&type=View">Help</a></li>
						<li ><a  href="<?= $_PATH['root'] ?>/?url=faqs">FAQ</a></li>
						<li ><a  href="<?= $_PATH['formHandler'] ?>/?action=logout">Logout</a>
			  		</ul>
				<div class="clear"></div>
			</div>
			<!-- header-gray2 / -->	
			<?php	
			}
			else if($_SESSION['perserbid']['user']->userType == 2) // user type = provider
			{
			?>
			<!-- header-gray2 -->
			<div class="header-gray2">
				<div class="mobile-menu-link">menu</div>
			  	<ul class="mobile-menu" >
			  		<li ><a href="<?= $_PATH['root'] ?>/?url=home">User Profile </a></li>
			   		<li ><a href="<?= $_PATH['root'] ?>/?url=bids/my_bids">My Bids</a></li>
			     	<li ><a href="<?= $_PATH['root'] ?>/?url=bids/all">All Active Bids</a></li>
				 	<li ><a href="<?= $_PATH['root'] ?>/?url=flagged_jobs">Flagged Jobs</a></li>
				 	<li ><a href="<?= $_PATH['root'] ?>/?url=notifications">Notifications <span style="color:Red">(<?= $newNotifications ?>)</span></a></li>
					<li ><a href="<?= $_PATH['root'] ?>/?url=reviews&type=View">Client Reviews</a></li>
					<li id="manage" onmouseover='$("#dd-manage").fadeIn()'><a>Manage</a>
						<div class="dd" style="margin-left:555px;" id="dd-manage" >
							<ul style="display:block">
								<li style="margin:0px"><a href="<?= $_PATH['root'] ?>/?url=financial_accounts&type=View">Financial Accounts</a></li>
								<li style="margin:0px"><a href="<?= $_PATH['root'] ?>/?url=transactions/released">Payments</a></li>
							</ul>
						</div>
					</li>
					<li ><a class='example7' href="<?= $_PATH['root'] ?>/?url=help&type=View">Help</a></li>
					<li><a  href="<?= $_PATH['root'] ?>/?url=faqs">FAQ</a></li>
					<li ><a  href="<?= $_PATH['formHandler'] ?>/?action=logout">Logout</a></li>
			  </ul>
			  <div class="clear"></div>
			</div>
			<!-- header-gray2 / -->
			<?php	
			}
		}
		?>
  	</div>
  	<div class="clear"></div>
</div>
<div class="clear"></div>


