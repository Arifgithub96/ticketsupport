<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
        <a href="<?php echo base_url('backend/admdashboard'); ?>" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Dashboard</a>
        &nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('backend/ticket'); ?>" class="btn btn-round btn-danger"><i class="icon md-view-module" aria-hidden="true"></i>Application</a>
        &nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('backend/tooling/create'); ?>" class="btn btn-round btn-warning"><i class="icon md-plus-circle-o" aria-hidden="true"></i>Create ticket</a>
    </ol>

    <?php if ($this->session->flashdata('success')) { ?>
      <br>
      <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <i class="icon md-check" aria-hidden="true"></i> 
        <p><?php echo $this->session->flashdata('success'); ?></p>
      </div>
    <?php }elseif ($this->session->flashdata('error')) { ?>
      <br>
      <div class="alert dark alert-icon alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <i class="icon md-alert-circle-o" aria-hidden="true"></i> 
        <p><?php echo $this->session->flashdata('error'); ?></p>
      </div>
    <?php } ?>

  </div>
      <h2 class="panel-title" style="text-align: center; padding: 0px;"><b>Tooling Ticket List</b></h2>
      <div class="page-content" style="padding: 1px;">
        <div class="panel">
          <div class="panel-body">
            <table id="datatable" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th style="width: 5%;">No.</th>
                  <th>Ticket No.</th>
                  <th>Title</th>
                  <th>Priority</th>
                  <th>Request</th>
                  <th>Date Create</th>
                  <th>Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($get_data as $val) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?=$val->ticket_no?></td>
                  <td><?=$val->title?></td>
                    <?php if ($val->priority == 'Critical') { ?>
                      <td style="color: #ff0000;"><b>Critical</b></td>
                    <?php }elseif ($val->priority == 'High') { ?>
                      <td style="color: #e6b800;"><b>High</b></td>
                    <?php }elseif ($val->priority == 'Medium') { ?>
                     <td style="color: #00cc00;"><b>Medium</b></td>
                    <?php }elseif ($val->priority == 'Low') { ?>
                      <td style="color: #008ae6;"><b>Low</b></td>
                    <?php }else{?> <td></td> <?php } ?>
                  <td><?=$val->first_name;?> - <?=$val->description;?></td>
                  <td><?=date('m/d/Y', strtotime($val->date_create));?></td>
                  <td><!-- ** status ** -->
                    <?php if ($val->status == 1) {//Open - success
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-success'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Open &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></div>";
                      }elseif($val->status == 2){//Accept - warning
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-warning'>&nbsp;&nbsp;&nbsp;&nbsp; Accept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></div>";
                      }elseif($val->status == 3){//Rejected - primary
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-primary'>&nbsp;&nbsp; Rejected &nbsp;&nbsp;</button></div>";
                      }elseif($val->status == 4){//OnProgress - danger
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-danger'>On-Progress</button></div>";
                      }elseif($val->status == 5){//Closed - info
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-info'>&nbsp;&nbsp;&nbsp;&nbsp; Closed &nbsp;&nbsp;&nbsp;</button></div>";
                      }elseif($val->status == 6){//Discussion - warning
                        echo "<div class='btn-group btn-group-xs' aria-label='Extra-small button group' role='group'> <button type='submit' class='btn btn-warning' style='background-color:#e65c00'>&nbsp;&nbsp;Discussion&nbsp;</button></div>";
                      } ?>
                  </td>
                  <td style="text-align: center;"><!-- Action -->
                    <a href="<?php echo base_url('backend/tooling/details_ticket/'.$val->ticket_no);?>" data-toggle="tooltip" class="btn btn-floating btn-info btn-xs" title="Display"><i class="icon md-assignment-check" aria-hidden="true"></i></a>
                    
                    <?php if($val->status == 1){//Open
                      echo "<button data-bind='$val->ticket_no' type='button' data-toggle='tooltip' class='btn btn-floating btn-success btn-xs accept' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    }elseif($val->status == 2){//Accept
                      echo "<button data-bind='$val->ticket_no' type='button' data-toggle='tooltip' class='btn btn-floating btn-success btn-xs onprogress' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    }elseif($val->status == 3){//Rejected
                      echo "<button type='button' data-toggle='tooltip' class='btn btn-floating btn-secondary btn-xs' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    }elseif($val->status == 4){//OnProgress
                      echo "<button data-bind='$val->ticket_no' type='button' data-toggle='tooltip' class='btn btn-floating btn-success btn-xs onprogress' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    }elseif($val->status == 5){//Closed 
                      echo "<button data-bind='' type='button' data-toggle='tooltip' class='btn btn-floating btn-secondary btn-xs' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    }elseif($val->status == 6){//Discussion
                      echo "<button data-bind='$val->ticket_no' type='button' data-toggle='tooltip' class='btn btn-floating btn-success btn-xs onprogress' title='Update Status'><i class='icon md-edit' aria-hidden='true'></i></button>";
                    } ?>
                    
                    <?php echo "<button data-bind='$val->ticket_no' type='button' data-toggle='tooltip' class='btn btn-floating btn-danger btn-xs delete' title='Delete'><i class='icon md-delete' aria-hidden='true'></i></button>"; ?>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">//Acceptance
  $("#datatable").on("click", ".accept", function () {
    var id = $(this).attr("data-bind");
    swal({
      title: "Are you sure you want to change the data?",
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
              window.location.href = '<?= base_url("backend/tooling/acceptance/")?>'+id;
          }
        });
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  });
</script>

<script type="text/javascript">//Acceptance
  $("#datatable").on("click", ".onprogress", function () {
    var id = $(this).attr("data-bind");
    swal({
      title: "Are you sure you want to change the data?",
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
              window.location.href = '<?= base_url("backend/tooling/progress/")?>'+id;
          }
        });
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  });
</script>

<script type="text/javascript">//Delete
  $("#datatable").on("click", ".delete", function () {
    var id = $(this).attr("data-bind");
    swal({
      title: "Delete",
      text: "Are you sure delete data?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '<?= base_url("backend/tooling/delete/")?>'+id,
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