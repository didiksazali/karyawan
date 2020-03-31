<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login admin
// jika admin belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika admin sudah login, maka jalankan perintah untuk insert dan update
else {
	// update data
    if ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_admin'])) {
                // ambil data hasil submit dari form
                $id_admin   = $_POST['id_admin'];
                $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
                $password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
                $nama_admin = mysqli_real_escape_string($mysqli, trim($_POST['nama_admin']));

                $nama_file          = $_FILES['foto_admin']['name'];
                $ukuran_file        = $_FILES['foto_admin']['size'];
                $tipe_file          = $_FILES['foto_admin']['type'];
                $tmp_file           = $_FILES['foto_admin']['tmp_name'];

                // tentuka extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png');

                // Set path folder tempat menyimpan gambarnya
                $path_file          = "../../images/admin/".$nama_file;

                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);

                // jika password tidak diubah dan foto tidak diubah
                if (empty($_POST['password']) && empty($_FILES['foto_admin']['name'])) {
                    // perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE admin SET 
                    													username 	= '$username',
                    													nama_admin  = '$nama_admin'
                                                                  WHERE id_admin 	= '$id_admin'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=profil&alert=2");
                    }
                }
                // jika password diubah dan foto tidak diubah
                elseif (!empty($_POST['password']) && empty($_FILES['foto_admin']['name'])) {
                    // perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE admin SET 
                    													username 	= '$username',
                    													password    = '$password',
                    													nama_admin  = '$nama_admin'
                                                                  WHERE id_admin 	= '$id_admin'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=profil&alert=2");
                    }
                }
                // jika password tidak diubah dan foto diubah
                elseif (empty($_POST['password']) && !empty($_FILES['foto_admin']['name'])) {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if (in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path_file)) { // Cek apakah gambar berhasil diupload atau tidak
                                // Jika gambar berhasil diupload, Lakukan :
                                // perintah query untuk mengubah data pada tabel users
                                $query = mysqli_query($mysqli, "UPDATE admin SET 
			                    													username 	= '$username',
                                                                                    nama_admin  = '$nama_admin',
                                                                                    foto_admin  = '$nama_file'
			                                                                  WHERE id_admin 	= '$id_admin'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=profil&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=profil&alert=5");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=profil&alert=6");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=profil&alert=7");
                    }
                }
                // jika password diubah dan foto diubah
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if (in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path_file)) { // Cek apakah gambar berhasil diupload atau tidak
                                // Jika gambar berhasil diupload, Lakukan :
                                // perintah query untuk mengubah data pada tabel users
                                $query = mysqli_query($mysqli, "UPDATE admin SET 
			                    													username 	= '$username',
			                    													password    = '$password',
                                                                                    nama_admin  = '$nama_admin',
                                                                                    foto_admin  = '$nama_file',
			                                                                  WHERE id_admin 	= '$id_admin'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=profil&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=profil&alert=5");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=profil&alert=6");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=profil&alert=7");
                    }
                }
            }
        }
    }
}		
?>