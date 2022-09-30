<html>
<head>
<title>SUCCESSFUL PAYMENT</title>
	<style type="text/css">
		th, td {
		  padding: 10px;
		  text-align: left;
		}
	</style>
<!-- <script src="<?= base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/qrcode/jquery.qrcode.min.js') ?>"></script> -->
</head>
<?php //require_once($_SERVER['DOCUMENT_ROOT'].'/ninos/assets/phpqrcode/qrlib.php'); ?>
<body style="font-family: Arial, Times New Roman, Times, serif; font-size: 14px;">

	<div align="center" style="margin-bottom: 20px">
		<p><b>PAYMENT RECEIPT</b></p>
		<img src="" width="200" hight="150">
		<br />
		<h2>Booking Code : <?= $order_id ?></h2>
	</div>

	<div style="margin-bottom: 50px;" align="center">

		<div id="qrcode2" style="float: left; padding-left: 80px;">
			<img style="padding-left: 25px" src="" width="200" hight="100" />
			<br />
			<img src="cid:<?= $path ?>" alt="photo1" width="250" hight="250" />
			<!-- <img src="<?= base_url('/assets/img/qr-code/A06847.png') ?>" width="250" hight="250" /> -->
		</div>
			
		<div style="padding-left: 20;float: left;">
			<table border="0">
				<!-- <tr><td><h2>Kode Booking</h2></td><td><h2>:</h2></td><td><h2><?= $code ?></h2></td></tr> -->
				<tr><td>Name</td><td>:</td><td><?= $name ?></td></tr>
				<tr><td>Phone</td><td>:</td><td><?= $phone_strip ?></td></tr>
				<tr><td>Email</td><td>:</td><td><?= $email ?></td></tr>
				<tr><td>Play Date</td><td>:</td><td><?= $play_date ?></td></tr>
				<tr><td>Session</td><td>:</td><td><?= $session_full ?></td></tr>
				<!-- <tr><td>Ticket Price</td><td>:</td><td><?= $price ?></td></tr>
				<tr><td>Qty</td><td>:</td><td><?= number_format($qty, 0, ',', '.') ?></td></tr> -->

				<?php foreach ($get_detail as $key => $value) { 
					// if($qty[$key] != '') {
				?>
					<tr><td><?= ($key == 0 ? 'Qty' : '') ?></td><td>:</td><td><?= number_format($value->total, 0, ',', '.') ?> × <?= $value->category_name ?> ( <?= $value->age_range ?> ) @Rp <?= number_format($value->price, 0, ',', '.') ?></td></tr>
				<?php } //} ?>

				<tr style="font-weight: bolder;"><td>Purchase Amount</td><td>:</td><td>Rp <?= number_format($price_total, 0, ',', '.') ?></td></tr>
			</table>
		</div>
	</div>
<div style="clear: both"></div>
	<div style="margin: 25px;margin-left: 0;padding-left: 100px">
		<p></p>
	</div>

</body>
</html>
<!-- <script type="text/javascript">
	jQuery('#qrcode').qrcode("<?= $code ?>");
</script> -->

<!-- <script type="text/javascript">
        window.onload = function () {
            window.print();
            window.close();
        }
</script> -->