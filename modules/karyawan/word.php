<?php
include '../../config/fungsi_indotgl.php';
header("Content-type: application/vnd-ms-word");
header("Content-Disposition: attachment; filename=datakaryawan.doc");
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_karyawan";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>
<center>
    <h3>Data Karyawan Riau POS</h3>
</center>
<table border="1" id="dataTables1" class="table table-bordered table-striped table-hover">
    <!-- tampilan tabel header -->
    <thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">NIK</th>
        <th class="center">Nama</th>
        <th class="center">Tempat Lahir</th>
        <th class="center">Tanggal Lahir</th>
        <th class="center">Jenis Kelamin</th>
        <th class="center">Agama</th>
        <th class="center">Status</th>
        <th class="center">Alamat</th>
        <th class="center">Telepon</th>
        <th class="center">Pendidikan Terakhir</th>
        <th class="center">Jabatan</th>
        <th class="center">Departemen</th>
        <th class="center">Tanggal Masuk</th>
    </tr>
    </thead>
    <!-- tampilan tabel body -->
    <tbody>
    <?php
    // fungsi query untuk menampilkan data dari tabel karyawan
    $query = mysqli_query($mysqli, "SELECT k.*, a.*, j.*, d.* FROM karyawan k INNER JOIN agama a ON 
                                            k.id_agama=a.id_agama INNER JOIN jabatan j ON k.id_jabatan=j.id_jabatan
                                            INNER JOIN departemen d ON k.id_departemen=d.id_departemen ")
    or die('Ada kesalahan pada query tampil Data karyawan: '.mysqli_error($mysqli));
    $no = 1;

    // tampilkan data
    while ($data = mysqli_fetch_assoc($query)) {
        $jk = $data['jenis_kelamin'];
        $tgl_lahir = tgl_indo($data['tanggal_lahir']);
        $tgl_masuk = tgl_indo($data['tanggal_masuk']);
        echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td class='center'>$data[nik_karyawan]</td>
                      <td class='center'>$data[nama_karyawan]</td>
                      <td class='center'>$data[tempat_lahir]</td>
                      <td class='center'>";
                      echo $tgl_lahir;
                      echo "</td>
                      <td class='center'>";
        if($jk=='l'){echo 'Laki-laki';}elseif($jk=='p'){echo 'Perempuan';}
        echo "
                      </td>
                      <td class='center'>$data[agama]</td>
                      <td class='center'>$data[status]</td>
                      <td class='center'>$data[alamat_karyawan]</td>
                      <td class='center'>$data[telepon_karyawan]</td>
                      <td class='center'>$data[pendidikan_terakhir]</td>
                      <td class='center'>$data[jabatan]</td>
                      <td class='center'>$data[departemen]</td>
                      <td class='center'>"; echo $tgl_masuk;
        echo " </td>

        </tr>";
        $no++;
    }
    ?>
    </tbody>
</table>
