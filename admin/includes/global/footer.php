<?php 
        $currentDate = date("Y-m-d",time());

        $notificationArr = array();

        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate."%";
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  'LIKE ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['roleId'] = 2;
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' = ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['status'] = 1;
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $todayuserList = $User->get_user_list($param)['data'];
        //print_r($userList);//exit;
        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate."%";
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  'LIKE ';
        $param['conditionParam']['condition'][] = $condition;
        $todaycustomerList = $Customer->get_customer_list($param)['data'];
        //print_r($customerList);//exit;
        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate."%";
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  'LIKE ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['isConfirmed'] = 1;
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' = ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['status'] = 1;
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $todayorderList = $Order->get_order_list($param)['data'];
        //print_r($orderList);//exit;
?>       <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
<?php 
   $param = array();
   $param['conditionParam']['param']['roleId'] = 2;
   $param['conditionParam']['param']['status'] = 1;
   $userlist = $User->get_user_list($param)['data'];
   //print_r($userlist);exit;
   $param = array();
   $param['conditionParam']['param']['status'] = 1;
   $customerlist = $Customer->get_customer_list($param)['data'];
   $param = array();
   $param['conditionParam']['param']['isConfirmed'] = 1;
   $param['conditionParam']['param']['status'] = 1;
   $orderlist = $Order->get_order_list($param)['data'];
   $totalamount=0;
   foreach ($orderlist as $key => $value) {
            $totalamount = $totalamount + $value['totalPrice'];
   }
   ?>

            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="<?= $_PATH['assets'] ?>/custom-js/ajax.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
      
               

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

                 $('.datepicker').datepicker({
   
                 format: "yyyy-mm-dd"
   
             });  

            });
        </script>
<!-- 
        datatable -->


<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>



        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        

<script src="assets/pages/datatables.init.js"></script>


<!-- for charts -->

      <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        
        <script src="assets/pages/jquery.dashboard_3.js"></script>
<!-- for charts -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $( ".datepicker" ).datepicker({ 
  dateFormat: 'yy-mm-dd',
  constrainInput: false
});

  </script>



<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        /*$('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        })*/;
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>

<!-- datatables -->



    </body>

<!-- Mirrored from coderthemes.com/ubold_2.2/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2017 13:18:00 GMT -->
</html>
<script type="text/javascript">
    Highcharts.chart('container', {
             chart: {
                 plotBackgroundColor: null,
                 plotBorderWidth: null,
                 plotShadow: false,
                 type : 'pie'
             },
             // title: {
             //     text: ' E-Recharges '
             // },
             tooltip: {
                
             },
             plotOptions: {
                 pie: {
                     allowPointSelect: true,
                     cursor: 'pointer',
                     dataLabels: {
                         enabled: false
                     },
                     showInLegend: true
                 }
             },
             series: [{
                 name: 'Total',
                 colorByPoint: true,
                 data: [{
            name: 'Users',
            y: <?php echo count($todayuserList) ?>
            }, {
            name: 'Orders',
            y:<?php echo count($todayorderList) ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Customers',
            y:<?php echo count($todaycustomerList) ?>
        }]
    }]
});
</script>

<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-01-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $januarylist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-02-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $februarylist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-03-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $marchlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-04-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $aprillist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-05-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $maylist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-06-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $junelist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-07-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $julylist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-08-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $augustlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-09-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $septemberlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-10-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $octoberlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-11-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $nevemberlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-12-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $decemberlist = $Order->get_order_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>

   <?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-01-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $junuaryuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-02-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $februaryuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-03-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $marchuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-04-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $apriluserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-05-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $mayuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-06-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $juneuserlist = $User->get_user_list($param)['data'];
  //echo '<pre>';print_r($juneuserlist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-07-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $julyuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-08-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $augustuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-09-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $septemberuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-10-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $octoberuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-11-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $nevemberuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-12-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $decemberuserlist = $User->get_user_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<!-- end user -->

   <?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-01-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $junuarycustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-02-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $februarycustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-03-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $marchcustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-04-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $aprilcustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-05-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $maycustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-06-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $junecustomerlist = $Customer->get_customer_list($param)['data'];
  //echo '<pre>';print_r($junecustomerlist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-07-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $julycustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-08-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $augustcustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-09-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $septembercustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-10-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $octobercustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-11-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $nevembercustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>
<?php 
   $param = array();
                    $param['conditionParam']['conditionType'] = 'aggregate';
                    $param['conditionParam']['condition'] = array();
                    $condition = array();
                    $condition['param']['createdOn'] = '%-12-%';
                    $condition['clauseOperator'] =  ' OR ';
                    $condition['fieldOperator'] =  ' LIKE ';
                    $param['conditionParam']['condition'][] = $condition;
   
   
   $decembercustomerlist = $Customer->get_customer_list($param)['data'];
   //echo '<pre>';print_r($januarylist); exit;
   ?>



<script type="text/javascript">
   Highcharts.chart('container2', {
    chart: {
        type: 'area'
    },
    // title: {
    //     text: 'Historic and Estimated Worldwide Population Growth by Region'
    // },
    // subtitle: {
    //     text: 'Source: Wikipedia.org'
    // },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
       
        labels: {
            formatter: function () {
               // return this.value / 1000;    //jagpal
            }
        }
    },
    
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Users',
        data: [<?php echo count($junuaryuserlist) ?>,
             <?php echo count($februaryuserlist) ?>, 
             <?php echo count($marchuserlist) ?>, 
             <?php echo count($apriluserlist) ?>, 
             <?php echo count($mayuserlist) ?>, 
             <?php echo count($juneuserlist) ?>, 
             <?php echo count($julyuserlist) ?>, 
             <?php echo count($augustuserlist) ?>, 
             <?php echo count($septemberuserlist) ?>, 
             <?php echo count($octoberuserlist) ?>, 
             <?php echo count($nevemberuserlist) ?>, 
             <?php echo count($decemberuserlist) ?>]
    }, {
        name: 'Orders',
        data: [<?php echo count($januarylist) ?>, 
             <?php echo count($februarylist) ?>, 
             <?php echo count($marchlist) ?>, 
             <?php echo count($aprillist) ?>,
             <?php echo count($maylist) ?>, 
             <?php echo count($junelist) ?>, 
             <?php echo count($julylist) ?>, 
             <?php echo count($augustlist) ?>, 
             <?php echo count($septemberlist) ?>, 
             <?php echo count($octoberlist) ?>, 
             <?php echo count($nevemberlist) ?>, 
             <?php echo count($decemberlist) ?>]
    }, {
        name: 'Customers',
        data: [<?php echo count($junuarycustomerlist) ?>,
              <?php echo count($februarycustomerlist) ?>, 
              <?php echo count($marchcustomerlist) ?>, 
              <?php echo count($aprilcustomerlist) ?>, 
              <?php echo count($maycustomerlist) ?>, 
              <?php echo count($junecustomerlist) ?>, 
              <?php echo count($julycustomerlist) ?>, 
              <?php echo count($augustcustomerlist) ?>, 
              <?php echo count($septembercustomerlist) ?>, 
              <?php echo count($octobercustomerlist) ?>, 
              <?php echo count($nevembercustomerlist) ?>, 
              <?php echo count($decembercustomerlist) ?>]
   
    }]
});

</script>

<?php
 
       $date= date('Y-m-d', strtotime('last Monday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserMonday = $User->get_user_list($param)['data'];

       //print_r($UserMonday);//exit;


       $date= date('Y-m-d', strtotime('last Tuesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserTuesday = $User->get_user_list($param)['data'];
       //print_r($UserTuesday);//exit;

       $date= date('Y-m-d', strtotime('last Wednesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserWednesday = $User->get_user_list($param)['data'];
      // echo "<pre>"; print_r($UserWednesday);



       $date= date('Y-m-d', strtotime('last Thursday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserThursday = $User->get_user_list($param)['data'];

       //echo "<pre>"; print_r($UserThursday);

       $date= date('Y-m-d', strtotime('last Friday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserFriday = $User->get_user_list($param)['data'];



       $date= date('Y-m-d', strtotime('last Saturday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserSaturday = $User->get_user_list($param)['data'];



       $date= date('Y-m-d', strtotime('last Sunday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $UserSunday = $User->get_user_list($param)['data'];


?>
<!--end user chart-->

<!--start order chart-->

<?php


       $date= date('Y-m-d', strtotime('last Monday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $OrderMonday = $Order->get_order_list($param)['data'];

      //print_r($Monday);exit;


       $date= date('Y-m-d', strtotime('last Tuesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $OrderTuesday = $Order->get_order_list($param)['data'];


       $date= date('Y-m-d', strtotime('last Wednesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $OrderWednesday = $Order->get_order_list($param)['data'];



        $date= date('Y-m-d', strtotime('last Thursday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $OrderThursday = $Order->get_order_list($param)['data'];



       $date= date('Y-m-d', strtotime('last Friday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
             
       $OrderFriday = $Order->get_order_list($param)['data'];



      $date= date('Y-m-d', strtotime('last Saturday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $OrderSaturday = $Order->get_order_list($param)['data'];



        $date= date('Y-m-d', strtotime('last Sunday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
             
       $OrderSunday = $Order->get_order_list($param)['data'];


?>

<!--end   order chart-->

<!--start order chart-->

<?php


 $date= date('Y-m-d', strtotime('last Monday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerMonday = $Customer->get_customer_list($param)['data'];

      //print_r($CustomerMonday);exit;


        $date= date('Y-m-d', strtotime('last Tuesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerTuesday = $Customer->get_customer_list($param)['data'];


       $date= date('Y-m-d', strtotime('last Wednesday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerWednesday = $Customer->get_customer_list($param)['data'];



       
        $date= date('Y-m-d', strtotime('last Thursday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerThursday = $Customer->get_customer_list($param)['data'];



       $date= date('Y-m-d', strtotime('last Friday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerFriday = $Customer->get_customer_list($param)['data'];



      $date= date('Y-m-d', strtotime('last Saturday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;

             
       $CustomerSaturday = $Customer->get_customer_list($param)['data'];



        $date= date('Y-m-d', strtotime('last Sunday'));
     
       $param = array();
       $param['conditionParam']['conditionType'] = 'aggregate';
       $param['conditionParam']['condition'] = array();
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 00:00:00';
       $condition['fieldOperator'] =  ' >= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
       $condition = array();
       $condition['param']['createdOn'] =  $date.' 23:59:59';
       $condition['fieldOperator'] =  ' <= ';
       $condition['clauseOperator'] =  ' AND ';
       $param['conditionParam']['condition'][] = $condition;
             
       $CustomerSunday = $Customer->get_customer_list($param)['data'];

?>

<?php 

        
        $updatedHour1 = strtotime("-1 day");
        $currentDate = date("Y-m-d", $updatedHour1);
        $updatedHour = strtotime("-1 week"); 
        $updatedDate = date("Y-m-d", $updatedHour);
        //print_r($updatedDate);

        $notificationArr = array();

        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate.' 23:59:59';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' <= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['createdOn'] = $updatedDate.' 00:00:00';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' >= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['status'] = 1;    
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $CustomerweeklyReport = $Customer->get_customer_list($param)['data'];
        //print_r($CustomerweeklyReport);
?>
<?php
        $updatedHour1 = strtotime("-1 day");
        $currentDate = date("Y-m-d", $updatedHour1);
        $updatedHour = strtotime("-1 week"); 
        $updatedDate = date("Y-m-d", $updatedHour);
        //print_r($updatedDate);

        $notificationArr = array();

        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate.' 23:59:59';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' <= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['createdOn'] = $updatedDate.' 00:00:00';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' >= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['status'] = 1;    
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['isConfirmed'] = 1;    
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $OrderweeklyReport =  $Order->get_order_list($param)['data'];
       

?>

<?php
        $updatedHour1 = strtotime("-1 day");
        $currentDate = date("Y-m-d", $updatedHour1);
        $updatedHour = strtotime("-1 week"); 
        $updatedDate = date("Y-m-d", $updatedHour);
        

        $notificationArr = array();

        $param = array();
        $param['conditionParam']['conditionType'] = 'aggregate';
        $param['conditionParam']['condition'] = array();
        $condition = array();
        $condition['param']['createdOn'] = $currentDate.' 23:59:59';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' <= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['createdOn'] = $updatedDate.' 00:00:00';
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  ' >= ';
        $param['conditionParam']['condition'][] = $condition;
        $condition = array();
        $condition['param']['status'] = 1;    
        $condition['clauseOperator'] =  ' AND ';
        $condition['fieldOperator'] =  '=';
        $param['conditionParam']['condition'][] = $condition;
        $UserweeklyReport = $User->get_user_list($param)['data'];
        

?>

<script type="text/javascript">
    Highcharts.chart('container3', {
    title: {
        text: 'Combination chart'
    },
    xAxis: {
        categories: [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
    },
    labels: {
        items: [{
            html: 'Total Weekly Records',
            style: {
                left: '50px',
                top: '18px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
            }
        }]
    },
    series: [{
        type: 'column',
        name: 'Users',
        data: [<?php echo count($UserMonday)?>,<?php echo count($UserTuesday)?>,<?php echo count($UserWednesday)?>,<?php echo count($UserThursday)?>,<?php echo count($UserFriday)?>,<?php echo count($UserSaturday)?>,<?php echo count($UserSunday)?>]
    }, {
        type: 'column',
        name: 'Orders',
        data: [<?php echo count($OrderMonday)?>,<?php echo count($OrderTuesday)?>,<?php echo count($OrderWednesday)?>,<?php echo count($OrderThursday)?>,<?php echo count($OrderFriday)?>,<?php echo count($OrderSaturday)?>,<?php echo count($OrderSunday)?>]
    }, {
        type: 'column',
        name: 'Customers',
        data: [<?php echo count($CustomerMonday)?>,<?php echo count($CustomerTuesday)?>,<?php echo count($CustomerWednesday)?>,<?php echo count($CustomerThursday)?>,<?php echo count($CustomerFriday)?>,<?php echo count($CustomerSaturday)?>,<?php echo count($CustomerSunday)?>]
    }, {
        type: 'pie',
        name: 'Total',
        data: [{
            name: 'Users',
            y: <?php echo count($UserweeklyReport)?>,
            color: Highcharts.getOptions().colors[0] // Jane's color
        }, {
            name: 'Orders',
            y: <?php echo count($OrderweeklyReport)?>,
            color: Highcharts.getOptions().colors[1] // John's color
        }, {
            name: 'Customers',
            y: <?php echo count($CustomerweeklyReport)?>,
            color: Highcharts.getOptions().colors[2] // Joe's color
        }],
        center: [100, 80],
        size: 100,
        showInLegend: false,
        dataLabels: {
            enabled: false
        }
    }]
});


</script>