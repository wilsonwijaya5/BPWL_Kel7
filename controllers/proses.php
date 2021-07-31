<?php
include '../models/database.php';
$db = new database();

if ($_GET['aksi'] == "register_user") {
    if ($_POST['password'] == $_POST['password_confirmation']) {
        $db->input_user($_POST['username'], $_POST['password'], 'user');
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['akses'] = 'user';
        header("location:../views/userpage.php");
    } else {
        header("location:../views/register.php");
    }
} elseif ($_GET['aksi'] == "login") {
    $cek = $db->login($_POST['username'], $_POST['password'], 'admin');
    if ($cek != 0) {
        $_SESSION['akses'] = 'admin';
        header("location:../views/adminpage.php");
    } else {
        $cek = $db->login($_POST['username'], $_POST['password'], 'user');
        if ($cek != 0) {
            $_SESSION['akses'] = 'user';
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
    header("location:../views/userpage.php");
} elseif ($_GET['aksi'] == "delete_user") {
    $db->delete_user($_GET['id']);
    header("location:../views/userpage.php");
} elseif ($_GET['aksi'] == "update_user") {
    $db->update_user($_POST['username'], $_POST['password'], $_POST['akses']);
    header("location:../views/userpage.php");
}
#Customer
elseif ($_GET['aksi'] == "tambah_customer") {
    $db->input_customer($_POST['kode_customer'], $_POST['nama_customer'], $_POST['kota_customer'], $_POST['alamat_customer'], $_POST['telp_customer']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "delete_customer") {
    $db->delete_customer($_GET['kode_customer']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "update_customer") {
    $db->update_customer($_POST['kode_customer'], $_POST['nama_customer'], $_POST['kota_customer'], $_POST['alamat_customer'], $_POST['telp_customer']);
    header("location:../views/adminpage.php");
}
#Furniture
elseif ($_GET['aksi'] == "tambah_furniture") {
    $db->input_furniture($_POST['kode_furniture'], $_POST['nama_furniture'], $_POST['jenis_furniture'], $_POST['bahan_furniture'], $_POST['stok_furniture'], $_POST['harga_furniture']);
    if ($_SESSION['akses'] = 'user') {
        header("location:../views/userpage.php");
    } elseif ($_SESSION['akses'] = 'admin') {
        header("location:../views/adminpage.php");
    }
} elseif ($_GET['aksi'] == "delete_furniture") {
    $db->delete_furniture($_GET['kode_furniture']);
    $db->update_furniture($_POST['kode_furniture'], $_POST['nama_furniture'], $_POST['jenis_furniture'], $_POST['bahan_furniture'], $_POST['stok_furniture'], $_POST['harga_furniture']);
    if ($_SESSION['akses'] = 'admin') {
        header("location:../views/furniture_admin.php");
    }
} elseif ($_GET['aksi'] == "update_furniture") {
    $db->update_furniture($_POST['kode_furniture'], $_POST['nama_furniture'], $_POST['jenis_furniture'], $_POST['bahan_furniture'], $_POST['stok_furniture'], $_POST['harga_furniture']);
    if ($_SESSION['akses'] = 'admin') {
        header("location:../views/furniture_admin.php");
    }
}
#Supplier
elseif ($_GET['aksi'] == "tambah_supplier") {
    $db->input_supplier($_POST['kode_supplier'], $_POST['nama_supplier'], $_POST['kota_supplier'], $_POST['alamat_supplier'], $_POST['telp_supplier']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "delete_supplier") {
    $db->delete_supplier($_GET['kode_supplier']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "update_supplier") {
    $db->update_supplier($_POST['kode_supplier'], $_POST['nama_supplier'], $_POST['kota_supplier'], $_POST['alamat_supplier'], $_POST['telp_supplier']);
    header("location:../views/adminpage.php");
}
#Pembelian
elseif ($_GET['aksi'] == "tambah_pembelian") {
    $db->input_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "delete_pembelian") {
    $db->delete_pembelian($_GET['kode_beli']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "update_pembelian") {
    $db->update_pembelian($_POST['kode_beli'], $_POST['kode_furniture'], $_POST['kode_customer'], $_POST['tgl_beli'], $_POST['jml_beli'], $_POST['harga_beli']);
    header("location:../views/adminpage.php");
}
#Penjualan
elseif ($_GET['aksi'] == "tambah_penjualan") {
    $db->input_penjualan($_POST['kode_jual'], $_POST['kode_furniture'], $_POST['kode_supplier'], $_POST['tgl_jual'], $_POST['jml_jual'], $_POST['harga_jual']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "delete_penjualan") {
    $db->delete_penjualan($_GET['kode_jual']);
    header("location:../views/adminpage.php");
} elseif ($_GET['aksi'] == "update_penjualan") {
    $db->update_penjualan($_POST['kode_jual'], $_POST['kode_furniture'], $_POST['kode_supplier'], $_POST['tgl_jual'], $_POST['jml_jual'], $_POST['harga_jual']);
    header("location:../views/adminpage.php");
}
