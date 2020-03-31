<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login admin
// jika admin belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika admin sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $departemen = $_POST['departemen'];

            // perintah query untuk menyimpan data ke tabel departemen
            $query = mysqli_query($mysqli, "INSERT INTO departemen VALUES('','$departemen')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=departemen&alert=1");
            }

        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_departemen'])) {
                $id_departemen   = $_POST['id_departemen'];
                $departemen = $_POST['departemen'];

                // perintah query untuk mengubah data pada tabel departemen
                $query = mysqli_query($mysqli, "UPDATE departemen SET departemen = '$departemen' WHERE id_departemen = '$id_departemen'")
                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=departemen&alert=2");
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_departemen'])) {
            $id_departemen = $_GET['id_departemen'];
    
            // perintah query untuk menghapus data pada tabel departemen
            $query = mysqli_query($mysqli, "DELETE FROM departemen WHERE id_departemen = '$id_departemen'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=departemen&alert=3");
            }
        }
    }       
}       
?>