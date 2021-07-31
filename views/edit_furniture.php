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

            <form action="../controllers/proses.php?aksi=update_furniture" method="post">
                <?php
                foreach ($db->edit_furniture($_GET['kode_furniture']) as $x) {
                ?>
                    <table>
                        <tr>
                            <td>Kode Furniture</td>
                            <input type="text" name="kode_furniture" value="<?php echo $x['kode_furniture'] ?>">
                        </tr>
                        <tr>
                            <td>Nama Furniture</td>
                            <td><input type="text" name="nama_furniture" value="<?php echo $x['nama_furniture'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Furniture</td>
                            <td><input type="text" name="jenis_furniture" value="<?php echo $x['jenis_furniture'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Bahan Furniture</td>
                            <td><input type="text" name="bahan_furniture" value="<?php echo $x['bahan_furniture'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Stok Furniture</td>
                            <td><input type="number" name="stok_furniture" value="<?php echo $x['stok_furniture'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga Furniture</td>
                            <td><input type="number" name="harga_furniture" value="<?php echo $x['harga_furniture'] ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" href="furniture_admin.php" value="Simpan"></td>
                        </tr>
                    </table>
                <?php } ?>
            </form>

            </table>
        </div>
    </div>

    <script src="../assets/AdminPage/js/jquery.min.js"></script>
    <script src="../assets/AdminPage/js/popper.js"></script>
    <script src="../assets/AdminPage/js/bootstrap.min.js"></script>
    <script src="../assets/AdminPage/js/main.js"></script>
</body>

</html>