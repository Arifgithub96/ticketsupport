<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/list_user'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>User Master List</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Create User</h1>
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid" style="padding: 0px;">
          <?php if ($this->session->flashdata('error')) { ?>
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
                          <?= form_open(base_url('backend/user/save_user'),  'id="login_validation" enctype="multipart/form-data"') ?>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee No.<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" name="employee_no" placeholder="xx - xx" onkeypress="return hanyaAngka(event)" maxlength="10" autocomplete="off"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Name<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" name="first_name" placeholder="First Name" autocomplete="off"/>
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Last Name : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="last_name" placeholder="Last Name" autocomplete="off"/>
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Email<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="email" required="required" class="form-control" name="email" placeholder="@asiagalaxy.com" autocomplete="off"/>
                            </div>
                          </div>
                          <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">User Autorization<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="id_group" name="id_group" data-placeholder="Select Departement" >
                                  <option></option>
                                  <?php foreach ($get_dept as $val) { ?>
                                  <option value="<?=$val->id;?>">Dept : [ <?=$val->description;?> ] - Group : ( <?=$val->group;?> )</option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row form row">
                            <label class="col-md-3 form-control-label"><b>Address : </b></label>
                            <div class="col-md-9">
                              <textarea class="maxlength-textarea form-control" data-plugin="maxlength" data-placement="bottom-right-inside" maxlength="100" name="address" rows="2" placeholder="Address"></textarea>
                            </div>
                          </div>
                          <!-- <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Position : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="position" name="position" data-placeholder="Select Position" >
                                  <option></option>
                                  <option value="1">Position 1</option>
                                  <option value="2">Position 2</option>
                                  <option value="3">Position 3</option>
                                  <option value="4">Position 4</option>
                                  <option value="5">Position 5</option>
                                  <option value="6">Position 6</option>
                              </select>
                            </div>
                          </div> -->
                          <!-- <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">Level : </label>
                            <div class="col-md-9">
                             <select class="form-control" required="required" data-plugin="select2" id="level" name="level" data-placeholder="Select Level" >
                                  <option></option>
                                  <option value="1">Level 1</option>
                                  <option value="2">Level 2</option>
                                  <option value="3">Level 3</option>
                                  <option value="4">Level 4</option>
                                  <option value="5">Level 5</option>
                                  <option value="6">Level 6</option>
                              </select>
                            </div>
                          </div> -->
                      </div>
                    </div>
                    <!-- End Example Horizontal Form -->
                  </div>
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">
                        <!-- <form class="form-horizontal"> -->
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Birthday :</b></label>
                            <div class="col-md-9">
                              <input type="date" class="form-control" name="birthday" autocomplete="off" />
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Gender : </b></label>
                            <div class="col-md-9">
                            <select class="form-control" data-plugin="select2" id="gender" name="gender" data-placeholder="Select Gender" >
                                  <option></option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Phone No. : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="phone_no" placeholder="+62 xxx - xxxx - xxxx" onkeypress="return hanyaAngka(event)" autocomplete="off"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Password<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="password" required="required" class="form-control" name="password" autocomplete="off" id="password"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Confirm Password<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="password" required="required" class="form-control" name="confirm_password" autocomplete="off" id="confirm_password"/>
                            </div>
                          </div>
                          <div class="form-group row  row">
                            <label class="col-md-3 form-control-label"><b>Photo Profile : </b></label>
                            <div class="col-md-9">
                              <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly="">
                                <span class="input-group-append">
                                  <span class="btn btn-success btn-file">
                                    <i class="icon md-upload" aria-hidden="true"></i>
                                    <input type="file" name="file_picture" multiple="">
                                  </span>
                                </span>
                              </div>
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
                      
                      <button type="reset" class="btn btn-sm" style="background-color: #ff0066; color: white;">&nbsp;&nbsp;&nbsp;REFRESH&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

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