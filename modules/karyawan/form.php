 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> karyawan </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nik_karyawan" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_karyawan" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control tanggal" name="tanggal_lahir" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="jenis_kelamin" value="l" >
                            Laki-laki
                        </label>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="jenis_kelamin" value="p" >
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-5">
                        <?php
                        $query2 = mysqli_query($mysqli, "SELECT * FROM agama")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_agama" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                <option value="<?php echo $data2['id_agama']; ?>" ><?php echo $data2['agama']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" name="status" autocomplete="off" required>
                            <option></option>
                            <option value="lajang">Lajang</option>
                            <option value="menikah">Menikah</option>
                            <option value="cerai">Cerai</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="alamat_karyawan" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="telepon_karyawan" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pendidikan_terakhir" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-5">
                        <?php
                        $query3 = mysqli_query($mysqli, "SELECT * FROM jabatan")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_jabatan" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data3  = mysqli_fetch_assoc($query3)) { ?>
                                <option value="<?php echo $data3['id_jabatan']; ?>"><?php echo $data3['jabatan']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Departemen</label>
                    <div class="col-sm-5">
                        <?php
                        $query4 = mysqli_query($mysqli, "SELECT * FROM departemen")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_departemen" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data4  = mysqli_fetch_assoc($query4)) { ?>
                                <option value="<?php echo $data4['id_departemen']; ?>"><?php echo $data4['departemen']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control tanggal2" name="tanggal_masuk" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto Karyawan</label>
                    <div class="col-sm-5">
                        <input type="file" name="foto_karyawan">
                    </div>
                </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='detail') {
  if (isset($_GET['id_karyawan'])) {
      // fungsi query untuk menampilkan data dari tabel karyawan
      $query = mysqli_query($mysqli, "SELECT k.*, a.*, j.*, d.* FROM karyawan k INNER JOIN agama a ON 
                                            k.id_agama=a.id_agama INNER JOIN jabatan j ON k.id_jabatan=j.id_jabatan
                                            INNER JOIN departemen d ON k.id_departemen=d.id_departemen 
                                            WHERE id_karyawan='$_GET[id_karyawan]'")
                                      or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Detail Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> Karyawan </a></li>
      <li class="active"> Detail </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" class="form-control" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" >

                <div class="form-group">
                    <label class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nik_karyawan" value="<?php echo $data['nik_karyawan']; ?>" autocomplete="off" required>
                    </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $data['nama_karyawan']; ?>" autocomplete="off" required>
                  </div>
              </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control tanggal" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="jenis_kelamin" value="l" <?php if ($data['jenis_kelamin']=='l') {echo 'checked';} ?> >
                            Laki-laki
                        </label>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input type="radio" name="jenis_kelamin" value="p" <?php if ($data['jenis_kelamin']=='p') {echo 'checked';} ?> >
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-5">
                        <?php
                        $query2 = mysqli_query($mysqli, "SELECT * FROM agama")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_agama" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                              <option value="<?php echo $data2['id_agama']; ?>"  <?php if($data2['id_agama']==$data['id_agama']){ echo 'selected'; } ?> ><?php echo $data2['agama']; ?></option>
                       
                              <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" name="status" autocomplete="off" required>
                            <option></option>
                            <option value="lajang" <?php if($data['status']=='lajang'){ echo "selected";} ?>>Lajang</option>
                            <option value="menikah" <?php if($data['status']=='menikah'){ echo "selected";} ?>>Menikah</option>
                            <option value="cerai" <?php if($data['status']=='cerai'){ echo "selected";} ?>>Cerai</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="alamat_karyawan" value="<?php echo $data['alamat_karyawan']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="telepon_karyawan" value="<?php echo $data['telepon_karyawan']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Pendidikan Terakhir</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pendidikan_terakhir" value="<?php echo $data['pendidikan_terakhir']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-5">
                        <?php
                        $query3 = mysqli_query($mysqli, "SELECT * FROM jabatan")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_jabatan" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data3  = mysqli_fetch_assoc($query3)) { ?>
                                <option value="<?php echo $data3['id_jabatan']; ?>"  <?php if($data3['id_jabatan']==$data['id_jabatan']){ echo 'selected'; } ?> ><?php echo $data3['jabatan']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Departemen</label>
                    <div class="col-sm-5">
                        <?php
                        $query4 = mysqli_query($mysqli, "SELECT * FROM departemen")
                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                        ?>
                        <select type="text" class="form-control" name="id_departemen" autocomplete="off" required>
                            <option></option>
                            <?php
                            while ($data4  = mysqli_fetch_assoc($query4)) { ?>
                                <option value="<?php echo $data4['id_departemen']; ?>"  <?php if($data4['id_departemen']==$data['id_departemen']){ echo 'selected'; } ?> ><?php echo $data4['departemen']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control tanggal2" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk']; ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto Karyawan</label>
                    <div class="col-sm-5">
                        <input type="file" name="foto_karyawan">
                        <br/>
                        <?php
                        if ($data['foto_karyawan']=="") { ?>
                            <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/karyawan/user-default.png" width="128">
                            <?php
                        }
                        else { ?>
                            <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/karyawan/<?php echo $data['foto_karyawan']; ?>" width="128">
                            <?php
                        }
                        ?>
                    </div>
                </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->

          </form>
        </div><!-- /.box -->


      </div><!--/.col -->

    </div>   <!-- /.row -->

  </section><!-- /.content -->
<?php
}
?>