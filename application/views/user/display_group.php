<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/list_group'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>Groups Master List</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Display Groups</h1>
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
                <div class="row row-lg">
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">
                        <!-- <form class="form-horizontal"> -->

                          <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Departement<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="departement" name="departement" data-placeholder="Select Departement" disabled="disabled">
                                  <?php foreach ($get_dept as $val) { ?>
                                  <option <?php if($val->id == $get_group->id_assigned_opt){ echo 'selected="selected"'; } ?> value="<?=$val->id?>"><?=$val->name;?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Designation<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" id="desig" name="designation" value="<?=$get_group->designation?>" placeholder="Designation" autocomplete="off" disabled="disabled"/>
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
                              <input type="text" required="required" class="form-control" value="<?=$get_group->function?>" placeholder="function" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee Category<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" placeholder="F1/F2" value="<?=$get_group->e_category?>" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee Group <b style="color: red;">*</b>: </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="employee_group" placeholder="G1/G2" value="<?=$get_group->e_group?>" autocomplete="off" disabled="disabled"/>
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
                      
                      <!-- <button type="Submit" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> -->

                    </div>
                    <div class="col-lg-2 form-group form-material">
                      <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                    </div>
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
