<?php
class database
{

    var $host = "localhost";
    var $username = "root";
    var $pass = "";
    var $db = "furniturekel7_";
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->username, $this->pass, $this->db);
        mysqli_select_db($this->con, $this->db);
        session_start();
    }

    function login($name_user, $password, $akses)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM login where username='$name_user' AND password='$password' AND akses='$akses'"
        );
        $_SESSION['name'] = $name_user;
        while ($d = mysqli_fetch_row($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    #User (Login)
    function tampil_data_user()
    {
        $data = mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "SELECT * from login");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_user($name_user, $password, $akses)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "INSERT INTO user (username, password, akses) 
		 VALUES ('$name_user', '$password', '$akses')");
    }

    function delete_user($name_user)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "DELETE from login where username='$name_user'");
    }

    function edit_user($name_user)
    {
        $data = mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "SELECT username, password, akses FROM user where username='$name_user'");
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update_user($name_user, $password, $akses)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE login SET username = '$name_user'
		, password='$password', akses = '$akses' WHERE username = '$name_user'");
    }


    #Customer
    function tampil_data_customer()
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from customer"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_customer($kode_customer, $nama_customer, $kota_customer, $alamat_customer, $telp_customer)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "INSERT into customer(kode_customer, nama_customer, kota_customer, alamat_customer, telp_customer) VALUES ('$kode_customer, $nama_customer, $kota_customer, $alamat_customer, $telp_customer')"
        );
    }

    function delete_customer($kode_customer)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "DELETE from customer where kode_customer='$kode_customer'"
        );
    }

    function edit_customer($kode_customer)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM customer where kode_customer='$kode_customer'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    function update_customer($kode_customer, $nama_customer, $kota_customer, $alamat_customer, $telp_customer)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE customer
		SET kode_customer= '$kode_customer', nama_customer = '$nama_customer', kota_customer = '$kota_customer' 
		,alamat_customer = '$alamat_customer', telp_customer = '$telp_customer' WHERE kode_customer = '$kode_customer'");
    }

    #Furniture
    function tampil_data_furniture()
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from furniture"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_furniture($kode_furniture, $nama_furniture, $jenis_furniture, $bahan_furniture, $stok_furniture, $harga_furniture)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "INSERT into furniture(kode_furniture, nama_furniture, jenis_furniture, bahan_furniture, stok_furniture, harga_furniture) VALUES ('$kode_furniture, $nama_furniture, $jenis_furniture, $bahan_furniture, $stok_furniture, $harga_furniture')"
        );
    }

    function delete_furniture($kode_furniture)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "DELETE from furniture where kode_furniture='$kode_furniture'"
        );
    }

    function edit_furniture($kode_furniture)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM furniture where kode_furniture='$kode_furniture'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    function update_furniture($kode_furniture, $nama_furniture, $jenis_furniture, $bahan_furniture, $stok_furniture, $harga_furniture)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE furniture
            SET kode_furniture='$kode_furniture', nama_furniture = '$nama_furniture', jenis_furniture = '$jenis_furniture',
            bahan_furniture = '$bahan_furniture', stok_furniture = '$stok_furniture', harga_furniture = '$harga_furniture' WHERE kode_furniture = '$kode_furniture'");
    }

    #Supplier
    function tampil_data_supplier()
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from supplier"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_supplier($kode_supplier, $nama_supplier, $kota_supplier, $alamat_supplier, $telp_supplier)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "INSERT into supplier(kode_supplier, nama_supplier, kota_supplier, alamat_supplier, telp_supplier) VALUES ('$kode_supplier, $nama_supplier, $kota_supplier, $alamat_supplier, $telp_supplier')"
        );
    }

    function delete_supplier($kode_supplier)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "DELETE from supplier where kode_supplier='$kode_supplier'"
        );
    }

    function edit_supplier($kode_supplier)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM supplier where kode_supplier='$kode_supplier'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    function update_supplier($kode_supplier, $nama_supplier, $kota_supplier, $alamat_supplier, $telp_supplier)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE supplier
		SET kode_supplier= '$kode_supplier', nama_supplier = '$nama_supplier', kota_supplier = '$kota_supplier' 
		,alamat_supplier = '$alamat_supplier', telp_supplier = '$telp_supplier' WHERE kode_supplier = '$kode_supplier'");
    }

    #Pembelian
    function tampil_data_pembelian()
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from pembelian"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_data_pembelian_user($kode_customer)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from pembelian where kode_customer='$kode_customer'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_pembelian($kode_beli, $kode_furniture, $kode_customer, $tgl_beli, $jml_beli, $harga_beli)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "INSERT into pembelian(kode_beli, kode_furniture, kode_customer, tgl_beli, jml_beli, harga_beli) VALUES ('$kode_beli, $kode_furniture, $kode_customer, $tgl_beli, $jml_beli, $harga_beli')"
        );
    }

    function delete_pembelian($kode_beli)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "DELETE from pembelian where kode_beli='$kode_beli'"
        );
    }

    function edit_pembelian($kode_beli)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM pembelian where kode_beli='$kode_beli'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    function update_pembelian($kode_beli, $kode_furniture, $kode_customer, $tgl_beli, $jml_beli, $harga_beli)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE pembelian
            SET kode_beli= '$kode_beli', kode_furniture = '$kode_furniture', , kode_customer = '$kode_customer', tgl_beli = '$tgl_beli' 
            ,jml_beli = '$jml_beli', harga_beli = '$harga_beli' WHERE kode_beli = '$kode_beli'");
    }

    #Penjualan
    function tampil_data_penjualan()
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * from penjualan"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input_penjualan($kode_jual, $kode_furniture, $kode_supplier, $tgl_jual, $jml_jual, $harga_jual)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "INSERT into penjualan(kode_jual, kode_furniture, kode_supplierr, tgl_jual, jml_jual, harga_jual) VALUES ('$kode_jual, $kode_furniture, $kode_supplier, $tgl_jual, $jml_jual, $harga_jual')"
        );
    }

    function delete_penjualan($kode_jual)
    {
        mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "DELETE from penjualan where kode_jual='$kode_jual'"
        );
    }

    function edit_penjualan($kode_jual)
    {
        $data = mysqli_query(
            mysqli_connect($this->host, $this->username, $this->pass, $this->db),
            "SELECT * FROM penjualan where kode_jual='$kode_jual'"
        );
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    function update_penjualan($kode_jual, $kode_furniture, $kode_supplier, $tgl_jual, $jml_jual, $harga_jual)
    {
        mysqli_query(mysqli_connect($this->host, $this->username, $this->pass, $this->db), "UPDATE penjualan
            SET kode_jual= '$kode_jual', kode_furniture = '$kode_furniture', , kode_supplier = '$kode_supplier', tgl_jual = '$tgl_jual' 
            ,jml_jual = '$jml_jual', harga_jual = '$harga_jual' WHERE kode_jual = '$kode_jual'");
    }
}
