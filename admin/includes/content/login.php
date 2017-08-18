
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
                <div class="panel-heading">
                <img style="margin: auto;display: block;" width="50%" src="<?php echo $_PATH['root'] ?>/images/homelogo2.png" alt="">
                    <h3 class="text-center"> Sign In to <strong style="color: #666" class="text-custom">Cash Register</strong></h3>
                </div>


                <div class="panel-body">
                    <form class="form-horizontal m-t-20"  action="<?= $_PATH['formHandler'] ?>" method="post">

                        <input type="hidden" name="action" value="login" />
            <input type="hidden" name="guestAccessToken" value="<?= $_SESSION[$_SESSION_ID]['guestAccessToken'] ?>" />
            <div class="form-group has-feedback">
               <input type="email" class="form-control" placeholder="Email" name="mailId" required>
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               <input type="password" class="form-control" placeholder="Password" name="password" required>
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <input value="Sign In" id="Sign In" class="btn btn-inverse btn-block text-uppercase waves-effect waves-light"
                                        type="submit">
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    
        </div>
