<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
  <!-- tampilkan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Admin
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=admin"> Admin </a></li>
      <li class="active"> Input </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/admin/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="username" autocomplete="off" required>
                  </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="password" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Admin</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_admin" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Foto Admin</label>
                <div class="col-sm-5">
                    <input type="file" name="foto_admin">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=admin" class="btn btn-default btn-reset">Batal</a>
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
elseif ($_GET['form']=='edit') {
  	if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel admin
      $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_GET[id]'")
                                      or die('Ada kesalahan pada query tampil data admin : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>
	<!-- tampilkan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Data Admin
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
      <li><a href="?module=admin"> Admin </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/admin/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

              <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $data['username']; ?>">
                  </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Kosongkan password jika tidak diubah">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Admin</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_admin" autocomplete="off" value="<?php echo $data['nama_admin']; ?>" required>
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Foto Admin</label>
                <div class="col-sm-5">
                  <input type="file" name="foto_admin">
                  <br/>
                <?php  
                if ($data['foto_admin']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/admin/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/admin/<?php echo $data['foto_admin']; ?>" width="128">
                <?php
                }
                ?>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="modules/admin/proses.php?act=delete&id_admin=<?php echo $data['id_admin'];?>" onclick="return confirm('Anda yakin ingin menghapus admin <?php echo $data['nama_admin']; ?> ?');" class="btn btn-danger btn-reset">Hapus</a>
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