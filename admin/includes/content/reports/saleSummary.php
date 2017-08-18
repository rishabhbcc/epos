<?php 
   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['1'] = 1;
   $list = $Order->get_order_list($param)['data'];

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
    
      <ol class="breadcrumb">
         <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
         <li class="active">Sale Summary </li>
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
              <div class="col-sm-3"><div class="form-group">
                  <label>Start Date</label>
            <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="startDate">
                </div></div>
              <div class="col-sm-3"><div class="form-group">
                  <label>End Date</label>
                 <input class="form-control datepicker" data-date-format="mm/dd/yyyy" id="endDate">
                </div></div>
                 <div class="col-sm-3"><div class="form-group">
       
                  <input  class="form-control btn-default" style="width: 50%;margin:auto;margin-top:25px; border:0px; " type="button" onclick="getFilterRecords('userId','startDate','endDate')" value="Filter">
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
                              <th>Order Sequence Number</th>
                              <!-- <th>Confirmed By</th> -->
                              <th>Confirmed </th>
                              <th>Company</th>
                              <th>Customer</th>
                              <th>paymentMethod</th>
                              <th>Sub Total</th>
                              <th>Total</th>
                              <th>Created On </th>
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
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php }
         else
         {  
            $tab=base64_decode($_GET['tab']);  
         if($tab=="Edit")
         {
          $param = array();
          $param['conditionParam']['param']['id'] = 1;
          $details = $System->get_configuration_details($param)['data'];
         } 
         ?> 
      <div class="box">
         <div class="box-body">
            <div class="row">
               <div class="row" style="padding:0 30px;">
                  <div class="col-sm-10">
                  </div>
                  <div class="col-sm-2">
                     <h2>
                        <button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=<?=base64_encode('configuration')?>&tab=<?=base64_encode('View')?>'">Back  <i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
                     </h2>
                  </div>
               </div>
               <div class="col-xs-9">
                  <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
                     <input type="hidden" name="type" value="<?= base64_decode($_REQUEST['tab']) ?>" >
                     <input type="hidden" name="action" value="manageConfiguration">
                     <input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>">
                     <?php
                        if(base64_decode($_REQUEST['tab'])=='Edit')
                        {
                        ?>
                     <input type="hidden" name="editId" value="<?= $_REQUEST['id']?>" />
                     <?php
                        }
                        ?>
                     <!-- #section:elements.form -->
                     <!-- start website name -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Name </label>
                        <div class="col-sm-9">
                           <input type="text" id="form-field-1" onkeypress='validate(event)' name="websiteName" required placeholder="Site Name" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteName):'' ?>" />
                        </div>
                     </div>
                     <!-- end website name -->
                     <!-- start website title -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Title </label>
                        <div class="col-sm-9">
                           <input type="text" id="form-field-1"  onkeypress='validate(event)' name="websiteTitle" required placeholder="Title" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteTitle):'' ?>" />
                        </div>
                     </div>
                     <!-- start logo -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Logo</label>
                        <div class="col-sm-9">
                           <?php
                              if(isset($details) && ($details->logo!=null))
                              {
                              ?>
                           <img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->logo) ?>" style="height:50px;width:50px;" />
                           <?php  
                              }
                              ?>
                           <input type="file" id="form-field-1" name="logo" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->logo):'' ?>" />
                           <input type="hidden" name="oldLogo" value="<?= isset($details)?$purifier->purify($details->logo):'' ?>" />
                        </div>
                     </div>
                     <!-- end logo -->
                     <!-- start Fevicon -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fevicon</label>
                        <div class="col-sm-9">
                           <?php
                              if(isset($details) && ($details->fevicon!=null))
                              {
                              ?>
                           <img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->fevicon) ?>" style="height:50px;width:50px;" />
                           <?php  
                              }
                              ?>
                           <input type="file" id="form-field-1" name="fevicon" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
                           <input type="hidden" name="oldFevicon" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
                        </div>
                     </div>
                     <!-- end Fevicon -->
                     <!-- start Email id -->          
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Support Email Id </label>
                        <div class="col-sm-9">
                           <input value="<?= isset($details)?$purifier->purify($details->supportMailId):'' ?>"  type="email" step="0.01" id="form-field-1-1" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Support Email Id" name="supportMailId" required class="col-xs-10 col-sm-5" />
                        </div>
                     </div>
                     <!-- end Email id -->
                     <!-- start Website link -->                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Website Link</label>
                        <div class="col-sm-9">
                        <a href="http://139.59.43.252/cnsMobileRecharge/admin"></a>
                           <input value="<?= isset($details)?$purifier->purify($details->websiteLink):'' ?>"  type="url" id="form-field-1-1"  placeholder="Website Link" name="websiteLink" required class="col-xs-10 col-sm-5" />
                        </div>
                     </div>
                     <!-- end Website link -->
                     <!-- start Contact number -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Contact Number </label>
                        <div class="col-sm-9">
                           <input value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>"  type="text" id="form-field-1"  placeholder="Contact Number" onkeypress='phonevalidate(event)' minlength="10"   maxlength="15" name="contactNumber" required class="col-xs-10 col-sm-5" />
                        </div>
                     </div>
                     <!-- start Adress -->              
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
                        <div class="col-sm-9">
                           <textarea name="address" class="form-control" required><?= isset($details)?$purifier->purify($details->address):'' ?></textarea>
                        </div>
                     </div>
                     <!-- end Adress -->  
                     <!-- start Copyright -->                         
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Copyright Message </label>
                        <div class="col-sm-9">
                           <textarea name="copyrightMessage" class="form-control"   required><?= isset($details)?$purifier->purify($details->copyrightMessage):'' ?></textarea>

                           <!--onkeypress='validate(event)'-->
                        </div>
                     </div>
                     <!-- end Copyright pattern="[A-Za-z0-9]+"-->                         
                     <!-- /section:elements.form -->
                     <div class="space-4"></div>
                     <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                           <button class="btn btn-info" type="submit">
                           <i class="ace-icon fa fa-check bigger-110"></i>
                           Submit
                           </button>
                           &nbsp; &nbsp; &nbsp;
                           <button class="btn" type="reset">
                           <i class="ace-icon fa fa-undo bigger-110"></i>
                           Reset
                           </button>
                        </div>
                     </div>
                  </form>
                  <!-- PAGE CONTENT ENDS -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
      </div>
      <?php 
         }  
         ?>
   </section>
</div>