<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user'); ?>" type="button" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Users</a>
        &nbsp;&nbsp;
      <?php if(check_permission_view(ID_GROUP,'create','group')) { ?>
        <a href="<?php echo base_url('backend/user/create_group'); ?>" type="button" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>Create Groups</a>
      <?php } ?>
    </ol>
    <br>
    
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button><p><?php echo $this->session->flashdata('success'); ?></p>
        </div>
    <?php } ?>

  </div>
    <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>Groups Master List</b></h3>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Designation</th>
                  <th>Departement</th>
                  <th>Function</th>
                  <th style="text-align: center; width: 130px;">Employee Category</th>
                  <th style="text-align: center; width: 130px;">Employee Group</th>
                  <th style="text-align: center;">Group Autorization</th>
                  <th>Autorization Menu</th>
                  <th style="text-align: center; width: 190px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($groups as $val) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$val->designation;?></td>
                  <td><?=$val->description;?></td>
                  <td><?=$val->function;?></td>
                  <td><?=$val->e_category;?></td>
                  <td><?=$val->e_group;?></td>
                  <td><?=$val->group;?></td>
                  <td style="text-align: center;">
                    <?php if(check_permission_view(ID_GROUP,'update','group')) { ?>
                      <button data-bind="<?=$val->id;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-primary btn-xs autorization" title="Autorization"><i class="icon md-widgets" aria-hidden="true"></i></button>
                    <?php } ?>
                  </td>
                  <td style="text-align: center;"><!-- Action -->
                    <!-- **Display** -->
                    <?php if(check_permission_view(ID_GROUP,'read','group')) { ?>
                      <a href="<?php echo base_url('backend/user/display_group/'.$val->id);?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-info btn-xs" title="Display"><i class="icon md-assignment-check" aria-hidden="true"></i></a>
                    <?php } ?>
                    <!-- **End Display** -->

                    <!-- **Update** -->
                    <?php if(check_permission_view(ID_GROUP,'update','group')) { ?>
                      <button data-bind="<?=$val->id;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-success btn-xs change" title="Change"><i class="icon md-edit" aria-hidden="true"></i></button>
                    <?php } ?>
                    <!-- **End Update** -->

                    <!-- **Update** -->
                    <?php if(check_permission_view(ID_GROUP,'delete','group')) { ?>
                      <?php $groups = array('admin');
                      if ($this->ion_auth->in_group($groups)) : ?>
                      <button data-bind="<?=$val->id;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-danger btn-xs delete" title="Delete"><i class="icon md-delete" aria-hidden="true"></i></button>
                      <?php endif ?>
                    <?php } ?>
                    <!-- **End Update** -->

                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">//Delete Data
    $(".delete").click(function(){
        var id = $(this).attr("data-bind");
    
       swal({
        title: "Are you sure?",
        // text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Delete  !",
        cancelButtonText: "Cancel  !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?= base_url("backend/user/groups_status/")?>'+id,
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

<script>//Change Data
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
                  window.location.href = '<?= base_url("backend/user/edit_group/")?>'+id;
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    });
</script>

<script>//Autorization
  $(".autorization").click(function(){
    var id = $(this).attr("data-bind");
    
      swal({
        title: "change autorization ?",
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
                  window.location.href = '<?= base_url("backend/user/autorization_view/")?>'+id;
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  });
</script>