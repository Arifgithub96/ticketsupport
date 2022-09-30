<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/master_menu'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>Menu Master List</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <!-- <h1 class="page-title">Create Menu</h1> -->
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid" style="padding: 0px;">
          <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button><p><?php echo $this->session->flashdata('success'); ?></p>
            </div>
          <?php } ?>
          <div class="panel">
              <div class="panel-body container-fluid">
                
                <?php if ($id == 0) { ?>
                  <header class="panel-heading" style="text-align: center;">
                    <h3>Update Menu Level 0</h3>
                  </header>
                  <div class="row row-lg">
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->
                          <?= form_open(base_url('backend/user/save_edit_menu'),  'id="login_validation" enctype="multipart/form-data"') ?>
                            <input type="hidden" name="menu_level" value="0">
                            <input type="hidden" name="id_menu" value="<?=$id_menu;?>">
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name Menu<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_name" value="<?=$get_detail_menu->menu_name?>" placeholder="Name Menu" autocomplete="off"/>                            
                              </div>
                            </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <div class="col-md-12 col-lg-6">
                      
                    </div>
                    <!-- Button Action -->
                      <div class="col-lg-5 form-group form-material">
                          <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <div class="col-lg-5 form-group form-material">
                        
                        <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

                      </div>
                      <div class="col-lg-2 form-group form-material">
                        <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <?php form_close() ?>
                    <!-- Button Action -->
                  </div>
                <?php } ?>

                <?php if ($id == 1) { ?>
                  <header class="panel-heading" style="text-align: center;">
                    <h3>Update Menu Level 1</h3>
                  </header>
                  <div class="row row-lg">
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->
                          <?= form_open(base_url('backend/user/save_edit_menu'),  'id="login_validation" enctype="multipart/form-data"') ?>
                            <input type="hidden" name="menu_level" value="1">
                            <input type="hidden" name="id_menu" value="<?=$id_menu;?>">
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name Menu<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_name" value="<?=$get_detail_menu->menu_name?>" placeholder="Name Menu" autocomplete="off"/>                            
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name URL<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_url" value="<?=$get_detail_menu->menu_url?>" placeholder="Name URL" autocomplete="off"/>                            
                              </div>
                            </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->

                           <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Menu Parent Level 0<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="menu_parent" name="menu_parent" data-placeholder="Menu Parent" >
                                  <?php foreach ($menu_nul as $val) { ?>
                                    <option <?php if($val->id_menu == $get_detail_menu->menu_parent){ echo 'selected="selected"'; } ?> value="<?=$val->id_menu?>"><?=$val->menu_name?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <!-- Button Action -->
                      <div class="col-lg-5 form-group form-material">
                          <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <div class="col-lg-5 form-group form-material">
                        
                        <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

                      </div>
                      <div class="col-lg-2 form-group form-material">
                        <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <?php form_close() ?>
                    <!-- Button Action -->
                  </div>
                <?php } ?>
                
                <?php if ($id == 2) { ?>
                  <header class="panel-heading" style="text-align: center;">
                    <h3>Update Menu Level 2</h3>
                  </header>
                  <div class="row row-lg">
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->
                          <?= form_open(base_url('backend/user/save_edit_menu'),  'id="login_validation" enctype="multipart/form-data"') ?>
                            <input type="hidden" name="menu_level" value="2">
                            <input type="hidden" name="id_menu" value="<?=$id_menu;?>">
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name Menu<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_name" value="<?=$get_detail_menu->menu_name?>" placeholder="Name Menu" autocomplete="off"/>                            
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name URL<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_url" value="<?=$get_detail_menu->menu_url?>" placeholder="Name URL" autocomplete="off"/>                            
                              </div>
                            </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->

                           <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Menu Parent Level 1<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="menu_parent" name="menu_parent" data-placeholder="Menu Parent" >
                                  <!-- <option value="">Pilih..</option> -->
                                  <?php foreach ($menu_satu as $val) { ?>
                                    <option <?php if($val->id_menu == $get_detail_menu->menu_parent){ echo 'selected="selected"'; } ?> value="<?=$val->id_menu?>"><?=$val->menu_name?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <!-- Button Action -->
                      <div class="col-lg-5 form-group form-material">
                          <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <div class="col-lg-5 form-group form-material">
                        
                        <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

                      </div>
                      <div class="col-lg-2 form-group form-material">
                        <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <?php form_close() ?>
                    <!-- Button Action -->
                  </div>
                <?php } ?>

                <?php if ($id == 3) { ?>
                  <header class="panel-heading" style="text-align: center;">
                    <h3>Update Menu Level 3</h3>
                  </header>
                  <div class="row row-lg">
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->
                          <?= form_open(base_url('backend/user/save_edit_menu'),  'id="login_validation" enctype="multipart/form-data"') ?>
                            <input type="hidden" name="menu_level" value="3">
                            <input type="hidden" name="id_menu" value="<?=$id_menu;?>">
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name Menu<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_name" value="<?=$get_detail_menu->menu_name?>" placeholder="Name Menu" autocomplete="off"/>                            
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"><b>Name URL<b style="color: red;">*</b> : </b></label>
                              <div class="col-md-9">
                                <input type="text" required="required" class="form-control" name="menu_url" value="<?=$get_detail_menu->menu_url?>" placeholder="Name URL" autocomplete="off"/>                            
                              </div>
                            </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <div class="col-md-12 col-lg-6">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <div class="example">
                          <!-- <form class="form-horizontal"> -->

                           <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Menu Parent Level 2<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="menu_parent" name="menu_parent" data-placeholder="Menu Parent" >
                                  <?php foreach ($menu_dua as $val) { ?>
                                    <option <?php if($val->id_menu == $get_detail_menu->menu_parent){ echo 'selected="selected"'; } ?> value="<?=$val->id_menu?>"><?=$val->menu_name?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- End Example Horizontal Form -->
                    </div>
                    <!-- Button Action -->
                      <div class="col-lg-5 form-group form-material">
                          <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <div class="col-lg-5 form-group form-material">
                        
                        <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

                      </div>
                      <div class="col-lg-2 form-group form-material">
                        <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                      </div>
                      <?php form_close() ?>
                    <!-- Button Action -->
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->
    <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }

        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

    <script>
      $("#desig").on({
       keydown: function(e) {
         if (e.which === 32)
           return false;
        },
        keyup: function(){
         this.value = this.value.toLowerCase();
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
          
        }
      });
    </script>