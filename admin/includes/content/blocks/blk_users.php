<table id="tblDataTable" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Sr.No.</th>
			<th>Braintree Id</th>
			<th>Username/Name</th>
			<th>Email Id</th>
			<th>Address</th>
			<th>Status</th>
			<th class="hidden-480">Option</th>													
		</tr>
	</thead>

	<tbody>
        <?php
		for($count=0;$count<count($list);$count++)
		{
			$item = $list[$count];
		?>
		<tr>
			<td><?= $count+1; ?></td>
			<td><?= $purifier->purify($item['braintreeId']) ?></td>
			<td><?= $purifier->purify($item['username']) ?> / (<?= $purifier->purify($item['firstName'].' '.$item['lastName']) ?>)</td>
			<td><?= $purifier->purify($item['mailId']) ?></td>
			<td><?= $purifier->purify($item['streetAddress']) ?></td>
			<td><?= ($item['status']==1?'Active':'Inactive') ?></td>
			<td>
				<a id="edit" class="green" href="?url=users/company&tab=Edit&id=<?= $item['id'] ?>"> Edit</a>
				<i class="ace-icon fa fa-pencil bigger-130"></i></a> |
				<a href="./form_handler.php?action=manageUsers&type=Delete&id=<?= $item['id'] ?>">Delete</a>
				<i class="ace-icon fa fa-trash-o bigger-130"></i></a> |
				<a href="<?= $_PATH['root'] ?>/?url=user_dashboard&userId=<?= $item['id'] ?>">User Dashboard</a> 
				
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