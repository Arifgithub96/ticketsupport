<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/user'); ?>" type="button" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Users</a>
        &nbsp;&nbsp;
      <?php if(check_permission_view(ID_GROUP,'create','user')) { ?>
        <a href="<?php echo base_url('backend/user/create_user'); ?>" type="button" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>Create User</a>
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
    <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>User Master List</b></h3>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th style="text-align: center; width: 120px;">Employee No.</th>
                  <th style="width: 150px;">Name</th>
                  <th>Designation</th>
                  <th>Dept</th>
                  <th>Function</th>
                  <th>Group Autorization</th>
                  <th>Status</th>
                  <!-- <th>Date of birth</th> -->
                  <th style="text-align: center; width: 130px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($get_user as $val) { ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$val->employee_no;?></td>
                  <td><?=$val->first_name;?> <?=$val->last_name;?></td>
                  <td><?=$val->designation;?></td>
                  <td><?=$val->description;?></td>
                  <td><?=$val->function;?></td>
                  <td><?=$val->group;?></td>
                  <td>
                    <div class="btn-group btn-group-xs" aria-label="Extra-small button group" role="group">
                      <?php if ($val->active == 1) {//Active
                        echo " <button type='submit' data-bind='$val->id' class='btn btn-success nonactive'>&nbsp;&nbsp;&nbsp; Active &nbsp;&nbsp;&nbsp;</button>";
                      }elseif($val->active == 0){//Non-Active
                        echo "<button type='submit' data-bind='$val->id' class='btn btn-danger active'>Non-Active</button>";
                      } ?>
                    </div>
                  </td>
                  <td style="text-align: center;"><!-- Action -->
                    <!-- **Display** -->
                    <?php if(check_permission_view(ID_GROUP,'read','user')) { ?>
                      <a href="<?php echo base_url('backend/user/detail_user/'.$val->id);?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-info btn-xs" title="Display"><i class="icon md-assignment-check" aria-hidden="true"></i></a>
                    <?php } ?>
                    <!-- **End Display** -->

                    <!-- **Display** -->
                    <?php if(check_permission_view(ID_GROUP,'update','user')) { ?>
                      <button data-bind="<?=$val->id;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-success btn-xs change" title="Change"><i class="icon md-edit" aria-hidden="true"></i></button>
                    <?php } ?>
                    <!-- **End Display** -->

                    <!-- **Display** -->
                    <?php if(check_permission_view(ID_GROUP,'delete','user')) { ?>
                      <button data-bind="<?=$val->id;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-danger btn-xs delete" title="Delete"><i class="icon md-delete" aria-hidden="true"></i></button>
                    <?php } ?>
                    <!-- **End Display** -->
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">//Non-Active Data
    $(".nonactive").click(function(){
        var id = $(this).attr("data-bind");
      
       swal({
        title: "Are you sure?",
        text: "You Will Change This Data to be Non-Active !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Non-Active !",
        cancelButtonText: "Cancel !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?= base_url("backend/user/status_user_nonactive/")?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Non-Active !", "Your Data is Turned Non-Active.", "success");
                  window.location.reload();
             }
          });
        } else {
          swal("Cancelled", "You Canceled To Update :)", "error");
        }
      });
    });
</script>

<script type="text/javascript">//Active Data
    $(".active").click(function(){
        var id = $(this).attr("data-bind");
      
       swal({
        title: "Are you sure?",
        text: "you will change this data to be active !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: " Active !",
        cancelButtonText: "Cancel !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?= base_url("backend/user/status_user_active/")?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Active !", "Your Data is Turned Active.", "success");
                  window.location.reload();
             }
          });
        } else {
          swal("Cancelled", "You Canceled To Update :)", "error");
        }
      });
    });
</script>

<script type="text/javascript">//Delete Data
    $(".remove").click(function(){
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
             url: '<?= base_url("backend/user/delete_user/")?>'+id,
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
                  window.location.href = '<?= base_url("backend/user/edit_user/")?>'+id;
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    });
</script>