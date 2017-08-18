<?php 
  
  $status  = array('0' => 'Deactive' , '1' => 'Active');
// print_r(hii);

?>


            <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
		 <thead>
                           <tr>
                              <th>Sr.No.</th>
                              <th>Company</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Contact Number </th>
                              
                              <th>Address</th>
                              <th>Anniversary Date</th>
                              <th>Date of Birth</th>
                              <th>Created Date</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $key => $value) { 

                          $param = array(); 
                          $param['conditionParam']['param']['id'] = $value['userId'];
                          $userDetails = $User->get_user_details($param)['data'];


                          ?>
                         
                      
                           <tr>
                              <td><?= ($key + 1) ?></td>
                              <td><?= (isset($userDetails)) ? $userDetails->companyName : '' ?></td>
                              <td><?= $value['firstName'].' '.$value['lastName']?></td>
                              <td><?= $value['mailId']?></td>
                              <td><?= $value['contactNumber']?></td>
                              <td><?= $value['address']?></td>
                              <td><?= date("F j, Y, g:i a",strtotime($value['anniversaryDate']))?></td>
                              <td><?= date("F j, Y, g:i a",strtotime($value['dateOfBirth']))?></td>
                              
                              
                              <td><?= date("F j, Y, g:i a",strtotime($value['createdOn']))?></td>
                              
                              <td><?= $purifier->purify($status[$value['status']]) ?></td>
                             
                              </tr>
                               <?php }  ?>
                        </tbody>
		</table>
		<script>
			// applyDataTable("tblDataTable");
		</script>
		<style>
			.inner-table td{
				padding:5px;border:1px solid lightgrey;
			}
		</style>