<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Karyawan

          <table class="pull-right">
              <tr>
                  <td style="padding-right: 10px">
                      <a class="btn btn-success btn-social pull-right" href="?module=form_karyawan&form=add" title="Tambah Data" data-toggle="tooltip">
                          <i class="fa fa-plus"></i> Tambah
                      </a>
                  </td>
                  <td style="padding-right: 10px">
                      <a class="btn btn-warning btn-social pull-right" href="modules/karyawan/excel.php" title="Export to Excel" data-toggle="tooltip">
                          <i class="fa fa-file-excel-o"></i> Excel
                      </a>
                  </td>
                  <td style="padding-right: 10px">
                      <a class="btn btn-primary btn-social pull-right" href="modules/karyawan/word.php" title="Export to Word" data-toggle="tooltip">
                          <i class="fa fa-file-word-o"></i> Word
                      </a>
                  </td>
                  <td>
                      <a class="btn btn-danger btn-social pull-right" href="modules/karyawan/pdf.php" title="Export to PDF" data-toggle="tooltip">
                          <i class="fa fa-file-pdf-o"></i> PDF
                      </a>
                  </td>
              </tr>
          </table>




  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data karyawan baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data karyawan berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data karyawan berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data karyawan berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data karyawan berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data karyawan berhasil dihapus.
            </div>";
    }
    // jika alert = 5
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
    elseif ($_GET['alert'] == 5) {
        echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload sudah benar.
            </div>";
    }
    // jika alert = 6
    // tampilkan pesan Upload Gagal "Pastikan ukuran foto tidak lebih dari 1MB"
    elseif ($_GET['alert'] == 6) {
        echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan ukuran foto tidak lebih dari 1MB.
            </div>";
    }
    // jika alert = 7
    // tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
    elseif ($_GET['alert'] == 7) {
        echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-danger">
        <div class="box-body">
          <!-- tampilan tabel karyawan -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Foto</th>
                <th class="center">NIK</th>
                <th class="center">Nama</th>
                <th class="center">Jabatan</th>
                <th class="center">Departemen</th>
                <th class="center">Action</th>
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
              echo "<tr>
                      <td width='30' class='center'>$no</td>";

                      if ($data['foto_karyawan']=="") { ?>
                        <td class='center'><img class='img-user' src='images/karyawan/user-default.png' width='45'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='images/karyawan/<?php echo $data['foto_karyawan']; ?>' width='45'></td>
                      <?php
                      }
                       echo "
                      
                      <td class='center'>$data[nik_karyawan]</td>
                      <td class='center'>$data[nama_karyawan]</td>
                      <td class='center'>$data[jabatan]</td>
                      <td class='center'>$data[departemen]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_karyawan&form=detail&id_karyawan=$data[id_karyawan]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/karyawan/proses.php?act=delete&id_karyawan=<?php echo $data['id_karyawan'];?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_karyawan']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
               </div>
                      </td>
                    </tr>
          <?php
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content