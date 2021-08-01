<?php
include '../models/database.php';
$db = new database();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Furniture | Karawaci Furniture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/AdminPage/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../assets/pembelian_edit/css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h1><a href="adminpage.php" class="logo">KW</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="adminpage.php"> Home </a>
                </li>
                <li>
                    <a href="akun.php"> Akun </a>
                </li>
                <li>
                    <a href="furniture_admin.php"> Furniture </a>
                </li>
                <li>
                    <a href="customer.php"> Customer </a>
                </li>
                <li>
                    <a href="pembelian_admin.php"> Pembelian </a>
                </li>
            </ul>

            <div class="footer">
                <p>
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                </p>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-2 p-md-3">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="adminpage.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about_admin.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact_admin.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../controllers/proses.php?aksi=logout">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Edit Data Customer</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-16">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3>Edit Data</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				      		</div>
									<form action="../controllers/proses.php?aksi=update_customer" method="POST" id="contactForm" name="contactForm" class="contactForm">
									<?php 
									foreach($db->edit_customer($_GET['kode_customer']) as $x){
									?>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="kode_customer" value="<?php echo $x['kode_customer'] ?>">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="text" class="form-control" name="nama_customer" value="<?php echo $x['nama_customer'] ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="kota_customer" value="<?php echo $x['kota_customer'] ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="alamat_customer" value="<?php echo $x['alamat_customer'] ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="telp_customer" value="<?php echo $x['telp_customer'] ?>">
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

    <script src="../assets/AdminPage/js/jquery.min.js"></script>
    <script src="../assets/AdminPage/js/popper.js"></script>
    <script src="../assets/AdminPage/js/bootstrap.min.js"></script>
    <script src="../assets/AdminPage/js/main.js"></script>
</body>

</html>