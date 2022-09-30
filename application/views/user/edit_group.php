<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/list_group'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>Groups Master List</a>
    </ol>
    <div class="page-header" style="text-align: left; padding: 0px;">
        <h4 style="color:#0000ff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><< CHANGE >></b></h4>
      </div>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Edit Groups</h1>
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
          <?php }elseif ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button><p><?php echo $this->session->flashdata('error'); ?></p>
            </div>
          <?php } ?>
          <div class="panel">
              <div class="panel-body container-fluid">
                <div class="row row-lg">
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">
                        <!-- <form class="form-horizontal"> -->
                          <?= form_open(base_url('backend/user/edit_group'),  'id="login_validation" enctype="multipart/form-data"') ?>

                          <input type="number" name="id" value="<?=$id?>" hidden="hidden">

                          <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Departement<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="departement" name="departement" data-placeholder="Select Departement" >
                                  <?php foreach ($get_dept as $val) { ?>
                                  <option <?php if($val->id == $get_group->id_assigned_opt){ echo 'selected="selected"'; } ?> value="<?=$val->id?>"><?=$val->name;?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Designation : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="designation" value="<?=$get_group->designation?>" placeholder="Designation" autocomplete="off"/>
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
                        
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Function<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" name="function" value="<?=$get_group->function?>" placeholder="function" autocomplete="off"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee Category<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" name="e_category" placeholder="F1/F2" value="<?=$get_group->e_category?>" autocomplete="off"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee Group : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="e_group" placeholder="G1/G2" value="<?=$get_group->e_group?>" autocomplete="off"/>
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
                      
                      <button type="Submit" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

                    </div>
                    <div class="col-lg-2 form-group form-material">
                      <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                    </div>
                    <?php form_close() ?>
                  <!-- Button Action -->
                </div>
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