<html>
<head>
<title>TICKET</title>
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

	<div align="center" style="margin-bottom: -30px">
		<p><b>TICKET </b></p>
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Logo_Bappenas_Indonesia_%28National_Development_Planning_Agency%29.png/600px-Logo_Bappenas_Indonesia_%28National_Development_Planning_Agency%29.png" width="100" hight="80">
		<br />
		<h2>Booking Code : <?=$booking_code?></h2>
	</div>

	<div style="margin-bottom: 50px;" align="center">

		<div id="qrcode2" style="float: left; padding-left: 80px; padding-top: 0px">
			<!-- <img src="cid:<?= $path ?>" alt="photo1" width="250" hight="250" /> -->
			<img src="<?= base_url('src/assets/barcode/'.$booking_code.'.png') ?>" width="250" hight="250" />
		</div>
			
		<div style="padding-left: 20;float: left;">
			<table border="0">
				<!-- <tr><td><h2>Kode Booking</h2></td><td><h2>:</h2></td><td><h2><?= $code ?></h2></td></tr> -->
				<tr><td>Name</td><td>:</td><td><?=$name?></td></tr>
				<tr><td>Phone</td><td>:</td><td><?=$phone?></td></tr>
				<tr><td>Email</td><td>:</td><td><?=$email?></td></tr>
				<tr><td>Play Date</td><td>:</td><td><?=$date?></td></tr>
				<tr><td>Session</td><td>:</td><td><?=$shift?></td></tr>
				<tr><td>Qty</td><td>:</td><td>Baby : <?=$baby?> x Rp. <?= number_format($price_baby, 0, ',', '.') ?></td></tr>
				<tr><td></td><td></td><td>Child : <?=$child?> x Rp. <?= number_format($price_child, 0, ',', '.') ?></td></tr>
				<tr><td></td><td></td><td>Adult : <?=$adult?> x Rp. <?= number_format($price_adult, 0, ',', '.') ?></td></tr>
				<tr><td></td><td></td><td>Senior : <?=$senior?> x Rp. <?= number_format($price_senior, 0, ',', '.') ?></td></tr>
				<!-- <tr><td>Ticket Price</td><td>:</td><td><?= $price ?></td></tr> -->

				<!-- <!?-- <?php foreach ($ticket_category as $key => $value) { 
					if($qty[$key] != '') {
				?>
					<tr><td><?= ($key == 0 ? 'Qty' : '') ?></td><td>:</td><td><?= number_format($qty[$key], 0, ',', '.') ?> × <?= $value ?></td></tr>
				<?php } } ?> -->
				<!-- <tr><td><br></td></tr> -->
				<tr style="font-weight: bolder;"><td>Price Total</td><td>:</td><td>Rp. <?= number_format($total, 0, ',', '.') ?></td></tr>

				<tr style="font-weight: bolder;color: red;"><td></td><td></td><td> </td></tr>
				<tr style="font-weight: bolder;color: red;"><td></td><td></td><td>1. Transfer senilai total price ke Rekening:</td></tr>
				<tr><td>Bank</td><td>:</td><td>MANDIRI</td></tr>
				<tr><td>An</td><td>:</td><td> </td></tr>
				<tr><td>No. Rek</td><td>:</td><td></td></tr>
				<tr style="font-weight: bolder;color: red;"><td></td><td></td><td></td></tr>
				<tr style="font-weight: bolder;color: red;"><td></td><td></td><td><img src="" width="20" hight="10"></td></tr>
				<tr style="font-weight: bolder;color: red;"><td></td><td></td><td></td></tr>
			</table>
		</div>
	</div>
<!-- <div style="clear: both"></div>
	<div style="margin: 25px;margin-left:0;padding-left: 100px">
		<p>Terima kasih telah memesan tiket Ninos, untuk langkah berikutnya:</p>

		<P>1. Transfer senilai total price ke Rekening:
		<table border="0">
			<tr><td>Bank</td><td>:</td><td>MANDIRI</td></tr>
			<tr><td>An</td><td>:</td><td>PT. WAHANA KREASI BANGSA</td></tr>
			<tr><td>No. Rek</td><td>:</td><td>1090 0323 000 06</td></tr>
		</table></P>

		<p>2. Informasikan bukti transfer pembayaran dan sertakan informasi KODE BOOKING ke:<br>
			Admin Ninos: +62 853 5535 8889 <img src="<?= base_url('assets/logo/wa.jpg') ?>" width="20" hight="10"></p>

		<p>3. Ninos akan mengirim kembali email bukti pembayaran.</p>
	</div>
 -->
</body>
</html>
<!-- <script type="text/javascript">
	jQuery('#qrcode').qrcode("<?= $code ?>");
</script> -->

