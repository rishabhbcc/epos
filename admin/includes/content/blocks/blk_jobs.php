<table id="tblDataTable" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Sr.No.</th>
				<th>Job Name</th>
				<th>Username</th>
				<th>Skills</th>
				<th>Status</th>
				<th>Posted On</th>
				<th class="hidden-480">Options</th>													
			</tr>
		</thead>
		
		<tbody>
	    <?php
		for($count=0;$count<count($list);$count++)
		{
			$item = $list[$count];
			$param = array();
			$param['conditionParam']['param']['id'] = $item['status'];
			$status = $Job->get_job_status_details($param)['data'];
			$param = array();
			$param['conditionParam']['param']['id'] = $item['userId'];
			$jobPoster = $User->get_user_details($param)['data'];
			$skills = explode(',',$item['skills']);
			$skillsString = '';
			for($countInner=0;$countInner<count($skills);$countInner++)
			{
				$param = array();
				$param['conditionParam']['param']['id'] = $skills[$countInner];
				$skill = $Job->get_skill_details($param)['data'];
				$skillsString.= $skill->skillName;
				if($countInner < (count($skills)-1)) $skillsString.= ' , ';
			}
			$param = array();
			$param['fields'] = 'count(id) as totalReviews';
			$param['conditionParam']['param']['jobId'] = $list[$count]['id'];
			$reviews = $Job->get_review_list($param)['data'];
		?>
		<tr>
			<td><?= $count+1; ?></td>
			<td><?= $purifier->purify($item['jobName']) ?></td>
			<td><?= $purifier->purify($jobPoster->firstName.' '.$jobPoster->lastName) ?></td>
			<td><?= $purifier->purify($skillsString) ?></td>
			<td><?= $purifier->purify($status->statusName) ?></td>
			<td><?= $purifier->purify($item['addedOn']) ?></td>
			<td>
				<a href="<?= $_PATH['root'] ?>/?url=reviews&tab=View&jobId=<?= $list[$count]['id'] ?>"><?= (isset($reviews[0])?$reviews[0]['totalReviews']:0) ?> Review(s)</a>
			</td>
		</tr>
		<?php
		}
		?>
		</tbody>
	</table>
	<script>
		applyDataTable("tblDataTable");
	</script>