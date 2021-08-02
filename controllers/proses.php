<?php
include '../models/database.php';
$db = new database();

if ($_GET['aksi'] == "register_user") {
    $db->input_user($_POST['username'], $_POST['password'], 'user');
    header("location:../views/userpage.php");
} elseif ($_GET['aksi'] == "login") {
    $cek = $db->login($_POST['username'], $_POST['password'], 'admin');
    if ($cek != 0) {
        $_SESSION['akses'] = 'admin';
        header("location:../views/adminpage.php");
    } else {
        $cek = $db->login($_POST['username'], $_POST['password'], 'user');
        if ($cek != 0) {
            $_SESSION['akses'] = 'user';
            $data = $db->tampil_data_pembelian_user($_POST['username']);
            foreach ($data as $x) {
                $_SESSION['key'] = $x['kode_customer'];
            }
            header("location:../views/userpage.php");
        } else {
            header("location:../views");
        }
    }
} elseif ($_GET['aksi'] == "logout") {
    session_start();
    session_destroy();
    header('location:../views');
}
#User (Login)
elseif ($_GET['aksi'] == "tambah_user") {
    $db->input_user($_POST['username'], $_POST['password'], $_POST['akses']);
    header("location:../views/akun.php");
} elseif ($_GET['aksi'] == "delete_user") {
    $db->delete_user($_GET['username']);
    header("location:../views/akun.php");
} elseif ($_GET['aksi'] == "update_user") {
    $db->update_user($_POST['username'], $_POST['password'], $_POST['akses']);
    header("location:../views/akun.php");
}
#Customer
elseif ($_GET['aksi'] == "tambah_customer") {
    $db->input_customer($_POST['kode_customer'], $_POST['nama_customer'], $_POST['kota_customer'], $_POST['alamat_customer'], $_POST['telp_customer']);
    header("location:../views/customer.php");
} elseif ($_GET['aksi'] == "delete_customer") {
    $db->delete_customer($_GET['kode_customer']);
    header("location:../views/customer.php");
} elseif ($_GET['aksi'] == "update_customer") {
    $db->update_customer($_POST['kode_customer'], $_POST['nama_customer'], $_POST['kota_customer'], $_POST['alamat_customer'], $_POST['telp_customer']);
    header("location:../views/customer.php");
}
#Furniture
elseif ($_GET['aksi'] == "tambah_furniture") {
    $db->input_furniture($_POST['kode_furniture'], $_POST['nama_furniture'], $_POST['jenis_furniture'], $_POST['bahan_furniture'], $_POST['stok_furniture'], $_POST['harga_furniture']);
    header("location:../views/furniture_admin.php");
} elseif ($_GET['aksi'] == "delete_furniture") {
    $db->delete_furniture($_GET['kode_furniture']);
    header("location:../views/furniture_admin.php");
} elseif ($_GET['aksi'] == "update_furniture") {
    $db->update_furniture($_POST['kode_furniture'], $_POST['nama_furniture'], $_POST['jenis_furniture'], $_POST['bahan_furniture'], $_POST['stok_furniture'], $_POST['harga_furniture']);
    header("location:../views/furniture_admin.php");
}
#Pembelian Admin
elseif ($_GET['aksi'] == "tambah_pembelian") {
    $db->input_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/pembelian_admin.php");
} elseif ($_GET['aksi'] == "delete_pembelian") {
    $db->delete_pembelian($_GET['kode_beli']);
    header("location:../views/pembelian_admin.php");
} elseif ($_GET['aksi'] == "update_pembelian") {
    $db->update_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/pembelian_admin.php");
}

#Pembelian User
elseif ($_GET['aksi'] == "tambah_pembelian_user") {
    $db->input_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/pembelian_user.php");
} elseif ($_GET['aksi'] == "delete_pembelian_user") {
    $db->delete_pembelian($_GET['kode_beli']);
    header("location:../views/pembelian_user.php");
} elseif ($_GET['aksi'] == "update_pembelian_user") {
    $db->update_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/pembelian_user.php");
}