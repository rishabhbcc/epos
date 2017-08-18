<?php 
   $param = array();
   
   
   $param['conditionParam']['param']['id'] =$_SESSION[$_SESSION_ID]['admin']->id;
   $userDetails = $User->get_user_details($param)['data'];
  // echo '<pre>';print_r($list);exit;
   
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper margin-top-7">
  <section class="content-header row-margin-l">
      <h1>
         Admin
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
               <li class="active">Admin</li>
            </ol>
               </div>
               <div class="col-sm-2">
                  <!-- <h2>
                     <button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=user&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                     </h2> -->
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
                              <th>#</th>
                              <th>Admin Name</th>
                              <th>Image</th>
                              <th>Mail Id</th>
                              <th>Mobile Number</th>
                              <!-- <th>Status</th> -->
                              <th>Action</th> 
                           </tr>
                        </thead>
                        <tbody>
                           <!--  <tr>
                              <td>1</td>
                              <td>Latest Song</td>
                              <td>Awesome Songs</td>
                              
                              <td><a href="" class="btn btn-success">Edit</a>&nbsp;&nbsp;<a href="" class="btn btn-danger">Delete</a></td>
                              </tr> -->
                           <?php 
                              echo '<tr>
                                    <td>1</td>
                                    
                                    <td>'.$userDetails->firstName.' '.$userDetails->lastName.'</td>
                                    
                                     <td><img style="border-radius: 11px;width:50px;height:50px;" src="'.$userDetails->image.'" /></td>
                                    <td>'.$userDetails->mailId.'</td>
                                    <td>'.$userDetails->contactNumber.'</td>
                                    
                                    
                                    <td><a href="?url='.base64_encode("admin").'&tab='.base64_encode("Edit").'&id='.base64_encode($_SESSION[$_SESSION_ID]['admin']->id).'" class="btn btn-success">Edit</a>&nbsp;&nbsp;<a  href="./form_handler.php?action=admin&type=Delete&id='.$userDetails->id.'&accessToken='.$_SESSION[$_SESSION_ID]['accessToken'].'" class="btn btn-danger">Delete</a></td>
                                   </tr>';
                              
                              
                              ?>
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
            $details = $User->get_user_details($param)['data'];
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
                        <button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=<?=base64_encode('admin')?>&tab=<?=base64_encode('View')?>'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
                     </h2>
                  </div>
               </div>
               <div class="col-xs-9">
                  <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal" role="form" action='form_handler.php' method="post" enctype="multipart/form-data">
                     <input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
                     <input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
                     <input type="hidden" name="action" value="admin">
                     <input type="hidden" name="type" value="<?= base64_decode($_REQUEST['tab']) ?>" >
                     <?php
                        if(base64_decode($_REQUEST['tab'])=='Edit')
                        {
                        ?>
                     <input type="hidden" name="editId" value="<?= base64_decode($_REQUEST['id'])?>" />
                     <input type="hidden" name="modifiedBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
                     <?php
                        }
                        ?>
                     <?php //echo '<pre>';print_r($list);  ?>
                     <!--
                        <div class="form-group">
                           <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Parent Category</label>
                        
                           <div class="col-sm-9">
                              <select class="form-control" id="category_parent_id" name="category_parent_id" > 
                                    <option value="">Parent Category</option>
                        
                                    <?php 
                           foreach ($list as $key => $value) {
                              echo "<option value='".$value['id']."'>".$value['category_name']."</option>";
                              //echo '<pre>';print_r($value);
                           }
                           
                           ?>
                                    
                              </select>
                              
                           </div>
                        
                        </div>   -->
                     <!-- star Admin  -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Admin Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="userName" onkeypress='validate(event)'  required placeholder="Admin Name" value="<?= isset($details)?$purifier->purify($details->firstName." ".$details->lastName):'' ?>" title="Admin Name"><br>
                        </div>
                     </div>
                     <!-- end Admin  -->
                     <!-- start image  -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>
                        <div class="col-sm-9">
                           <?php
                              if(isset($details) && ($details->image!=null))
                              {
                              ?>
                           <img src="<?= $purifier->purify($details->image) ?>" style="border-radius:11px;height:50px;width:50px;" id="fileInput" />
                           <?php 
                              }
                              ?>
                           <img src=""  style="height:50px;width:50px;display:none;" class="imageId"/>
                           <input type="file" id="form-field-1" name="image" accept="image/*"  class="col-xs-10 col-sm-5 imgInputBox" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" /><span id
                              ="file_error" style="color: #ff0000;"></span>
                           <input type="hidden" name="image" value="<?= isset($details)?$purifier->purify($details->image):'' ?>" />
                        </div>
                     </div>
                     <!-- end image  -->
                     <!-- start Mail Id  -->              
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mail Id</label>
                        <div class="col-sm-9">
                           <input type="email" class="form-control" name="mailId" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required placeholder="Mail Id" value="<?= isset($details)?$purifier->purify($details->mailId):'' ?>" title="Mail Id"><br>
                        </div>
                     </div>
                     <!-- end Mail Id  -->  
                     <!-- start Mobile number  -->              
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mobile Number</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" onkeypress='phonevalidate1(event)' maxlength="10" name="contactNumber" placeholder="Mobile Number" value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>" title="Mobile Number"><br>
                        </div>
                     </div>
                     <!-- end Mobile number  -->                   
                     <!-- start Status  -->                 
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status </label>
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
                     <!-- end Status  -->                 
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
         </div>
      </div>
      <?php 
         }  
         ?>
   </section>
</div>