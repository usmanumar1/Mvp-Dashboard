<!DOCTYPE html>
<html lang="en">
    <head>


        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <!--<title><?php echo $title; ?></title>-->

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/css/ace.min.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo base_url(); ?>assets1/assets/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url(); ?>assets1/assets/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="login-layout">
        <div class="main-container">
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">';
                echo ' <strong>Failure....</strong>' . "     " . $this->session->message;
                echo '</div>';
            }
            ?>

            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <img src="<?php echo base_url() ?>main_logo.png" style="margin-top: 20px;" width="50%" height="50%">
                                <!-- <h1>
                                
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red">Rah-e-</span>
                                <span class="white" id="id-text2">Maa</span>
                                </h1>-->

                                <h4 class="blue" id="id-company-text" style="margin-left: -15px;">&copy; CSALT</h4>
                            </div>

                            <div class="space-6"></div>
                          
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body" style="margin-top: 20px;" >
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-reddit green"></i>
                                                Congratulations! You Have Successfully Reset Your <?php echo $title ; ?>.
                                            </h4>

                                           

                                        </div><!-- /.widget-main -->

                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->


                            </div><!-- /.position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="<?php echo base_url(); ?>assets1/assets/js/jquery.2.1.1.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="<?php echo base_url(); ?>assets1/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {
                $(document).on('click', '.toolbar a[data-target]', function (e) {
                    e.preventDefault();
                    var target = $(this).data('target');
                    $('.widget-box.visible').removeClass('visible');//hide others
                    $(target).addClass('visible');//show target
                });
            });



            //you don't need this, just used for changing background
            jQuery(function ($) {
//			 $('#btn-login-dark').on('click', function(e) {
//				$('body').attr('class', 'login-layout');
//				$('#id-text2').attr('class', 'white');
//				$('#id-company-text').attr('class', 'blue');
//				
//				e.preventDefault();
//			 });
//			 $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');

//				e.preventDefault();
//			 });
//			 $('#btn-login-blur').on('click', function(e) {
//				$('body').attr('class', 'login-layout blur-login');
//				$('#id-text2').attr('class', 'white');
//				$('#id-company-text').attr('class', 'light-blue');
//				
//				e.preventDefault();
//			 });

            });
        </script>
    </body>
</html>
