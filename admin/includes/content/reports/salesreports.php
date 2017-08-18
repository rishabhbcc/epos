
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper margin-top-7">
   <!-- Content Header (Page header) -->
   <section class="content-header row-margin-l">

      <ol class="breadcrumb">
         <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
         <li class="active">Sales Report</li>
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
            <div class="row row-margin-l">


              <div class="clearfix"></div>
            </div> <br>
            <div class="row row-margin-l margin-t-4p">
               <div class="col-xs-12">

                  <!-- PAGE CONTENT BEGINS -->
                  <div class="col-xs-12">
                  <div class="card-box table-responsive">
                   <div class="row report-div">
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="dashboard-subcategory bgDash_color1" style="background-color:#173444!important">
                           <a href="./?url=<?=base64_encode('saleSummary') ?>&tab=<?=base64_encode('View') ?>">
                              <div class="padding-35 text-center colfff">
                                <h1> <i class="fa fa-user colfff" aria-hidden="true"></i></h1>
                                 <p><h3 class="colfff"> Sale Summary </h3 ></p>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                    
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="dashboard-subcategory bgDash_color2" style="background-color:#34bda1!important">
                           <a href="./?url=<?=base64_encode('saleByHour') ?>&tab=<?=base64_encode('View') ?>">
                              <div class="padding-35 text-center colfff">
                                <h1> <i class="fa fa-cube colfff" aria-hidden="true"></i></h1>
                                 <p><h3  class="colfff">Hour Sale</h3 ></p>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="dashboard-subcategory bgDash_color2" style="background-color:#095668!important">
                           <a href="./?url=<?=base64_encode('todaySale') ?>&tab=<?=base64_encode('View') ?>">
                              <div class="padding-35 text-center colfff">
                                <h1> <i class="fa fa-bar-chart colfff" aria-hidden="true"></i></h1>
                                 <p> <h3 class="colfff" > Today Sale</h3 ></p>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
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

<style type="text/css">
  .padding-35{padding: 35px; }
  .colfff{color: #fff}
</style>