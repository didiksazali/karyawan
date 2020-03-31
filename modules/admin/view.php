<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Manajemen Admin

    <a class="btn btn-success btn-social pull-right" href="?module=form_admin&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
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
    // tampilkan pesan Sukses "Data admin baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data admin baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data admin berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data admin berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Admin berhasil diaktifkan"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Admin berhasil diaktifkan.
            </div>";
    }
    // jika alert = 4
    // tampilkan pesan Sukses "Admin berhasil diblokir"
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Admin berhasil diblokir.
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
    elseif ($_GET['alert'] == 8) {
        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data admin berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-danger">
        <div class="box-body">
          <!-- tampilan tabel admin -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Foto</th>
                <th class="center">Username</th>
                <th class="center">Nama Admin</th>
                <th class="center">Status</th>
                <th class="center">Action</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            /// fungsi query untuk menampilkan data dari tabel admin
            $query = mysqli_query($mysqli, "SELECT * FROM admin ORDER BY id_admin DESC")
                                            or die('Ada kesalahan pada query tampil data admin: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
            // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='50' class='center'>$no</td>";

                      if ($data['foto_admin']=="") { ?>
                        <td class='center'><img class='img-user' src='images/admin/user-default.png' width='45'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='images/admin/<?php echo $data['foto_admin']; ?>' width='45'></td>
                      <?php
                      }

              echo "  <td class='center'>$data[username]</td>
                      <td class='center'>$data[nama_admin]</td>
                      <td class='center'>$data[status]</td>

                      <td class='center' width='100'>
                          <div>";

                          if ($data['status']=='aktif') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Blokir" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/admin/proses.php?act=off&id=<?php echo $data['id_admin'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Aktifkan" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/admin/proses.php?act=on&id=<?php echo $data['id_admin'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }
                          ?>

                  <a data-toggle='tooltip' data-placement='top' title='Ubah' class='btn btn-primary btn-sm' href='?module=form_admin&form=edit&id=<?php echo $data["id_admin"]; ?>'>
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
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