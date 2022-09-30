<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/admdashboard'); ?>" type="button" class="btn btn-round btn-primary"><i class="icon md-home" aria-hidden="true"></i>Home</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Setting Profile</h1>
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
                          <?= form_open(base_url('backend/user/save_profil_user'),  'id="login_validation" enctype="multipart/form-data"') ?>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee No.<b style="color: red;">*</b> :</b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" disabled="disabled" class="form-control" value="<?=$detail_user->employee_no?>"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Name<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="text" required="required" class="form-control" value="<?=$detail_user->first_name?>"" autocomplete="off" disabled="disabled"/>
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Email<b style="color: red;">*</b> : </b></label>
                            <div class="col-md-9">
                              <input type="email" required="required" class="form-control" value="<?=$detail_user->email?>" disabled="disabled" autocomplete="off"/>
                            </div>
                          </div>

                          <div class="form-group row form-material row">
                            <label class="col-md-3 form-control-label">User Autorization<b style="color: red;">*</b> : </label>
                            <div class="col-md-9">
                              <select class="form-control" required="required" data-plugin="select2" id="id_group" disabled="disabled" data-placeholder="Select Departement" >
                                  <?php foreach ($get_dept as $val) { ?>
                                    <option <?php if($val->id == $detail_user->id_group){ echo 'selected="selected"'; } ?> value="<?=$val->id?>">Dept : [ <?=$val->description;?> ] - Group : ( <?=$val->group;?> )</option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Birthday :</b></label>
                            <div class="col-md-9">
                              <input type="date" class="form-control" disabled="disabled" value="<?=$detail_user->birthday?>" autocomplete="off" />
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Gender : </b></label>
                            <div class="col-md-9">
                            <select class="form-control" data-plugin="select2" id="gender" disabled="disabled" data-placeholder="Select Gender" >
                                  <option <?php if("M" == $detail_user->gender){ echo 'selected="selected"'; } ?> value="M">Male</option>
                                <option <?php if("F" == $detail_user->gender){ echo 'selected="selected"'; } ?> value="F">Female</option>
                            </select>
                            </div>
                          </div>

                          <div class="form-group row form row">
                            <label class="col-md-3 form-control-label"><b>Address : </b></label>
                            <div class="col-md-9">
                              <textarea class="maxlength-textarea form-control" data-plugin="maxlength" data-placement="bottom-right-inside" maxlength="100" disabled="disabled" rows="2" placeholder="Address"><?=$detail_user->address?></textarea>
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
                            <label class="col-md-3 form-control-label"><b>Phone No. : </b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" disabled="disabled" value="<?=$detail_user->phone?>" placeholder="+62 xxx - xxxx - xxxx" onkeypress="return hanyaAngka(event)" autocomplete="off"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Password : </b></label>
                            <div class="col-md-9">
                              <input type="password" class="form-control" name="password" autocomplete="off" id="password"/>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Confirm Password : </b></label>
                            <div class="col-md-9">
                              <input type="password" class="form-control" name="confirm_password" autocomplete="off" id="confirm_password"/>
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

                          <!-- <style>
                            .profil {
                              border: 5px solid #0099ff;
                              padding: 5px;
                              border-radius: 100px;
                            }
                          </style> -->
                          <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Picture</b></label>
                            <div class="col-md-9">
                              <?php if (!empty($detail_user->file_picture)) { ?>
                                <img id="myImg" src="<?php echo base_url('src/assets/images/profile/'.$detail_user->file_picture); ?>" alt="Paris" width="200" height="200">
                              <?php }else{ ?>
                                <img src="<?php echo base_url('src/assets/images/profile/avatar2.jpg'); ?>" alt="Paris" width="200" height="200" class="profil">
                              <?php } ?>
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
                      
                      <!-- <button type="reset" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REFRESH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp; -->
                      <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

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

<style>
  body {font-family: Arial, Helvetica, sans-serif;}

  #myImg {
    border-radius: 100px;
    cursor: pointer;
    transition: 0.3s;
    border: 5px solid #0099ff;
    padding: 3px;
    /*border-radius: 100px;*/
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    /*z-index: 1;*/ /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation */
  .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
  </style>
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div style="text-align: center;"><h3><?=USER_NAME;?></h3></div>
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
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      }
    </script>