<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user'); ?>" type="button" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Users</a>
        &nbsp;&nbsp;
      <!-- <a href="<?php echo base_url('backend/user/create_menu'); ?>" type="button" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>Create Menu</a> -->
      <?php if(check_permission_view(ID_GROUP,'create','menu')) { ?>
        <button class="btn btn-round btn-danger" data-target="#examplePositionCenter" data-toggle="modal" type="button"><i class="icon md-plus" aria-hidden="true"></i>Create Menu</button>
      <?php } ?>
    </ol>
  </div>
    <?php if ($this->session->flashdata('success')) { ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button><p><?php echo $this->session->flashdata('success'); ?></p>
      </div>
    <?php } ?>
    <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>Menu Master List</b></h3>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th  style="width: 50px;">No.</th>
                  <th style="text-align: center;">Name Menu</th>
                  <th style="text-align: center;">Url</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($get_menu as $val) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td style="text-align: center;"><?=$val->menu_name;?></td>
                  <td style="text-align: center;"><?=$val->menu_url;?></td>
                  <td style="text-align: center;"><!-- Action -->
                    <!-- **Display** -->
                    <?php if(check_permission_view(ID_GROUP,'read','menu')) { ?>
                      <a href="<?php echo base_url('backend/user/detail_menu/'.$val->id_menu);?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-info btn-xs" title="Display"><i class="icon md-assignment-check" aria-hidden="true"></i></a>
                    <?php } ?>
                    <!-- **End Display** -->

                    <!-- **Update** -->
                    <?php if(check_permission_view(ID_GROUP,'update','menu')) { ?>
                      <button data-bind="<?=$val->id_menu;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-success btn-xs change" title="Change"><i class="icon md-edit" aria-hidden="true"></i></button>
                    <?php } ?>
                    <!-- **End Update** -->

                    <!-- **Delete** -->
                    <?php if(check_permission_view(ID_GROUP,'delete','menu')) { ?>
                      <button data-bind="<?=$val->id_menu;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-danger btn-xs remove" title="Delete"><i class="icon md-delete" aria-hidden="true"></i></button>
                    <?php } ?>
                    <!-- **End Delete** -->

                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <h4 class="modal-title" style="text-align: center;">Menu Level</h4>
        <div class="modal-body">
          <div class="example-grid">
            <div class="row">
              <div class="col-lg-3" style="text-align: center;">
                <a href="<?php echo base_url('backend/user/create_menu/0'); ?>" type="button" class="btn btn-floating btn-info btn-sm">0</a>
              </div>
              <div class="col-lg-3" style="text-align: center;">
                <a href="<?php echo base_url('backend/user/create_menu/1'); ?>" type="button" class="btn btn-floating btn-success btn-sm">1</a>
              </div>
              <div class="col-lg-3" style="text-align: center;">
                <a href="<?php echo base_url('backend/user/create_menu/2'); ?>" type="button" class="btn btn-floating btn-danger btn-sm">2</a>
              </div>
              <div class="col-lg-3" style="text-align: center;">
                <a href="<?php echo base_url('backend/user/create_menu/3'); ?>" type="button" class="btn btn-floating btn-warning btn-sm">3</a>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-6">
                <div class="example-col">.col-lg-6</div>
              </div>
              <div class="col-lg-6">
                <div class="example-col">.col-lg-6</div>
              </div>
            </div> -->
          </div>
        </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
      </div>
    </div>
  </div>
<!-- End Modal -->

<script type="text/javascript">//Delete Data
    $(".remove").click(function(){
        var id = $(this).attr("data-bind");
    
       swal({
        title: "Are you sure?",
        text: "you will delete data permanently !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?= base_url("backend/user/delete_menu/")?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  window.location.reload();
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    });
</script>

<script type="text/javascript">//Change Data
    $(".change").click(function(){
        var id = $(this).attr("data-bind");
    
       swal({
        title: "Are you sure to Change Data?",
        text: "",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             // url: '<?= base_url("backend/main_menu/change_masterdata/")?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  window.location.href = '<?= base_url("backend/user/edit_menu/")?>'+id;
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    });
</script>