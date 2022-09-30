
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Kementrian PPN/Bappenas</title>
    
    <link rel="apple-touch-icon" href="<?php echo base_url('src/material/global/assets/images/logo-no-background.png');?>">
    <link rel="shortcut icon" href="<?php echo base_url('src/material/global/assets/images/logo-no-background.png');?>">
    
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
        <link rel="stylesheet" href="<?php echo base_url('src/material/global/assets/examples/css/pages/forgot-password.css');?>">
    
    
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
  </head>
  <body class="animsition page-forgot-password layout-full">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle">

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

        <h1 style="color: #005ce6;"><b>Kementrian PPN/Bappenas</b></h1>
        <h4><b>Forgot Your Password ?</b></h4>
        <p><b>Input your email</b></p>

        <!-- <form method="post" role="form" autocomplete="off"> -->
        <?php echo form_open("auth/code_send_email");?>
          <div class="form-group form floating" data-plugin="formMaterial">
            <input type="email" class="form-control empty" id="inputEmail" name="email" placeholder="@gmail.com">
            <!-- <label class="floating-label" for="inputEmail">Your Email</label> -->
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        <?php echo form_close();?>
        <!-- </form> -->

        <footer class="page-copyright">
          <!-- <p>WEBSITE BY Creation Studio</p> -->
          <p>© <?=date("Y")?>. Kementrian PPN/Bappenas</p>
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
    <script src="<?php echo base_url('src/material/global/js/Plugin/slidepanel.js');?>"></script>
    <script src="<?php echo base_url('src/material/global/js/Plugin/switchery.js');?>"></script>
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
