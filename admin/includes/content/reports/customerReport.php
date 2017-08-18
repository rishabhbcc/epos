<?php 
   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $list = $Customer->get_customer_list($param)['data'];

  // echo "<pre>"; print_r($list);exit;


   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $userList = $User->get_user_list($param)['data'];
   $status = array('1' => 'Active','0' => 'Deactive' );



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
      
      <ol class="breadcrumb">
         <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
         <li class="active">Customer Report  </li>
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
                     
                      <option value="<?= $value['id'] ?>"><?= $value['companyName'] ?></option>

                <?php }  ?>

                  </select>
                </div>
              </div>
              <div class="col-sm-3"><div class="form-group">
                  <label>Start Date</label>
            <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="startDate">
                </div></div>
              <div class="col-sm-3"><div class="form-group">
                  <label>End Date</label>
                  <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="endDate">
                </div></div>
                 <div class="col-sm-3"><div class="form-group">
       
                  <input  class="form-control btn-default"  style="width: 50%;margin:auto;margin-top:25px; border:0px; " type="button" onclick="getCustomerFilterRecords('userId','startDate','endDate')" value="Filter">
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
                              <th>Sr.No.</th>
                              <th>Company</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Contact Number </th>
                              <th>Address</th>
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
                              
                              <td><?= date("F j, Y, g:i a",strtotime($value['dateOfBirth']))?></td>
                              <td><?= date("F j, Y, g:i a",strtotime($value['createdOn']))?></td>
                              <td><?= $purifier->purify($status[$value['status']]) ?></td>
                             
                              </tr>
                               <?php }  ?>
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
<!-- <td><?= date("F j, Y, g:i a",strtotime($value['anniversaryDate']))?></td> -->