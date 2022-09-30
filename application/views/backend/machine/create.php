<!-- Page -->
<div class="page">
	<ol class="breadcrumb">
		<a href="<?php echo base_url('backend/machine'); ?>" class="btn btn-round btn-warning"><i class="icon md-format-indent-increase" aria-hidden="true"></i>Ticket List</a>&nbsp;&nbsp;
	</ol>
	<div class="page-header" style="text-align: center; padding: 0px;">
		<h1 class="page-title">Form Create Ticket</h1>
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
										<?= form_open(base_url('backend/machine/create'),  'id="login_validation" enctype="multipart/form-data"') ?>

										<div class="form-group row form-material row">
											<label class="col-md-3 form-control-label">Requestor Name<b
													style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<select class="form-control" required="required" data-plugin="select2"
													id="user_id" name="user_id" data-placeholder="Select Requestor">
													<?php foreach ($get_user as $val) { ?>
													<option value=""></option>
													<option
														<?php if($val->user_id == USER_ID){ echo 'selected="selected"'; } ?>
														value="<?php echo $val->user_id ?>">
														<?php echo " ( $val->employee_no ) - $val->first_name - $val->description" ?>
													</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-md-3 form-control-label"><b>Title</b><b
													style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<input type="text" class="form-control" name="title" required
													placeholder="Text Title">
											</div>
										</div>

										<div class="form-group row form-material row">
											<label class="col-md-3 form-control-label">Priority<b
													style="color: red;">*</b> : </label>
											<div class="col-md-6">
												<select class="form-control" required="required" data-plugin="select2"
													id="priority" name="priority" data-placeholder="Select Priority">
													<option value=""></option>
													<option value="Critical">Critical</option>
													<option value="High">High</option>
													<option value="Medium">Medium</option>
													<option value="Low">Low</option>
												</select>
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
											<label class="col-md-3 form-control-label"><b>Problem</b><b
													style="color: red;">*</b> : </label>
											<div class="col-md-7">
												<textarea class="maxlength-textarea form-control" name="problem"
													data-plugin="maxlength" maxlength="200" rows="2"
													placeholder="Problem"></textarea>
											</div>
										</div>

										<div class="form-group row form row">
											<label class="col-md-3 form-control-label"><b>FeedBack : </b></label>
											<div class="col-md-7">
												<textarea class="maxlength-textarea form-control"
													data-plugin="maxlength" data-placement="bottom-right-inside"
													maxlength="100" name="feedback" rows="2"
													placeholder="FeedBack"></textarea>
											</div>
										</div>

										<div class="form-group row  row">
											<label class="col-md-3 form-control-label"><b>Attachment : </b></label>
											<div class="col-md-7">
												<div class="input-group input-group-file" data-plugin="inputGroupFile">
													<input type="text" class="form-control" readonly=""
														placeholder="Upload File Here">
													<span class="input-group-append">
														<span class="btn btn-success btn-file">
															<i class="icon md-upload" aria-hidden="true"></i>
															<input type="file" name="attachment" multiple="">
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
								<!-- <a href="<?php echo base_url('backend/troubleticket/create_ticket'); ?>" type="reset" class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;REFRESH&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
								<button type="Submit"
									class="btn btn-success ladda-button waves-effect waves-light waves-round btn-sm"
									data-style="expand-left" data-plugin="ladda"
									data-type="progress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
