<?php 
   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $list = $Order->get_order_list($param)['data'];

   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $paymentList = $Payment->get_payment_list($param)['data'];

   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $userList = $User->get_user_list($param)['data'];

   $status = array('1' => 'Active','0' => 'Deactive' );
   $isConfirmed = array('0' => 'Failed','1' => 'Success','2' => 'Credit' );


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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper margin-top-7">
   <!-- Content Header (Page header) -->
   <section class="content-header row-margin-l">
      <!-- <h1>
         Payment Method Report
         <small><?= $purifier->purify(base64_decode($_GET['tab'])) ?></small>
      </h1> -->
      <ol class="breadcrumb">
         <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
         <li class="active">Payment Method Report</li>
      </ol>
   </section>
   <?php 
      if(base64_decode($_GET['tab'])=="View")
      { 
      ?> 
   <!-- Main content -->
   <section class="content">
      <div class="box">
         <div class="box-body">
            <div class="row padding-l-10 row-margin-l">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Company</label>
                  <select class="form-control" name="userId" id="userId" >
                  <option value="">Select</option>
                  <?php 

                    foreach ($userList as $key => $value) { ?>
                     
                      <option value="<?= $value['id'] ?>"><?= $value['companyName']?></option>

                <?php }  ?>

                  </select>
                </div>
              </div>
              <div class="col-sm-2"><div class="form-group">
                  <label>Payment Method</label>
                    <select class="form-control" name="paymentId" id="paymentId" >
                  <option value="">Select</option>
                  <?php 

                    foreach ($paymentList as $key => $value) { ?>
                     
                      <option value="<?= $value['id'] ?>"><?= $value['methodName']?></option>

                <?php }  ?>

                  </select>
                </div></div>
              <div class="col-sm-2"><div class="form-group">
                  <label>Start Date</label>
            <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="startDate">
                </div></div>
              <div class="col-sm-2"><div class="form-group">
                  <label>End Date</label>
                 <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="endDate">
                </div></div>
                 <div class="col-sm-3"><div class="form-group">
       
                  <input  class="form-control btn-default" style="width: 50%;margin:auto;margin-top:25px; border:0px; " type="button" onclick="getPaymentFilterRecords('userId','paymentId','startDate','endDate')" value="Filter">
                </div></div>

              <div class="clearfix"></div>
            </div> <br>
            <div class="row row-margin-l">
               <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <div class="col-xs-12">
                  <div class="card-box table-responsive">
                     <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>S. No.</th>
                              <th>Order Id</th>
                              <th>Order Status </th>
                              <th>Business Name</th>
                              <th>Customer</th>
                              <th>Payment Mode</th>
                              <th>Subtotal</th>
                              <th>Total Amount</th>
                              <th>Created date </th>
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
                          $param['conditionParam']['param']['id'] = $value['paymentmethodId'];
                          $paymentDetails = $PaymentMethods->get_payment_method_details($param)['data'];

                          ?>
                         
                      
                           <tr>
                              <td><?= ($key + 1) ?></td>
                              <td><?= $purifier->purify($value['orderSequenceNumber']) ?></td>
                              <td><?= $purifier->purify($isConfirmed[$value['isConfirmed']]) ?></td>
                              <td><?= (isset($userDetails)) ? $userDetails->companyName : '' ?></td>
                              <td><?= (isset($customerDetails)) ? $customerDetails->firstName.' '.$customerDetails->lastName : ''?></td>
                              <td><?= (isset($paymentDetails)) ? $paymentDetails->methodName : ''?></td>
                              <td><?= $purifier->purify($value['subTotal']) ?></td>
                              <td><?= $purifier->purify($value['totalPrice']) ?></td>
                              <td><?= $purifier->purify($value['createdOn']) ?></td>
                              <td><?= $purifier->purify($status[$value['status']]) ?></td>
                             
                              </tr>
                               <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
              </div> 
            </div>
         </div>
      </div>
      <?php }
          
         ?>
   </section>
</div>