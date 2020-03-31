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
            $nik_karyawan        = $_POST['nik_karyawan'];
            $nama_karyawan       = $_POST['nama_karyawan'];
            $tempat_lahir        = $_POST['tempat_lahir'];
            $tanggal_lahir       = $_POST['tanggal_lahir'];
            $jenis_kelamin       = $_POST['jenis_kelamin'];
            $id_agama            = $_POST['id_agama'];
            $status              = $_POST['status'];
            $alamat_karyawan     = $_POST['alamat_karyawan'];
            $telepon_karyawan    = $_POST['telepon_karyawan'];
            $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
            $id_jabatan          = $_POST['id_jabatan'];
            $id_departemen       = $_POST['id_departemen'];
            $tanggal_masuk       = $_POST['tanggal_masuk'];

            $nama_file          = $_FILES['foto_karyawan']['name'];
            $ukuran_file        = $_FILES['foto_karyawan']['size'];
            $tipe_file          = $_FILES['foto_karyawan']['type'];
            $tmp_file           = $_FILES['foto_karyawan']['tmp_name'];

            // tentuka extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png');

            // Set path folder tempat menyimpan gambarnya
            $path_file          = "../../images/karyawan/".$nama_file;

            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);

            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
            if (in_array($extension, $allowed_extensions)) {
                // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path_file)) {

                        // perintah query untuk menyimpan data ke tabel users
                        $query = mysqli_query($mysqli, "INSERT INTO karyawan (nik_karyawan,nama_karyawan,tempat_lahir,
                                              tanggal_lahir,jenis_kelamin,id_agama,status,alamat_karyawan,telepon_karyawan,pendidikan_terakhir,
                                              id_jabatan,id_departemen,tanggal_masuk,foto_karyawan)
                                            VALUES('$nik_karyawan','$nama_karyawan','$tempat_lahir','$tanggal_lahir','$jenis_kelamin',
                                            '$id_agama','$status','$alamat_karyawan','$telepon_karyawan','$pendidikan_terakhir','$id_jabatan',
                                            '$id_departemen','$tanggal_masuk','$nama_file')")
                        or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil simpan data
                            header("location: ../../main.php?module=karyawan&alert=1");
                        }
                    } else {
                        // Jika gambar gagal diupload, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=karyawan&alert=5");
                    }
                } else {
                    // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                    header("location: ../../main.php?module=karyawan&alert=6");
                }
            } else {
                // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                header("location: ../../main.php?module=karyawan&alert=7");
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_karyawan'])) {
                $id_karyawan   = $_POST['id_karyawan'];
                $nik_karyawan        = $_POST['nik_karyawan'];
                $nama_karyawan       = $_POST['nama_karyawan'];
                $tempat_lahir        = $_POST['tempat_lahir'];
                $tanggal_lahir       = $_POST['tanggal_lahir'];
                $jenis_kelamin       = $_POST['jenis_kelamin'];
                $id_agama            = $_POST['id_agama'];
                $status              = $_POST['status'];
                $alamat_karyawan     = $_POST['alamat_karyawan'];
                $telepon_karyawan    = $_POST['telepon_karyawan'];
                $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
                $id_jabatan          = $_POST['id_jabatan'];
                $id_departemen       = $_POST['id_departemen'];
                $tanggal_masuk       = $_POST['tanggal_masuk'];

                $nama_file          = $_FILES['foto_karyawan']['name'];
                $ukuran_file        = $_FILES['foto_karyawan']['size'];
                $tipe_file          = $_FILES['foto_karyawan']['type'];
                $tmp_file           = $_FILES['foto_karyawan']['tmp_name'];

                // tentuka extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png');

                // Set path folder tempat menyimpan gambarnya
                $path_file          = "../../images/karyawan/".$nama_file;

                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);

                if (!empty($_FILES['foto_karyawan']['name'])) {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if (in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path_file)) { // Cek apakah gambar berhasil diupload atau tidak
                                // Jika gambar berhasil diupload, Lakukan :
                                // perintah query untuk mengubah data pada tabel users
                                $query = mysqli_query($mysqli, "UPDATE karyawan SET nik_karyawan = '$nik_karyawan',
                                                                                       nama_karyawan = '$nama_karyawan',
                                                                                       tempat_lahir  = '$tempat_lahir',
                                                                                       tanggal_lahir = '$tanggal_lahir',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       id_agama = '$id_agama',
                                                                                       status = '$status',
                                                                                       alamat_karyawan = '$alamat_karyawan',
                                                                                       telepon_karyawan = '$telepon_karyawan',
                                                                                       pendidikan_terakhir = '$pendidikan_terakhir',
                                                                                       id_jabatan = '$id_jabatan',
                                                                                       id_departemen = '$id_departemen',
                                                                                       tanggal_masuk = '$tanggal_masuk',
                                                                                       foto_karyawan = '$nama_file'
                                                                                       WHERE id_karyawan = '$id_karyawan'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=karyawan&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=karyawan&alert=5");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=karyawan&alert=6");
                        }
                }
            } else {
                    $query = mysqli_query($mysqli, "UPDATE karyawan SET nik_karyawan = '$nik_karyawan',
                                                                                       nama_karyawan = '$nama_karyawan',
                                                                                       tempat_lahir  = '$tempat_lahir',
                                                                                       tanggal_lahir = '$tanggal_lahir',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       id_agama = '$id_agama',
                                                                                       status = '$status',
                                                                                       alamat_karyawan = '$alamat_karyawan',
                                                                                       telepon_karyawan = '$telepon_karyawan',
                                                                                       pendidikan_terakhir = '$pendidikan_terakhir',
                                                                                       id_jabatan = '$id_jabatan',
                                                                                       id_departemen = '$id_departemen',
                                                                                       tanggal_masuk = '$tanggal_masuk'
                                                                                       WHERE id_karyawan = '$id_karyawan'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=karyawan&alert=2");
                    }
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_karyawan'])) {
            $id_karyawan = $_GET['id_karyawan'];
    
            // perintah query untuk menghapus data pada tabel karyawan
            $query = mysqli_query($mysqli, "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=karyawan&alert=3");
            }
        }
    }       
}       
?>