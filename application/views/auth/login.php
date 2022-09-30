
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Kementrian PPN/Bappenas</title>
    
    <link rel="apple-touch-icon" href="<?php echo base_url('src/material/global/assets/images/logo-bappenas.png');?>">
    <link rel="shortcut icon" href="<?php echo base_url('src/material/global/assets/images/logo-bappenas.png');?>">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/css/bootstrap-extend.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/assets/css/site.min.css');?>">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/animsition/animsition.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/asscrollable/asScrollable.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/switchery/switchery.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/intro-js/introjs.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/slidepanel/slidePanel.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/flag-icon-css/flag-icon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/vendor/waves/waves.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('src/material/global/assets/examples/css/pages/login.css');?>">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/fonts/material-design/material-design.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('src/material/global/fonts/brand-icons/brand-icons.min.css');?>">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="<?php echo base_url('src/material/global/vendor/breakpoints/breakpoints.js');?>"></script>
    <script>
      Breakpoints();
    </script>
  <style>
    .container {
      position: relative;
    }

    .topleft {
      position: absolute;
      top: 8px;
      left: 16px;
      font-size: 18px;
    }

    img { 
      width: 50%;
      height: auto;
    }
  </style>
  </head>
  <body class="animsition page-login layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle">
        <div class="brand">
          <!-- <div class="topleft">
            <img class="brand-img" src="<?php echo base_url('src/material/global/assets/images/logo-no-background.png');?>" alt="..."></div> -->

            <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon md-check" aria-hidden="true"></i> 
              <p style="color:white;"><?php echo $this->session->flashdata('success'); ?></p>
            </div>
          <?php }elseif ($this->session->flashdata('error')) { ?>
            <div class="alert dark alert-icon alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon md-alert-circle-o" aria-hidden="true"></i> 
              <p style="color:white;"><?php echo $this->session->flashdata('error'); ?></p>
            </div>
          <?php } ?>
          <style type="text/css">
            .bulat {
              border-radius: 100%;
              size: 60px;
            }
          </style>
          <h1 class="brand-text" style="font-size: 160%;"><b>Kementrian PPN/Bappenas</b></h1>
          <img class="brand-img bulat" src="<?php echo base_url('src/material/global/assets/images/logo-bappenas.png');?>" alt="..." style="height: 180px; width: 180px;">
          <h1 class="brand-text" style="font-size: 160%;"><b>Ticket Support</b></h1>
        </div>
        <!-- <p>Sign into your pages account</p> -->
        <?php echo form_open("auth/login");?>
        <!-- <form method="post" action="login.html"> -->
          <div id="infoMessage"><?php echo $message;?></div>
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <!-- <input type="text" class="form-control empty" id="inputName" name="name"> -->
           <!--  <label class="floating-label" for="inputName">Name</label> -->
           <label class="sr-only" for="inputEmail"><?php echo lang('login_identity_label', 'identity');?></label>
            <!-- <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"> -->
            <?php echo form_input($identity,'','class="form-control" placeholder="Email"');?>
          </div>
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <!-- <input type="email" class="form-control empty" id="inputEmail" name="email">
            <label class="floating-label" for="inputEmail">Email</label> -->
            <label class="sr-only" for="inputPassword"><?php echo lang('login_password_label', 'password');?></label>
            <!-- <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password"> -->
            <?php echo form_input($password,'','class="form-control" placeholder="Password"');?>
          </div>
         <!--  <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty" id="inputPassword" name="password">
            <label class="floating-label" for="inputPassword">Password</label>
          </div> -->
          <div class="form-group clearfix">
            <!-- <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              <label for="inputCheckbox">Remember me</label>
            </div> -->
            <a class="float-right" href="<?php echo base_url('auth/forgot_pass'); ?>">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        <!-- </form> -->
         <?php echo form_close();?>
        <!-- <p>Still no account? Please go to <a href="register.html">Register</a></p> -->

        <footer class="page-copyright page-copyright-inverse">
         <!--  <p>WEBSITE BY PT GIH</p>
          <p>© 2020. All RIGHT RESERVED.</p> -->
          <!-- <div class="social">
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-twitter" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-facebook" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-google-plus" aria-hidden="true"></i>
        </a>
          </div> -->
        </footer>
      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="<?php echo base_url('src/material/global/vendor/babel-external-helpers/babel-external-helpers.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/jquery/jquery.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/popper-js/umd/popper.min.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/bootstrap/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/animsition/animsition.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/mousewheel/jquery.mousewheel.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/asscrollbar/jquery-asScrollbar.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/asscrollable/jquery-asScrollable.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/waves/waves.js');?>"></script>
    
    <!-- Plugins -->
    <script src="<?php echo base_url('src/material/global/vendor/switchery/switchery.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/intro-js/intro.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/screenfull/screenfull.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/vendor/slidepanel/jquery-slidePanel.js');?>"></script>
        <script src="<?php echo base_url('src/material/global/vendor/jquery-placeholder/jquery.placeholder.js');?>"></script>
    
    <!-- Scripts -->
    <script src="<?php echo base_url('src/material/global/js/Component.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Plugin.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Base.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Config.js');?>"></script>
    
    <script src="<?php echo base_url('src/material/global/assets/js/Section/Menubar.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/assets/js/Section/Sidebar.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/assets/js/Section/PageAside.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/assets/js/Plugin/menu.js');?>"></script>
    
    <!-- Config -->
    <script src="<?php echo base_url('src/material/global/js/config/colors.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/assets/js/config/tour.js');?>"></script>
    <script>Config.set('assets', '<?php echo base_url('src/material/global/assets');?>');</script>
    
    <!-- Page -->
    <script src="<?php echo base_url('src/material/global/assets/js/Site.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Plugin/asscrollable.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Plugin/slidepanel.js"');?>></script>
    <script src="<?php echo base_url('src/material/global/js/Plugin/switchery.js');?>"></script>
        <script src="<?php echo base_url('src/material/global/js/Plugin/jquery-placeholder.js');?>"></script>
        <script src="<?php echo base_url('src/material/global/js/Plugin/material.js');?>"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
  </body>
</html>
