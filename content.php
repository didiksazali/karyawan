<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */

// fungsi untuk pengecekan status login admin
// jika admin belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika admin sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
        // jika halaman konten yang dipilih beranda, panggil file view beranda
        if ($_GET['module'] == 'beranda') {
            include "modules/beranda/view.php";
        }

        // jika halaman konten yang dipilih jadwal mobil, panggil file view karyawan
        elseif ($_GET['module'] == 'karyawan') {
            include "modules/karyawan/view.php";
        }

        // jika halaman konten yang dipilih form jadwal mobil, panggil file form karyawan
        elseif ($_GET['module'] == 'form_karyawan') {
            include "modules/karyawan/form.php";
        }
        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih stok darah, panggil file view jabatan
        elseif ($_GET['module'] == 'jabatan') {
            include "modules/jabatan/view.php";
        }

        // jika halaman konten yang dipilih form stok darah, panggil file form jabatan
        elseif ($_GET['module'] == 'form_jabatan') {
            include "modules/jabatan/form.php";
        }

        // jika halaman konten yang dipilih pendonor, panggil file view departemen
        elseif ($_GET['module'] == 'departemen') {
            include "modules/departemen/view.php";
        }

        // jika halaman konten yang dipilih form pendonor, panggil file form departemen
        elseif ($_GET['module'] == 'form_departemen') {
            include "modules/departemen/form.php";
        }

        // jika halaman konten yang dipilih pendonor, panggil file view agama
        elseif ($_GET['module'] == 'agama') {
            include "modules/agama/view.php";
        }

        // jika halaman konten yang dipilih form pendonor, panggil file form agama
        elseif ($_GET['module'] == 'form_agama') {
            include "modules/agama/form.php";
        }

        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih admin, panggil file view admin
        elseif ($_GET['module'] == 'admin') {
            include "modules/admin/view.php";
        }

        // jika halaman konten yang dipilih form admin, panggil file form admin
        elseif ($_GET['module'] == 'form_admin') {
            include "modules/admin/form.php";
        }
        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih profil, panggil file view profil
        elseif ($_GET['module'] == 'profil') {
            include "modules/profil/view.php";
        }

        // jika halaman konten yang dipilih form profil, panggil file form profil
        elseif ($_GET['module'] == 'form_profil') {
            include "modules/profil/form.php";
        }
        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih password, panggil file view password
        elseif ($_GET['module'] == 'password') {
            include "modules/password/view.php";
        }
}
?>