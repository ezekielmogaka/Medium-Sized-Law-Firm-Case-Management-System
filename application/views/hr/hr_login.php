<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Wakili Case Management System | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- STYLESHEETS -->
    <!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/cloud-admin.css">
    <link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- UNIFORM -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/uniform/css/uniform.default.min.css" />
    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/animatecss/animate.min.css" />
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body class="login">
    <!-- PAGE -->
    <section id="page">
        <!-- HEADER -->
        <header>
            <!-- NAV-BAR -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div id="logo">
                            <a href="index.html"><img src="<?= base_url()?>assets/img/logo/logo1.png" height="100" alt="logo name" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/NAV-BAR -->
        </header>
        <!--/HEADER -->
        <!-- LOGIN -->
        <section id="login_bg" class="visible">
            <div class="container">
                <div class="row">
                    <?php
     $form_attributes = array('class'=>'form-signin');
     echo form_open('hr/hr_login', $form_attributes);

    ?>
                        <div class="col-md-4 col-md-offset-4">
                            <div class="login-box">
                                <?php
        if(isset($server_reply) && $server_reply!==null){
          echo $server_reply;
        }


        ?>
                                    <h2 class="bigintro">Wakili HR Sign In</h2>
                                    <div class="divide-40"></div>
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="hr_email">Hr Email address</label>
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" class="form-control" name="hr_email" required placeholder="Email" autofocus value="<?= set_value('hr_email')?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="hr_pass">Password</label>
                                            <i class="fa fa-lock"></i>
                                            <input type="password" class="form-control" name="hr_pass" placeholder="Password" required value="<?= set_value('hr_pass')?>">
                                        </div>
                                        <div>
                                            <label class="checkbox">
                                                <input type="checkbox" class="uniform" value=""> Remember me</label>
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </form>
                                    <div class="login-helpers">
                                        <a href="#" onclick="swapScreen('forgot_bg');return false;">Forgot Password?</a>
                                        <br> Don't have an account with us? <a href="#" onclick="swapScreen('register_bg');return false;">Register
										now!</a>
                                    </div>
                            </div>
                        </div>
                </div>
        </section>
        <!--/LOGIN -->
        <!-- REGISTER -->
        <section id="register_bg" class="font-400">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-box">
                            <h2 class="bigintro">Register</h2>
                            <div class="divide-40"></div>
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputName">Full Name</label>
                                    <i class="fa fa-font"></i>
                                    <input type="text" class="form-control" id="exampleInputName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername">Username</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" id="exampleInputUsername">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Repeat Password</label>
                                    <i class="fa fa-check-square-o"></i>
                                    <input type="password" class="form-control" id="exampleInputPassword2">
                                </div>
                                <div>
                                    <label class="checkbox">
                                        <input type="checkbox" class="uniform" value=""> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                                    <button type="submit" class="btn btn-success">Sign Up</button>
                                </div>
                            </form>
                            <!-- SOCIAL REGISTER -->
                            <div class="divide-20"></div>
                            <div class="center">
                                <strong>Or register using your social account</strong>
                            </div>
                            <div class="divide-20"></div>
                            <div class="social-login center">
                                <a class="btn btn-primary btn-lg">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="btn btn-info btn-lg">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="btn btn-danger btn-lg">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                            <!-- /SOCIAL REGISTER -->
                            <div class="login-helpers">
                                <a href="#" onclick="swapScreen('login_bg');return false;"> Back to Login</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/REGISTER -->
        <!-- FORGOT PASSWORD -->
        <section id="forgot_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-box">
                            <h2 class="bigintro">Reset Password</h2>
                            <div class="divide-40"></div>
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter your Email address</label>
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info">Send Me Reset Instructions</button>
                                </div>
                            </form>
                            <div class="login-helpers">
                                <a href="#" onclick="swapScreen('login_bg');return false;">Back to Login</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FORGOT PASSWORD -->
    </section>
    <!--/PAGE -->
    <!-- JAVASCRIPTS -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- JQUERY -->
    <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
    <!-- JQUERY UI-->
    <script src="<?= base_url()?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="<?= base_url()?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
    <!-- UNIFORM -->
    <script type="text/javascript" src="<?= base_url()?>assets/js/uniform/jquery.uniform.min.js"></script>
    <!-- BACKSTRETCH -->
    <script type="text/javascript" src="<?= base_url()?>assets/js/backstretch/jquery.backstretch.min.js"></script>
    <!-- CUSTOM SCRIPT -->
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script>
    jQuery(document).ready(function() {
        App.setPage("login_bg"); //Set current page
        App.init(); //Initialise plugins and elements
    });
    </script>
    <script type="text/javascript">
    function swapScreen(id) {
        jQuery('.visible').removeClass('visible animated fadeInUp');
        jQuery('#' + id).addClass('visible animated fadeInUp');
    }
    </script>
    <!-- /JAVASCRIPTS -->
</body>

</html>