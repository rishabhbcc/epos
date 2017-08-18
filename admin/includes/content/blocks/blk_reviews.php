<table id="tblDataTable" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Sr.No.</th>
				<th>User</th>
				<th>Review</th>
				<th>Rating</th>
				<th>Is Abusive?</th>
				<th>Status</th>
				<th class="hidden-480">Options</th>													
			</tr>
		</thead>
		
		<tbody>
	    <?php
		for($count=0;$count<count($list);$count++)
		{
			$item = $list[$count];
			$param = array();
			$param['conditionParam']['param']['id'] = $item['userId']!=0?$item['userId']:$item['awardedUserId'];
			$reviewer = $User->get_user_details($param)['data'];
			$param = array();
			$param['conditionParam']['param']['id'] = $item['userId']!=0?$item['userId']:$item['awardedUserId'];
			$reviewer = $User->get_user_details($param)['data'];
			$param = array();
			$param['conditionParam']['param']['id'] = $reviewer->userType;
			$userType = $System->get_user_type_details($param)['data'];
		?>
		<tr>
			<td><?= $count+1; ?></td>
			<td><?= $purifier->purify($reviewer->firstName.' '.$reviewer->lastName) ?> / <b>(<?= $purifier->purify($userType->typeName) ?>)</b></td>
			<td>
				<?= $purifier->purify($item['review']) ?>
				<br />
				<b>Before Images :</b> 
				<br /> 
				<?php 
				$beforeImages = unserialize($item['beforeAttachments']);
				if($beforeImages != null)
				{
					for($count=0;$count<count($beforeImages);$count++)
					{
						$fileName = explode('/',$beforeImages[$count]);
						$fileName = $fileName[count($fileName)-1];
					?>
					<a download target="_blank" href="<?= $_PATH['websiteRoot'] ?>/<?= $beforeImages[$count] ?>"><?= $fileName ?></a><br />
					<?php 	
					}
				}
				?>
				<br />
				<b>After Images :</b> 
				<br /> 
				<?php 
				$afterImages = unserialize($item['afterAttachments']);
				if($afterImages != null)
				{
					for($count=0;$count<count($afterImages);$count++)
					{
						$fileName = explode('/',$afterImages[$count]);
						$fileName = $fileName[count($fileName)-1];
					?>
					<a download target="_blank" href="<?= $_PATH['websiteRoot'] ?>/<?= $afterImages[$count] ?>"><?= $fileName ?></a><br />
					<?php 	
					}
				}
				?>
			</td>
			<td><?= $purifier->purify($item['rating']) ?>/5</td>
			<td><?= $item['isAbusive']?'Yes':'No' ?></td>
			<td>
				<?= $item['status']==1?'Active':'Inactive' ?>
				<br />
				Posted On : <?= $item['addedOn'] ?>
			</td>
			<td>
				<a href="<?= $_PATH['formHandler'] ?>?action=manageReview&type=Delete&jobId=<?= $item['jobId'] ?>&id=<?= $item['id'] ?>&accessToken=<?= $_SESSION['perserbid']['accessToken'] ?>">Delete</a>
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