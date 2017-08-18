<?php 
   $param = array();
   
   
   $param['conditionParam']['param']['id'] =$_SESSION[$_SESSION_ID]['admin']->id;
   $userDetails = $User->get_user_details($param)['data'];
   // echo '<pre>';print_r($userDetails);exit;
   
?>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?= $_PATH['root'] ?>" class="logo"><img width="60%" src="<?php echo $_PATH['root'] ?>/images/homelogo.png" alt=""></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button style="display: none;" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!-- <ul class="nav navbar-nav hidden-xs">
                                <li><a href="#" class="waves-effect waves-light">Files</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
 -->
                           <!--  <form role="search" class="navbar-left app-search pull-left hidden-xs">
                           <input type="text" placeholder="Search..." class="form-control">
                           <a href="#"><i class="fa fa-search"></i></a>
                      </form>
 -->

                            <ul class="nav navbar-nav navbar-right pull-right">
                               
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" title="Full Screen" class="waves-effect waves-light"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                                </li>
                               
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?=$userDetails->image ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="./?url=<?=base64_encode('admin') ?>&tab=<?=base64_encode('View') ?>"><i class="fa fa-user m-r-10 text-custom"></i> Profile</a></li>
                                        <!-- <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li> -->
                                        <li class="divider"></li>
                                        <li><a href="<?= $_PATH['formHandler'] ?>?action=logout"><i class="fa fa-sign-out m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <style type="text/css">
                .highcharts-credits{display: none;}
            </style>
             <style type="text/css">
                .highcharts-title{display: none;}
            </style>