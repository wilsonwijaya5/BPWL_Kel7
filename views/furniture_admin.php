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
        <div id="content" class="p-4 p-md-5">

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

            <h2>Data Furniture</h2>
            <a href="furniture_input.php">Input Data</a>
            <table border="1">
                <tr>
                    <th> No </th>
                    <th> Kode Furniture </th>
                    <th> Nama Furniture </th>
                    <th> Jenis Furniture </th>
                    <th> Bahan Furniture </th>
                    <th> Stok Furniture </th>
                    <th> Harga Furntiure </th>
                    <th> Opsi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($db->tampil_data_furniture() as $x) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $x['kode_furniture']; ?></td>
                        <td><?php echo $x['nama_furniture']; ?></td>
                        <td><?php echo $x['jenis_furniture']; ?></td>
                        <td><?php echo $x['bahan_furniture']; ?></td>
                        <td><?php echo $x['stok_furniture']; ?></td>
                        <td><?php echo $x['harga_furniture']; ?></td>
                        <td>
                            <a href="edit_furniture.php?kode_furniture=<?php echo $x['kode_furniture']; ?>&aksi=edit_furniture">Edit |</a>
                            <a href="../controllers/proses.php?kode_furniture=<?php echo $x['kode_furniture']; ?>&aksi=delete_furniture">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <script src="../assets/AdminPage/js/jquery.min.js"></script>
    <script src="../assets/AdminPage/js/popper.js"></script>
    <script src="../assets/AdminPage/js/bootstrap.min.js"></script>
    <script src="../assets/AdminPage/js/main.js"></script>
</body>

</html>