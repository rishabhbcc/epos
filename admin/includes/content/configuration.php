<?php 
   $param = array(); 
   //get configuration_details
   $param['conditionParam']['param']['id'] = 1;
   $configuration = $System->get_configuration_details($param)['data'];
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
  <!--  <section class="content-header " style="margin-left: 17%"> -->
      <h1>
         System Configuration 
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
            <li class="active">System Configuration</li>
         </ol>
               </div>
               <div class="col-sm-2">
                 <h2> 
                     <?php  { ?>
                     <button style="float:right"  type="button" class="btn btn-default" onclick="window.location='./?url=<?=base64_encode('configuration')?>&tab=<?=base64_encode('Edit')?>&id=<?=$configuration->id?>'">Edit Configuration &nbsp;<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                     <?php } ?>
                   </h2>
               </div>
            </div>
            <div class="row row-margin-l"> <!-- row-margin-l -->

                  <!-- PAGE CONTENT BEGINS -->
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                     <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline">
                        <thead>
                           <tr>
                              
                              <th>Website Name</th>
                              <th>Title</th>
                              <th>Logo</th>
                              <th>Website URL</th>
                              <th>Contact Us</th>
                              <th>Support Email Id</th>
                            <!--   <th class="hidden-480">Option</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              
                              <td><?= $purifier->purify($configuration->websiteName) ?></td>
                              <td><?= $purifier->purify($configuration->websiteTitle) ?></td>
                              <td>
                                 <img style= "height:50px;width:50px;"src ="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$configuration->logo) ?>">
                              </td>
                              <td><?= $purifier->purify($configuration->websiteLink) ?></td>
                              <td><?= $purifier->purify($configuration->contactNumber) ?></td>
                              <td><?= $purifier->purify($configuration->supportMailId) ?></td>
                              
                              <td>
                                 <!-- <a id="edit" class="green" href="?url=<?=base64_encode("configuration") ?>&tab=<?=base64_encode("Edit")?>&id=<?= $configuration->id ?>"> Edit</a> -->
                              </td>
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
            <div class="row row-margin-l">
               <div class="row" style="padding:0 30px;">
                  <div class="col-sm-10">
                  </div>
                  <div class="col-sm-2">
                     <h2>
                        <button style="float:right"  type="button" class="btn btn-default" onclick="window.location='./?url=<?=base64_encode('configuration')?>&tab=<?=base64_encode('View')?>'">Back  <i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
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
                     
                     <!-- start website name -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Name </label>
                        <div class="col-sm-9">
                           <input type="text"  onkeypress='validate(event)' name="websiteName" required placeholder="Site Name" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteName):'' ?>" />
                        </div>
                     </div>
                     <!-- end website name -->
                     <!-- start website title -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Url </label>
                        <div class="col-sm-9">
                           <input type="text"  onkeypress='validate(event)' name="websiteTitle" required placeholder="Title" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteTitle):'' ?>" />
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
                           <input type="file" id="logo_rish" name="logo" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->logo):'' ?>" />
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
                           <input type="file" name="fevicon" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
                           <input type="hidden" name="oldFevicon" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
                        </div>
                     </div>
                     <!-- end Fevicon -->
                     <!-- start Email id -->          
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Support Email Id </label>
                        <div class="col-sm-9">
                           <input value="<?= isset($details)?$purifier->purify($details->supportMailId):'' ?>"  type="email" step="0.01" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Support Email Id" name="supportMailId" required class="col-xs-10 col-sm-5" />
                        </div>
                     </div>
                     <!-- end Email id -->
                     <!-- start Website link -->                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Website Link</label>
                        <div class="col-sm-9">
                        <a href="http://139.59.43.252/cnsMobileRecharge/admin"></a>
                           <input value="<?= isset($details)?$purifier->purify($details->websiteLink):'' ?>"  type="url"  placeholder="Website Link" name="websiteLink" required class="col-xs-10 col-sm-5" />
                        </div>
                     </div>
                     <!-- end Website link -->
                     <!-- start Contact number -->
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Contact Number </label>
                        <div class="col-sm-9">
                           <input value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>"  type="text"   placeholder="Contact Number" onkeypress='phonevalidate(event)' minlength="10"   maxlength="15" name="contactNumber" required class="col-xs-10 col-sm-5" />
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
            <!-- /.row -->
         </div>
      </div>
      <?php 
         }  
         ?>
   </section>
</div>