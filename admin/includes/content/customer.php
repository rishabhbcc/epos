<?php 

   $param = array();
   
   $param['orderBy'] = 'indexValue';
   $param['conditionParam']['param']['1'] = 1;
   $list = $Customer->get_customer_list($param)['data'];
  // echo '<pre>';print_r($list);
   
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper margin-top-7">
   <section class="content-header row-margin-l">
      <h1>
         Customers
         <small><?= $purifier->purify(base64_decode($_GET['tab'])) ?></small>
      </h1>

   </section>
   <?php 
      if(base64_decode($_GET['tab'])=="View")
      { 
      ?> 
   <!-- Main content -->
   <section class="content">
      <div class="box">
         <div class="box-body">
            <div class="row">
               <div class="col-sm-10">
               <ol class="breadcrumb row-margin-l">
               <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
               <li class="active">Customer</li>
            </ol>
               </div>
               <div class="col-sm-2">
                   
               </div>
            </div>
            <div class="row row-margin-l">
               <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <div class="col-xs-12">
                  <div class="card-box table-responsive">
                     <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>S. No.</th>
                              <th>Business Name</th>
                              <th>Name</th>
                              <th>Email Id</th>
                              
                              <th>Mobile Number</th>
                              <th>Date Of Birth</th>
                              <th>Address</th>
                              <th>Status</th>
                              <!-- <th>Action</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           
                           <?php 
                              foreach ($list as $key => $value) {
                                       $param = array();
                                       $param['conditionParam']['param']['id'] = $value['userId'];
                                       $userDetails = $User->get_user_details($param)['data'];
                                          
                                 echo '<tr>
                                       <td>'.($key+1).'</td>
                                       <td>'.$userDetails->companyName.'</td>
                                       <td>'.$value['firstName'].' '.$value['lastName'].'</td>
                                       <td>'.$value['mailId'].'</td>
                                       
                                       <td>'.$value['contactNumber'].'</td>
                                       <td>'.$value['dateOfBirth'].'</td>
                                       <td>'.$value['address'].'</td>
                                       <td>'.(($value['status']==1 )? "Active" :"InActive").'</td>
                                       </tr>';
                              }
                              
                              ?>
<!-- <td><a href="?url='.base64_encode("customer").'&tab='.base64_encode("Edit").'&id='.base64_encode($value['id']).'" class="btn btn-success">Edit</a>&nbsp;&nbsp;<a onclick="return confirm(\'Are you sure you want to delete this customer?\');" href="./form_handler.php?action=customer&type=Delete&id='.$value['id'].'&accessToken='.$_SESSION[$_SESSION_ID]['accessToken'].'" class="btn btn-danger"  >Delete</a></td> -->

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
            $param['conditionParam']['param']['id'] = base64_decode($_REQUEST['id']);
            $details = $Customer->get_customer_details($param)['data'];
            //print_r($details);exit;
            $param = array();
            $param['conditionParam']['param']['id'] = $details->userId;
            $userdetails = $User->get_user_details($param)['data'];
           // print_r($userdetails);exit;
         } 
         ?> 
      <div class="box">
         <div class="box-body">
            <div class="row row-margin-l">
               <div class="row" style=" ">
                  <div class="col-sm-10">
                  </div>
                  <div class="col-sm-2">
                     <h2>
                        <button style="float:right"  type="button" class="btn btn-default" onclick="window.location='./?url=<?=base64_encode('customer')?>&tab=<?=base64_encode('View')?>'">Back <i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
                     </h2>
                  </div>
               </div>
               <div class="col-xs-9">
                  <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal" role="form" action='form_handler.php' method="post" enctype="multipart/form-data">
                     <input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
                     <input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
                     <input type="hidden" name="action" value="customer">
                     <input type="hidden" name="roleId" value="2">
                     <input type="hidden" name="type" value="<?= base64_decode($_REQUEST['tab']) ?>" >
                     <?php
                        if(base64_decode($_REQUEST['tab'])=='Edit')
                        {
                        ?>
                     <input type="hidden" name="editId" value="<?= base64_decode($_REQUEST['id'] )?>" />
                     <input type="hidden" name="modifiedBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
                     <?php
                        }
                        ?>
                         <?php
                        if(base64_decode($_REQUEST['tab'])=='Edit')
                        {
                        ?>
                        <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Company Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="companyName" readonly onkeypress="validate(event)" value="<?= isset($userdetails)?$purifier->purify($userdetails->companyName):'' ?>" title="Company Name" required placeholder="Company Name"><br>
                        </div>
                        </div>
                        <?php
                        }else{
                        ?>
                        <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Company Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="companyName"  onkeypress="validate(event)" value="<?= isset($userdetails)?$purifier->purify($userdetails->companyName):'' ?>" title="Company Name" required placeholder="Company Name"><br>
                        </div>
                        </div>
                         <?php
                        }
                        ?>
                     <!-- Start User  -->
                        <div class="form-group">
                           <label class="col-sm-3 control-label no-padding-right" >First Name</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" name="firstName"  onkeypress="validate(event)" value="<?= isset($details)?$purifier->purify($details->firstName):'' ?>" title="First Name" required placeholder="First Name"><br>
                           </div>
                        </div>


                     <div    class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Last Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="lastName"  onkeypress="validate(event)" value="<?= isset($details)?$purifier->purify($details->lastName):'' ?>" title="Last Name" required placeholder="Last Name"><br>
                        </div>
                     </div>
                     <!-- end User  -->
                     <!-- Start Mail Id  -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Email Id</label>
                        <div class="col-sm-9">
                           <input type="email" class="form-control" required name="mailId" required pattern="[^ @]*@[^ @]*[.com]" placeholder="Email Id" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" title="Email Id"><br>
                        </div>
                     </div>
                     <!-- end Mail Id  -->
                    
                     <!-- Start Mobile Number -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Mobile Number</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" onkeypress='phonevalidate(event)' maxlength="10" name="contactNumber" required pattern="[0-9]{10}" required placeholder="Mobile Number" value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>" title="Mobile Number"><br>
                        </div>
                     </div>
                     <!-- End Mobile Number -->
                     <
                    
                     <!-- start Status -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > Status </label>
                        <div class="col-sm-9">
                           <label>
                           <input   type="radio" name="status" value="1" <?php if((isset($details) && $details->status==1) || $tab=="Add"){  ?> checked="checked" <?php } ?> class="ace">
                           <span class="lbl">Active</span>
                           </label>    
                           &nbsp; &nbsp; 
                           <label>
                           <input   type="radio" name="status" <?php if(isset($details) && $details->status==0){ ?> checked="checked" <?php } ?> value="0" class="ace">
                           <span class="lbl">Inactive</span>
                           </label> 
                        </div>
                     </div>
                     <!-- end Status -->
                     <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                           <button class="btn btn-default" type="submit">
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
         </div>
      </div>
      <?php 
         }  
         ?>
   </section>
</div>