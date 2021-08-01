<?php
include '../models/database.php';
$db = new database();
?>
<!doctype html>
<html lang="en">

<head>
	<title>Edit</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/pembelian_edit/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Edit Data Pembelian</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3>Edit Data</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
									</div>
									<form action="../controllers/proses.php?aksi=update_pembelian" method="POST" id="contactForm" name="contactForm" class="contactForm">
										<?php
										foreach ($db->edit_pembelian($_GET['kode_beli']) as $x) {
										?>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" class="form-control" name="kode_beli" value="<?php echo $x['kode_beli'] ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<select class="input custom-select" name="kode_furniture" id="kode_furniture" required>
															<?php foreach ($db->tampil_data_furniture() as $y) { ?>
																<option value="<?php echo $y['kode_furniture']; ?>"><?php echo $y['kode_furniture']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<select class="input custom-select" name="kode_customer" id="kode_customer" required>
															<?php foreach ($db->tampil_data_customer() as $y) { ?>
																<option value="<?php echo $y['kode_customer']; ?>"><?php echo $y['kode_customer']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" class="form-control" name="tgl_beli" value="<?php echo $x['tgl_beli'] ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" class="form-control" name="jml_beli" value="<?php echo $x['jml_beli'] ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" class="form-control" name="harga_beli" value="<?php echo $x['harga_beli'] ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Submit" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										<?php
										}
										?>
									</form>
								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5 img" style="background-image: url(../assets/pembelian_edit/images/img.jpg);">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>