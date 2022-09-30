 <!-- Page -->
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <!-- <a href="<?php echo base_url('backend/admdashboard'); ?>" style="background-color: #ff0066; color: white;" type="button" class="btn btn-round"><i class="icon md-home" aria-hidden="true"></i>Home</a> -->
          <a href="<?php echo base_url('backend/admdashboard'); ?>" type="button" class="btn btn-round btn-primary"><i class="icon md-home" aria-hidden="true"></i>Home</a>
        </ol>
      </div>
      <div class="page-content container-fluid">
        <h1 class="panel-title" style="text-align: center; padding: 0px;"><b>AUTORIZATION MENU</b></h1>
        <div class="row" data-plugin="matchHeight" data-by-row="true">

          <nav class="circular-menu">

            <div class="circle">
              <?php if(check_permission_view(ID_GROUP,'read','user')) { ?>
                <a href="<?php echo base_url('backend/user/list_user') ?>" class="icon md-account-circle fa-3x"><br><h5 style="color:red;"><b>Users</b></h5></a>
              <?php } ?>

              <?php if(check_permission_view(ID_GROUP,'read','group')) { ?>
                <a href="<?php echo base_url('backend/user/list_group') ?>" class="icon md-accounts-alt fa-3x"><h5 style="color:red;"><b>Group</b></h5></a>
              <?php } ?>

              <?php if(check_permission_view(ID_GROUP,'read','menu')) { ?>
                <a href="<?php echo base_url('backend/user/master_menu') ?>" class="icon md-format-indent-increase fa-3x"><h5 style="color:red;">Menu</b></h5></a>
              <?php } ?>
            </div>
            
            <a href="" style="color:white;" class="menu-button md-menu fa-4x"><br><h5 style="color:#3f51b5;"><b>Click Menu</b></h5></a>
            <!-- color:#26c6da; border-color: #26c6da; -->
          </nav>

        </div>
      </div>
    </div>
<!-- End Page -->

<style type="text/css">
  /* Demo by http://creative-punch.net */

  @import "<?php echo base_url('src/material/global/css/font-awesome.css');?>";

  body {
    /*background: #39D;*/
  }

  .circular-menu {
    width: 400px;
    height: 400px;
    margin: 0 auto;
    position: relative;
  }

  .circle {
    width: 400px;
    height: 400px;
    opacity: 0;
    
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    transform: scale(0);

    -webkit-transition: all 0.4s ease-out;
    -moz-transition: all 0.4s ease-out;
    transition: all 0.4s ease-out;
  }

  .open.circle {
    opacity: 1;

    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    transform: scale(1);
  }

  .circle a {
    text-decoration: none;
    color: white;
    display: block;
    height: 50px;
    width: 50px;
    line-height: 50px;
    margin-left: -20px;
    margin-top: -20px;
    position: absolute;
    text-align: center;
    border-radius: 50%;
    background-color: red;

  }

  .circle a:hover {
    background-color: #3f51b5;
  }

  .menu-button {
    position: absolute;
    top: calc(50% - 30px);
    left: calc(50% - 30px);
    text-decoration: none;
    text-align: center;
    color: #444;
    border-radius: 50%;
    display: block;
    height: 40px;
    width: 40px;
    line-height: 40px;
    padding: 10px;
    /*background: #dde;*/
    line-height: 70px;
     width: 90px;
      height: 90px;
      background: #3f51b5;
      border-radius: 90%
  }

  .menu-button:hover {
    background-color: #eef;
    line-height: 70px;
     width: 90px;
      height: 90px;
      background: red;
      border-radius: 90%
  }

  /* Author stuff */
  h1.author {
    text-align:center;
    color: white;
    font-family: Helvetica, Arial, sans-serif;
    font-weight: 300;
  }

  h1.author a {
    color: #348;
    text-decoration:none;
  }

  h1.author a:hover {
    color: #ddd;
  } 
</style>

<script type="text/javascript">
  // Demo by http://creative-punch.net

  var items = document.querySelectorAll('.circle a');

  for(var i = 0, l = items.length; i < l; i++) {
    items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
    
    items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
  }

  document.querySelector('.menu-button').onclick = function(e) {
     e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
  }
</script>