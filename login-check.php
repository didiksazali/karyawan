<?php
// panggil file untuk koneksi ke database
require_once "config/database.php";

// ambil data hasil submit dari form
$email = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['email'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

	// ambil data dari tabel admin untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($mysqli, "SELECT * FROM admin WHERE email='$email' AND password='$password' AND status='aktif'
                          AND hak_akses='admin'")
									or die('Ada kesalahan pada query admin: '.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['email']     = $data['email'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['hak_akses'] = $data['hak_akses'];

		// lalu alihkan ke halaman admin
		header("Location: main.php?module=beranda");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		header("Location: index.php?alert=1");
	}

?>