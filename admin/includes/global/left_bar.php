
            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                         <!--   <li class="text-muted menu-title">Navigation</li> -->
                          <!--start manage Dashboard -->
                             <li class="treeview " >
                                <a href="#" id="manage_dashboard">
                               <img src="<?= $_PATH['root']?>/assets/images/dashboad.png" style="height: 20px;width: 12%;"> 
                                <span class="left-c-5" style=" padding-left: 8%;">Dashboard</span> 
                                </a>
                                <ul class="treeview-menu">
                                   <li><a href="./?url=<?=base64_encode('dashboard') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                                </ul>
                             </li>
                             <!--end manage Dashboard -->
                             <!--start manage Configuration -->
                             <li class="treeview ">
                                <a href="#" id="manage_configuration">
                                <img src="<?= $_PATH['root']?>/assets/images/control-panel.png" style="height: 20px;width: 12%;"> 
                                 <span class="left-c-5" style=" padding-left: 8%;">Control Panel </span> 
                                </a>
                                <ul class="treeview-menu">
                                   <li><a href="./?url=<?=base64_encode('configuration') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Configuration</a></li>
                                </ul>
                             </li>
                             <!--end manage Configuration -->

                             <!--start manage user --> 
                             <li class="treeview">
                                <a href="#" id="manage_users">
                                <i class="fa fa-users left-c-5" aria-hidden="true"></i>
                                <span class="left-c-5">Manage Users</span> 
                                </a>
                                <ul class="treeview-menu">
                                   <li id="users_uni"><a href="./?url=<?=base64_encode('user') ?>&tab=<?=base64_encode('View') ?>"  ><i class="fa fa-circle-o"></i>users</a></li>
                                </ul>
                             </li>
                             <!--end manage user -->  

                              <!--start manage customer --> 
                             <li class="treeview">
                                <a href="#" id="manage_customers">
                                <img src="<?= $_PATH['root']?>/assets/images/customer.png" style=" padding-right: 5%; height: 27px;width: 18%;"> 
                                <span class="left-c-5" style=" padding-left: 2%;">Manage Customers</span> 
                                </a>
                                <ul class="treeview-menu">
                                   <li><a href="./?url=<?=base64_encode('customer') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Customers</a></li>
                                </ul>
                             </li>
                             <!--end manage customer -->

                             <!--start manage Report --> 
                             <li class="treeview">
                                <a href="#" id="manage_reports">
                                <img src="<?= $_PATH['root']?>/assets/images/report.png" style="height: 20px;width: 12%;"> 
                                <span class="left-c-5" style=" padding-left: 8%;">Manage Reports</span> 
                                </a>
                                <ul class="treeview-menu">
                                   <li><a href="./?url=<?=base64_encode('salesreports') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Sales Reports</a></li>
                                   <li><a href="./?url=<?=base64_encode('customerReport') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Customer Report</a></li>
                                   <li><a href="./?url=<?=base64_encode('paymentReport') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-circle-o"></i>Sale By Payment</a></li>
                                   
                                </ul>
                             </li>
                             <!--end manage Report -->  



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <style type="text/css">
             
            </style>
          