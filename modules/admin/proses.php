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
	// insert data
	if ($_GET['act']=='insert') {
		if (isset($_POST['simpan'])) {
			// ambil data hasil submit dari form
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

            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
            if (in_array($extension, $allowed_extensions)) {
                // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path_file)) {

            // perintah query untuk menyimpan data ke tabel users
            $query = mysqli_query($mysqli, "INSERT INTO admin (username,password,nama_admin,foto_admin,status)
                                            VALUES('$username','$password','$nama_admin','$nama_file','aktif')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=admin&alert=1");
            }
            } else {
                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                header("location: ../../main.php?module=admin&alert=5");
            }
            } else {
                // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                header("location: ../../main.php?module=admin&alert=6");
            }
            } else {
                // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                header("location: ../../main.php?module=admin&alert=7");
            }
		}	
	}
	
	// update data
	elseif ($_GET['act']=='update') {
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
                        header("location: ../../main.php?module=admin&alert=2");
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
                        header("location: ../../main.php?module=admin&alert=2");
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
			                        header("location: ../../main.php?module=admin&alert=2");
			                    }
                        	} else {
	                            // Jika gambar gagal diupload, tampilkan pesan gagal upload
	                            header("location: ../../main.php?module=admin&alert=5");
	                        }
	                    } else {
	                        // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
	                        header("location: ../../main.php?module=admin&alert=6");
	                    }
	                } else {
	                    // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
	                    header("location: ../../main.php?module=admin&alert=7");
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
			                        header("location: ../../main.php?module=admin&alert=2");
			                    }
                        	} else {
	                            // Jika gambar gagal diupload, tampilkan pesan gagal upload
	                            header("location: ../../main.php?module=admin&alert=5");
	                        }
	                    } else {
	                        // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
	                        header("location: ../../main.php?module=admin&alert=6");
	                    }
	                } else {
	                    // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
	                    header("location: ../../main.php?module=admin&alert=7");
	                } 
				}
			}
		}
	}

	// update status menjadi aktif
	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			// ambil data hasil submit dari form
			$id_admin = $_GET['id'];
			$status  = "aktif";

			// perintah query untuk mengubah data pada tabel users
            $query = mysqli_query($mysqli, "UPDATE admin SET status  = '$status'
                                                          WHERE id_admin = '$id_admin'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=admin&alert=3");
            }
		}
	}

	// update status menjadi blokir
	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			// ambil data hasil submit dari form
			$id_admin = $_GET['id'];
			$status  = "blokir";

			// perintah query untuk mengubah data pada tabel users
            $query = mysqli_query($mysqli, "UPDATE admin SET status  = '$status'
                                                          WHERE id_admin = '$id_admin'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=admin&alert=4");
            }
		}
	}

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_admin'])) {
            $id_admin = $_GET['id_admin'];

            // perintah query untuk menghapus data pada tabel kamar
            $query = mysqli_query($mysqli, "DELETE FROM admin WHERE id_admin='$id_admin'")
            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=admin&alert=8");
            }
        }
    }

}		
?>