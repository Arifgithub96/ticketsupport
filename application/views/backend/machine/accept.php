<!-- Page -->
<div class="page">
	<ol class="breadcrumb">
		<a href="<?php echo base_url('backend/machine'); ?>" class="btn btn-round btn-warning"><i
				class="icon md-format-indent-increase" aria-hidden="true"></i>Ticket List</a>&nbsp;&nbsp;
	</ol>
	<div class="page-header" style="text-align: center; padding: 0px;">
		<h1 class="page-title">Form Acceptance</h1>
	</div>

	<div class="page-content">
		<div class="panel">
			<div class="panel-body container-fluid">
				<div class="panel">
					<header class="panel-heading" style="text-align: right;">
						<h5><b>Login PIC : </b> <b style="color: #ff3300;"><?=USER_NAME?></b></h5>
						<h5><b>Date Time : </b> <b style="color: #ff3300;"><?= $date_create;?></b></h5>
					</header>
					<div class="panel-body container-fluid" style="padding: 0px 0px;">
						<div class="row row-lg">
							<div class="col-md-12 col-lg-6">
								<!-- Example Horizontal Form -->
								<div class="example-wrap">
									<div class="example">
										<!-- <form class="form-horizontal"> -->
										<?= form_open(base_url('backend/machine/acceptance'),  'id="login_validation" enctype="multipart/form-data"') ?>

										<div class="form-group row form-material row">
											<label class="col-md-3 form-control-label">Requestor Name<b style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<select class="form-control" required="required" data-plugin="select2" id="user_id" data-placeholder="Select Requestor" disabled>
												<?php foreach ($get_user as $val) { ?>
													<option value=""></option>
													<option <?php if($val->user_id == $get_row_ticket->id_request){ echo 'selected="selected"'; } ?> > <?php echo " ( $val->employee_no ) - $val->first_name - $val->description" ?>
													</option>
												<?php } ?>
												</select>
											</div>
										</div>
										
										<input type="text" hidden value="<?=$get_row_ticket->ticket_no?>" name="ticket_no">

										<div class="form-group row">
											<label class="col-md-3 form-control-label"><b>Title</b><b style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<input type="text" class="form-control" value="<?=$get_row_ticket->title?>" placeholder="Text Title" disabled>
											</div>
										</div>

										<div class="form-group row form-material row">
											<label class="col-md-3 form-control-label">Priority<b style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<select class="form-control" required="required" data-plugin="select2"
													id="priority" data-placeholder="Select Priority" disabled>
													<option value=""></option>
													<option <?php if('Critical' == $get_row_ticket->priority){ echo 'selected="selected"'; } ?>>Critical</option>
													<option <?php if('High' == $get_row_ticket->priority){ echo 'selected="selected"'; } ?>>High</option>
													<option <?php if('Medium' == $get_row_ticket->priority){ echo 'selected="selected"'; } ?>>Medium</option>
													<option <?php if('Low' == $get_row_ticket->priority){ echo 'selected="selected"'; } ?>>Low</option>
												</select>
											</div>
										</div>

										<div class="form-group row form-material row">
											<label class="col-md-3 form-control-label">Approval<b style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<input type="radio" class="ApprovStatus" value="2" name="status" id="Acceptance" required>&ensp;<label class="badge badge-info" style="font-size: 12px;" for="Acceptance">Acceptance</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" class="ApprovStatus" value="3" name="status" id="Rejected">&ensp;<label class="badge badge-danger" style="font-size: 12px;" for="Rejected">Rejected</label>
											</div>
										</div>

										<div class="form-group row IDreason" style="display:none;">
											<label class="col-md-3 form-control-label"> </label>
											<div class="col-md-6">
												<textarea class="maxlength-textarea form-control Textreason" data-plugin="maxlength" maxlength="200" rows="1" name="reason_reject" placeholder="Reason Reject"></textarea>
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

										<div class="form-group row" id="billdesc">
											<label class="col-md-3 form-control-label"><b>Problem</b><b style="color: red;">*</b> : </label>
											<div class="col-md-7">
												<textarea class="maxlength-textarea form-control" data-plugin="maxlength" maxlength="200" rows="2" placeholder="Problem" disabled><?=$get_row_ticket->problem?></textarea>
											</div>
										</div>

										<div class="form-group row form row">
											<label class="col-md-3 form-control-label"><b>FeedBack : </b></label>
											<div class="col-md-7">
												<textarea class="maxlength-textarea form-control"
													data-plugin="maxlength" data-placement="bottom-right-inside"
													maxlength="100" rows="2" placeholder="FeedBack" disabled> <?=$get_row_ticket->feedback?></textarea>
											</div>
										</div>

										<div class="form-group row  row">
											<label class="col-md-3 form-control-label"><b>Attachment : </b></label>
											<div class="col-md-7">
												<?php if(!empty($get_row_ticket->attachment)){ ?>
													<a href="<?php echo base_url('backend/tooling/download/'. $get_row_ticket->attachment) ?>" type="button" class="btn btn-squared btn-info btn-md waves-effect waves-light waves-round" data-style="slide-left" data-plugin="ladda" data-type="progress" id="back"><span class="ladda-label"> Download <i class="icon md-download " aria-hidden="true"></i></span></a>
												<?php }else{ ?>
													File not Upload
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
								<!-- <a href="<?php echo base_url('backend/troubleticket/create_ticket'); ?>" type="reset" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;REFRESH&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
								<button type="Submit" class="btn btn-success ladda-button waves-effect waves-light waves-round btn-sm" data-style="expand-left" data-plugin="ladda" data-type="progress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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

</script>

<script type="text/javascript">
	// 1 detik = 1000
	window.setTimeout("waktu()", 1000);

	function waktu() {
		var tanggal = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal
			.getSeconds();
	}
</script>

<script>
    $(document).ready(function() {
        if(document.getElementById('Acceptance').checked) {//show Jika yang di pilih process table
          $(".IDreason").hide();
        }
        if(document.getElementById('Rejected').checked) {//show Jika yang di pilih other table
          $(".IDreason").show();
        }
        $("#Acceptance").click(function() {
          $(".IDreason").hide();
          $(".Textreason").attr('required', false);
        });
        $("#Rejected").click(function() {
          $(".IDreason").show();
          $(".Textreason").attr('required', true);
        });
    });
</script>

<script>
	// var initialText = $('.editable').val();
	//   $('.editOption').val(initialText);
	$('#test').change(function () {
		var selected = $('option:selected', this).attr('class');
		var optionText = $('.editable').text();

		if (selected == "editable") {
			$('.editOption').show();
			$("#other").attr('required', true);

			$('.editOption').keyup(function () {
				var editText = $('.editOption').val();
				$('.editable').val(editText);
				// $('.editable').html(editText);
			});
		} else {
			$('.editOption').hide();
		}
	});

</script>
