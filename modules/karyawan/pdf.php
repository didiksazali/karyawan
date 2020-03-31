<?php
session_start();
ob_start();
include '../../config/fungsi_indotgl.php';
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
    <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Data Karyawan Riau POS</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>


    <table align="center" width="100%">
        <tr>
            <td align="center">
<!--                <img src="../../../../logolaporan1.png" style="width: 60px; height: 60px" hspace="10px">-->
            </td>
            <td align="center" padding="5px" style="font-size: 22px;">
                Karyawan Riau POS
                <br>
            </td>
            <td align="center">
<!--                <img src="../../../../logolaporan2.png" style="width: 60px; height: 60px" hspace="10px">-->
            </td>
        </tr>
    </table>



    <hr><br>
    <div id="isi">
        <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
            <tr class="tr-title">
                <th height="20" align="center" valign="middle">No.</th>
                <th height="20" align="center" valign="middle">NIK</th>
                <th height="20" align="center" valign="middle">Nama</th>
                <th height="20" align="center" valign="middle">Tempat Lahir</th>
                <th height="20" align="center" valign="middle">Tanggal Lahir</th>
                <th height="20" align="center" valign="middle">Jenis Kelamin</th>
                <th height="20" align="center" valign="middle">Agama</th>
                <th height="20" align="center" valign="middle">Status</th>
                <th height="20" align="center" valign="middle">Alamat</th>
                <th height="20" align="center" valign="middle">Telepon</th>
                <th height="20" align="center" valign="middle">Pendidikan Terakhir</th>
                <th height="20" align="center" valign="middle">Jabatan</th>
                <th height="20" align="center" valign="middle">Departemen</th>
                <th height="20" align="center" valign="middle">Tanggal Masuk</th>
            </tr>
            </thead>
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
                    <td width='35' height='13' align='center' valign='middle'>$no</td>
                    <td width='90' height='13' align='center' valign='middle'>$data[nik_karyawan]</td>
                    <td width='90' height='13' align='center' valign='middle'>$data[nama_karyawan]</td>
                    <td width='90' height='13' align='center' valign='middle'>$data[tempat_lahir]</td>
                    <td width='90' height='13' align='center' valign='middle'>";
                    echo $tgl_lahir;
                    echo "</td>
                    <td width='90' height='13' align='center' valign='middle'>";
                    if($jk=='l'){echo 'Laki-laki';}elseif($jk=='p'){echo 'Perempuan';}
                    echo "</td>
                    <td width='60' height='13' align='center' valign='middle'>$data[agama]</td>
                    <td width='60' height='13' align='center' valign='middle'>$data[status]</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[alamat_karyawan]</td>
                    <td width='80' height='13' align='center' valign='middle'>$data[telepon_karyawan]</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[pendidikan_terakhir]</td>
                    <td width='80' height='13' align='center' valign='middle'>$data[jabatan]</td>
                    <td width='80' height='13' align='center' valign='middle'>$data[departemen]</td>
                    <td width='90' height='13' align='center' valign='middle'>";
                    echo $tgl_masuk;
                    echo"</td>
                  ";
        ?>

        </tr>
        <?php
        $no++;
    }
    ?>
            </tbody>
        </table>


    </div>
    </body>
    </html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$nama_dokumen='Data Karyawan';
$filename=$nama_dokumen.".pdf";
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../html2pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>