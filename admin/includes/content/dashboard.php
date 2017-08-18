<?php 

   $param = array();
   $param['orderBy'] = 'indexValue';
   $param['conditionParam']['param']['roleId'] = 2;
   $param['conditionParam']['param']['1'] = 1;
   $userlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($list);
   $param = array();
   $param['orderBy'] = 'indexValue';
   $param['conditionParam']['param']['1'] = 1;
   $customerlist = $Customer->get_customer_list($param)['data'];
   $param = array();
   $param['orderBy'] = 'indexValue';
   $param['conditionParam']['param']['isConfirmed'] = 1;
   $param['conditionParam']['param']['status'] = 1;
   $orderlist = $Order->get_order_list($param)['data'];
   $totalamount=0;
   foreach ($orderlist as $key => $value) {
            $totalamount = $totalamount + $value['totalPrice'];
   }
   ?>

   <?php 
   $currentDate = date("Y-m-d");
   $param = array();
   $param['conditionParam']['param']['roleId'] = 2;
   $param['conditionParam']['param']['status'] = 1;
   $param['conditionParam']['param']['createdOn'] = $currentDate;
   $userList = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($list);
   $param = array();
   $param['conditionParam']['param']['createdOn'] = $currentDate;
   $customerList = $Customer->get_customer_list($param)['data'];
   $param = array();
   $param['conditionParam']['param']['isConfirmed'] = 1;
   $param['conditionParam']['param']['status'] = 1;
   $orderList = $Order->get_order_list($param)['data'];
   $totalamount=0;
   foreach ($orderlist as $key => $value) {
            $totalamount = $totalamount + $value['totalPrice'];
   }
   ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<input type="hidden" name="" value="<?= count($customerlist); ?>" id="totalcustomer">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Dassboard
         <small></small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
         <li class="active">Dassboard</li>
      </ol>
   </section>
  
   <!-- Main content -->
   <section class="content" >
      <div class="box">
         <div class="box-body">
             <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content" style="margin-top: -30px !important;">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to Cash Register admin panel</p>
                            </div>
                        </div>

                        <!--  style=" background-color: #8B0000 "
                               style=" background-color: #008000 "
                                style=" background-color: #FFFF00 "
                          -->
						<div class="row">
							<div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-info">
													<img src="<?= $_PATH['root']?>/assets/images/revanue.png" style="height: 38px;
    width: 83%;
    padding-top: 12%;"> 
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5"><b><?= $totalamount ?></b></h4>
											   <p class="text-muted m-b-0 m-t-0">Total Revenue</p>
											</div>
                                           <!--  <div class="table-detail text-right">
                                                <span data-plugin="peity-bar" data-colors="#34d3eb,#ebeff2" data-width="120" data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1</span>
                                            </div> -->

										</div>
									</div>
								</div>
							</div>

                <div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-custom">
													<i class="fa fa-users"></i>
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5 margin-l-11"><b><?= count($userlist); ?></b></h4>
											   <p class="text-muted m-b-0 m-t-0">Total Users</p>
											</div>
                                            <!-- <div class="table-detail text-right">
                                                <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                                            </div> -->

										</div>
									</div>
								</div>
							</div>

                            <div class="col-lg-4">
								<div class="card-box">
									<div class="bar-widget">
										<div class="table-box">
											<div class="table-detail">
												<div class="iconbox bg-danger">
													<img src="<?= $_PATH['root']?>/assets/images/customer.png" style="height: 38px;
    width: 83%;
    padding-top: 12%;"> 
												</div>
											</div>

											<div class="table-detail">
											   <h4 class="m-t-0 m-b-5"><b><?= count($customerlist); ?></b></h4>
											   <p class="text-muted m-b-0 m-t-0">Total Customers</p>
											</div>
                                            <!-- <div class="table-detail text-right">
                                                <span data-plugin="peity-donut" data-colors="#f05050,#ebeff2" data-width="50" data-height="45">4/5</span>
                                            </div> -->

										</div>
									</div>
								</div>
							</div>
						</div>



                        <div class="row">

                            <div class="col-lg-4">
                        		<div class="card-box">
                        			<h4 class="text-dark header-title m-t-0 m-b-30">Daily Reports</h4>

                        			<div class="widget-chart text-center">
                                        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	                                	<!-- <ul class="list-inline m-t-15">
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Target</h5>
	                                			<h4 class="m-b-0">$1000</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last week</h5>
	                                			<h4 class="m-b-0">$523</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last Month</h5>
	                                			<h4 class="m-b-0">$965</h4>
	                                		</li>
	                                	</ul> -->
                                	</div>
                        		</div>

                            </div>

                            <div class="col-lg-4">
                        		<div class="card-box">
                        			<h4 class="text-dark  header-title m-t-0 m-b-30">Weekly Sales</h4>

                        			<div class="widget-chart text-center">
                                        <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	                                	<!-- <ul class="list-inline m-t-15">
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Target</h5>
	                                			<h4 class="m-b-0">$1000</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last week</h5>
	                                			<h4 class="m-b-0">$523</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last Month</h5>
	                                			<h4 class="m-b-0">$965</h4>
	                                		</li>
	                                	</ul> -->
                                	</div>
                        		</div>

                            </div>

                            <div class="col-lg-4">
                        		<div class="card-box">
                        			<h4 class="text-dark  header-title m-t-0 m-b-30">Monthly Reports</h4>

                        			<div class="widget-chart text-center">
                                      <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                
	                                	<!-- <ul class="list-inline m-t-15">
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Target</h5>
	                                			<h4 class="m-b-0">$1000</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last week</h5>
	                                			<h4 class="m-b-0">$523</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last Month</h5>
	                                			<h4 class="m-b-0">$965</h4>
	                                		</li>
	                                	</ul> -->
                                	</div>
                        		</div>

                            </div>



                        </div>

                        <!-- end row -->

                        <div class="row">

                    <div class="col-lg-12 forAutoOverflow">

                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                  <!-- <h3> Users</h3>  -->Users
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="fa fa-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse"  data-parent="#accordion1" href="#portlet2"><i class="fa fa-window-minimize" ></i></a>
                                    <!-- <a data-toggle="collapse"  data-parent="#accordion1" href="#portlet2"><i class="fa fa-window-maximize" id="show"></i></a>    -->
                                    <!-- jagpal -->
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive slimscroll">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                  <th>#</th>
                                                  
                                                  <th>Name</th>
                                                  <th>Email Id</th>
                                                  <th>Profile Picture</th>
                                                  <th>Mobile Number</th>
                                                  <th>Business Name</th>
                                                  <th>Status</th>
                                                  </tr>
                                            </thead>
                                           <tbody>
                          
                           <?php 
                              foreach ($userlist as $key => $value) {
                                  
                                  
                                 echo '<tr>
                                       <td>'.($key+1).'</td>
                                      
                                       <td>'.$value['firstName'].' '.$value['lastName'].'</td>
                                       <td>'.$value['mailId'].'</td>
                                       <td><img style="border-radius: 11px;width:50px;height:50px;" src="'.$value['image'].'" /></td>
                                       <td>'.$value['contactNumber'].'</td>
                                       <td>'.$value['companyName'].'</td>
                                       <td>'.(($value['status']==1 )? "Active" :"DeActive").'</td>
                                       
                                       
                                      </tr>';
                              }
                              
                              ?>
                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->


                </div>

						<!-- end row -->

                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    All rights reserved by Nonstop Techlabs.
                </footer>

            </div>
            
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
         </div>
      </div>
      
   </section>
</div>

 <!-- <script type="text/javascript">
   
   $(document).ready(function(){
    $("#hide").click(function(){
        $(this).hide();
        $("#show").show();
    $("#show").click(function(){
        $(this).show();
        $("#hide").hide();
    });
    });
});

 </script> -->


