<?php 
$isConfirmed = array('0' => 'Failed','1' => 'Success','2' => 'Credit' );
$status = array('1' => 'Active','0' => 'Deactive' );
?>



<table id="tblDataTable" class="table table-striped table-bordered table-hover">
		 <thead>
                           <tr>
                              <th>Sr.No.</th>
                              <th>Order Sequence Number</th>                     
                              <th>Confirmed </th>
                              <th>Company</th>
                              <th>Customer</th>
                              <th>paymentMethod</th>
                              <th>Sub Total</th>
                              <th>Total</th>
                              <th>Created On</th>
                              <th>Status</th>
                            <!--   <th class="hidden-480">Option</th> -->
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $key => $value) { 

                          $param = array(); 
                          $param['conditionParam']['param']['id'] = $value['userId'];
                          $userDetails = $User->get_user_details($param)['data'];

                          $param = array(); 
                          $param['conditionParam']['param']['id'] = $value['customerId'];
                          $customerDetails = $Customer->get_customer_details($param)['data'];

                          $param = array(); 
                          $param['conditionParam']['param']['id'] = $value['paymentMethodId'];
                          $paymentDetails = $PaymentMethods->get_payment_method_details($param)['data'];

                          ?>
                         
                      
                           <tr>
                              <td><?= ($key + 1) ?></td>
                              <td><?= $purifier->purify($value['orderSequenceNumber']) ?></td>
                              <td><?= $purifier->purify($isConfirmed[$value['isConfirmed']]) ?></td>
                              <td><?= (isset($userDetails)) ? $userDetails->companyName : '' ?></td>
                              <td><?= (isset($customerDetails)) ? $customerDetails->firstName : ''?></td>
                              <td><?= (isset($paymentDetails)) ? $paymentDetails->methodName : ''?></td>
                              <td><?= $purifier->purify($value['subTotal']) ?></td>
                              <td><?= $purifier->purify($value['totalPrice']) ?></td>
                              <td><?= $purifier->purify($value['createdOn']) ?></td>
                              <td><?= $purifier->purify($status[$value['status']]) ?></td>
                             
                              </tr>
                               <?php } ?>
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