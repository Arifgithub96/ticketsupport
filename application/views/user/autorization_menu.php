<?php foreach ($usergroup as $ug) { ?>
<!-- Page -->
  <div class="page">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user/list_group'); ?>" type="button" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>Groups Master List</a>
    </ol>
    <div class="page-header" style="text-align: center; padding: 0px;">
      <h1 class="page-title">Create Groups</h1>
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
            <header class="panel-heading" style="text-align: center;"><br>
              <h4><b>Group Name : </b> <b style="color: #ff3300;"><?=$ug->description;?> - <?=$ug->function;?> - <?=$ug->e_category;?> - <?=$ug->e_group;?> - ( <?= $ug->name; ?> )</b></h4>
              </header>
              <div class="panel-body container-fluid">
                <div class="row row-lg">
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">
                        <!-- <form class="form-horizontal"> -->
                        <?= form_open(base_url('backend/user/save_autorization'),  'id="login_validation" enctype="multipart/form-data"') ?>

                    <input type="hidden" name="id_group" value="<?= $ug->id; ?>"> 
                    <div class="dd" data-plugin="nestable">
                    <?php foreach ($menu as $mn) { ?>
                      
                      <ol class="dd-list">
                        <?php if ($mn->menu_level == 0) { ?>
                          <li class="dd-item dd-item-with-media" data-id="1">
                          <div class="dd-handle" style="color:green;"><b><?=$mn->menu_name?></b></div>
                          <div class="dd-content">
                            <div class="media">
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-success">
                                  <input type="checkbox" <?php echo " id='p".$mn->id_menu."r' name='p".$mn->id_menu."[]'" ?> value="read" <?php (!empty($mn->user_permission)) ? checked_menu_btn($mn->user_permission,'read') : "";?>/>
                                  <label <?php echo" for='p".$mn->id_menu."r'";?>>Read</label>
                                </div>
                                </div>
                                <!-- <div class="pr-20">
                                  <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="inputUnchecked" />
                                    <label for="inputUnchecked">Update</label>
                                  </div>
                                </div> -->
                            </div>
                          </div>
                        </li>
                        <?php } ?>
                        
                        <?php foreach($menu as $mn1) { 
                          if($mn1->menu_level == 1 AND $mn1->menu_parent == $mn->id_menu ){ ?>
                          <li class="dd-item dd-item-with-media" data-id="2">
                          <div class="dd-handle" style="color:blue;"><b><?=$mn1->menu_name?></b></div>
                          <?php if($mn1->menu_url == "#"){ ?>
                            <div class="dd-content">
                            <div class="media">
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-primary">
                                  <input type="checkbox" <?php echo " id='p".$mn1->id_menu."r' name='p".$mn1->id_menu."[]'" ?> value="read" <?php (!empty($mn1->user_permission)) ? checked_menu_btn($mn1->user_permission,'read') : "";?>/>
                                  <label <?php echo" for='p".$mn1->id_menu."r'";?>>Read</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php }else{ ?>
                            <div class="dd-content">
                            <div class="media">
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-primary">
                                  <input type="checkbox" <?php echo " id='p".$mn1->id_menu."r' name='p".$mn1->id_menu."[]'" ?> value="read" <?php (!empty($mn1->user_permission)) ? checked_menu_btn($mn1->user_permission,'read') : "";?>/>
                                  <label <?php echo" for='p".$mn1->id_menu."r'";?> >Read</label>
                                </div>
                              </div>
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-primary">
                                  <input type="checkbox" <?php echo " id='p".$mn1->id_menu."u' name='p".$mn1->id_menu."[]'" ?> value="update" <?php (!empty($mn1->user_permission)) ? checked_menu_btn($mn1->user_permission,'update') : "";?>/>
                                  <label <?php echo" for='p".$mn1->id_menu."u'";?> >Update</label>
                                </div>
                              </div>
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-primary">
                                  <input type="checkbox" <?php echo " id='p".$mn1->id_menu."c' name='p".$mn1->id_menu."[]'" ?> value="create" <?php (!empty($mn1->user_permission)) ? checked_menu_btn($mn1->user_permission,'create') : "";?>/>
                                  <label <?php echo" for='p".$mn1->id_menu."c'";?> >Create</label>
                                </div>
                              </div>
                              <div class="pr-20">
                                <div class="checkbox-custom checkbox-primary">
                                  <input type="checkbox" <?php echo " id='p".$mn1->id_menu."d' name='p".$mn1->id_menu."[]'" ?> value="delete" <?php (!empty($mn1->user_permission)) ? checked_menu_btn($mn1->user_permission,'delete') : "";?>/>
                                  <label <?php echo" for='p".$mn1->id_menu."d'";?> >Delete</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php }?>
                          

                          <?php foreach($menu as $mn2) { 
                            if($mn2->menu_level == 2 AND $mn2->menu_parent == $mn1->id_menu){ ?>
                              <ol class="dd-list">
                                <li class="dd-item dd-item-with-media" data-id="3">
                                  <div class="dd-handle" style="color:#ff9900;"><b><?=$mn2->menu_name?></b></div>
                                  <?php if($mn2->menu_url[0] == "#"){ ?>
                                    <div class="dd-content">
                                    <div class="media">
                                      <div class="pr-20">
                                        <div class="checkbox-custom checkbox-warning">
                                          <input type="checkbox" <?php echo " id='p".$mn2->id_menu."r' name='p".$mn2->id_menu."[]'" ?> value="read" <?php (!empty($mn2->user_permission)) ? checked_menu_btn($mn2->user_permission,'read') : "";?>/>
                                          <label <?php echo" for='p".$mn2->id_menu."r'";?> >Read</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php }else{ ?>
                                    <div class="dd-content">
                                    <div class="media">
                                      <div class="pr-20">
                                        <div class="checkbox-custom checkbox-warning">
                                          <input type="checkbox" <?php echo " id='p".$mn2->id_menu."r' name='p".$mn2->id_menu."[]'" ?> value="read" <?php (!empty($mn2->user_permission)) ? checked_menu_btn($mn2->user_permission,'read') : "";?>/>
                                          <label <?php echo" for='p".$mn2->id_menu."r'";?>>Read</label>
                                        </div>
                                      </div>
                                      <div class="pr-20">
                                        <div class="checkbox-custom checkbox-warning">
                                          <input type="checkbox" <?php echo " id='p".$mn2->id_menu."u' name='p".$mn2->id_menu."[]'" ?> value="update" <?php (!empty($mn2->user_permission)) ? checked_menu_btn($mn2->user_permission,'update') : "";?>/>
                                          <label <?php echo" for='p".$mn2->id_menu."u'";?>>Update</label>
                                        </div>
                                      </div>
                                      <div class="pr-20">
                                        <div class="checkbox-custom checkbox-warning">
                                          <input type="checkbox" <?php echo " id='p".$mn2->id_menu."c' name='p".$mn2->id_menu."[]'" ?> value="create" <?php (!empty($mn2->user_permission)) ? checked_menu_btn($mn2->user_permission,'create') : "";?>/>
                                          <label <?php echo" for='p".$mn2->id_menu."c'";?>>Create</label>
                                        </div>
                                      </div>
                                      <div class="pr-20">
                                        <div class="checkbox-custom checkbox-warning">
                                          <input type="checkbox" <?php echo " id='p".$mn2->id_menu."d' name='p".$mn2->id_menu."[]'" ?> value="delete" <?php (!empty($mn2->user_permission)) ? checked_menu_btn($mn2->user_permission,'delete') : "";?>/>
                                          <label <?php echo" for='p".$mn2->id_menu."d'";?>>Delete</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php }?>
                                  

                                  <?php foreach ($menu as $mn3) {
                                    if($mn3->menu_level == 3 AND $mn3->menu_parent == $mn2->id_menu){ ?>
                                      <ol class="dd-tes">
                                      <li class="dd-list dd-item-with-media" data-id="4">
                                        <div class="dd-handle" style="color:#ff0000;"><b><?=$mn3->menu_name?></b></div>
                                          <div class="dd-content">
                                            <div class="media">
                                              <div class="pr-20">
                                                <div class="checkbox-custom checkbox-danger">
                                                  <input type="checkbox" <?php echo " id='p".$mn3->id_menu."r' name='p".$mn3->id_menu."[]'" ?> value="read" <?php (!empty($mn3->user_permission)) ? checked_menu_btn($mn3->user_permission,'read') : "";?>/>
                                                  <label <?php echo" for='p".$mn3->id_menu."r'";?>>Read</label>
                                                </div>
                                              </div>
                                              <div class="pr-20">
                                                <div class="checkbox-custom checkbox-danger">
                                                  <input type="checkbox" <?php echo " id='p".$mn3->id_menu."u' name='p".$mn3->id_menu."[]'" ?> value="update" <?php (!empty($mn3->user_permission)) ? checked_menu_btn($mn3->user_permission,'update') : "";?>/>
                                                  <label <?php echo" for='p".$mn3->id_menu."u'";?>>Update</label>
                                                </div>
                                              </div>
                                              <div class="pr-20">
                                                <div class="checkbox-custom checkbox-danger">
                                                  <input type="checkbox" <?php echo " id='p".$mn3->id_menu."c' name='p".$mn3->id_menu."[]'" ?> value="create" <?php (!empty($mn3->user_permission)) ? checked_menu_btn($mn3->user_permission,'create') : "";?>/>
                                                  <label <?php echo" for='p".$mn3->id_menu."c'";?>>Create</label>
                                                </div>
                                              </div>
                                              <div class="pr-20">
                                                <div class="checkbox-custom checkbox-danger">
                                                  <input type="checkbox" <?php echo " id='p".$mn3->id_menu."d' name='p".$mn3->id_menu."[]'" ?> value="delete" <?php (!empty($mn3->user_permission)) ? checked_menu_btn($mn3->user_permission,'delete') : "";?>/>
                                                  <label <?php echo" for='p".$mn3->id_menu."d'";?>>Delete</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </li>
                                      </ol>
                                    <?php }
                                  }?>
                                  

                                </li>
                              </ol>
                            <?php }
                            }?>

                        </li>
                        <?php }
                        } ?>
                        

                      </ol>
                      <?php } ?>

                    </div>

                      </div>
                    </div>
                    <!-- End Example Horizontal Form -->
                  </div>
                  <div class="col-md-12 col-lg-6">
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                      <div class="example">

                          

                          <!-- <div class="form-group row">
                            <label class="col-md-3 form-control-label"><b>Employee Group<b style="color: red;">*</b> : </b></b></label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="e_group" placeholder="G1/G2" autocomplete="off"/>
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
                      
                      <button type="Submit" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAVE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

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
<?php } ?>
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