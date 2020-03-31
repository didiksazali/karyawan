 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Agama
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=agama"> Agama </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/agama/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="agama" autocomplete="off" required>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=agama" class="btn btn-default btn-reset">Batal</a>
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
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id_agama'])) {
      // fungsi query untuk menampilkan data dari tabel agama
      $query = mysqli_query($mysqli, "SELECT * FROM agama WHERE id_agama='$_GET[id_agama]'")
                                      or die('Ada kesalahan pada query tampil data agama : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Agama
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=agama"> Agama </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/agama/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" class="form-control" name="id_agama" value="<?php echo $data['id_agama']; ?>" >

              <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="agama" value="<?php echo $data['agama']; ?>" autocomplete="off" required>
                  </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=agama" class="btn btn-default btn-reset">Batal</a>
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