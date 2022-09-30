<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/list_user'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>User Master List</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Display User</h1>
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid" style="padding: 0px;">
          <div class="panel">
              <div class="panel-body container-fluid">
                <div class="row row-lg">
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">
                        <!-- <form class="form-horizontal"> -->
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee No.<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" value="<?=$detail_user->employee_no;?>" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Name<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" value="<?=$detail_user->first_name;?>" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Last Name : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" value="<?=$detail_user->last_name;?>" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div> -->
                           <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Email<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="email" class="form-control" value="<?=$detail_user->email;?>"  autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>
                          <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">User Autorization<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="group" name="group" data-placeholder="Select Departement" disabled="disabled">
                                  <option>Dept : [ <?=$detail_user->description;?> ] - Group : ( <?=$detail_user->group;?> )</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row form row">
                            <label class="col-md-3 form-control-label"><b>Address : </b></label>
                            <div class="col-md-9">
                              <textarea class="maxlength-textarea form-control"  disabled="disabled" data-plugin="maxlength" data-placement="bottom-right-inside" maxlength="100" rows="2" placeholder="Address"><?=$detail_user->address;?></textarea>
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
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Birthday :</b></label>
                            <div class="col-md-9">
                              <input type="date" class="form-control" value="<?=$detail_user->birthday;?>" autocomplete="off"  disabled="disabled"/>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Gender : </b></label>
                            <div class="col-md-9">
                            <select class="form-control" data-plugin="select2" id="gender" data-placeholder="Select Gender" disabled="disabled"  disabled="disabled">
                              <option <?php if($detail_user->gender == "M"){ echo 'selected="selected"'; } ?>>Male </option>
                              <option <?php if($detail_user->gender == "F"){ echo 'selected="selected"'; } ?>>Female </option>
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Phone No. : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" value="<?=$detail_user->phone?>" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>
                          <style>
                            .profil {
                              border-radius: 50%;
                            }
                          </style>
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Picture</b></label>
                            <div class="col-md-9">
                              <?php if (!empty($detail_user->file_picture)) { ?>
                                <img src="<?php echo base_url('src/assets/images/profile/'.$detail_user->file_picture); ?>" alt="Paris" width="200" height="200" class="profil">
                              <?php }else{ ?>
                                <img src="<?php echo base_url('src/assets/images/profile/avatar2.jpg'); ?>" alt="Paris" width="200" height="200" class="profil">
                              <?php } ?>
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Confirm Password<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="password" required="required" class="form-control" name="confirm_password" autocomplete="off" id="confirm_password"/>
                            </div>
                          </div> -->
                          <!-- <div class="form-group row  row">
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
                          </div> -->
                      </div>
                    </div>
                    <!-- End Example Horizontal Form -->
                  </div>
                  <!-- Button Action -->
                    <div class="col-lg-5 form-group form-material">
                        <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
                    </div>
                    <div class="col-lg-5 form-group form-material">

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