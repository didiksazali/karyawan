 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Departemen
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=departemen"> Departemen </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/departemen/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Departemen</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="departemen" autocomplete="off" required>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=departemen" class="btn btn-default btn-reset">Batal</a>
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
  if (isset($_GET['id_departemen'])) {
      // fungsi query untuk menampilkan data dari tabel departemen
      $query = mysqli_query($mysqli, "SELECT * FROM departemen WHERE id_departemen='$_GET[id_departemen]'")
                                      or die('Ada kesalahan pada query tampil data departemen : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Departemen
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=departemen"> Departemen </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/departemen/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" class="form-control" name="id_departemen" value="<?php echo $data['id_departemen']; ?>" >

              <div class="form-group">
                  <label class="col-sm-2 control-label">Departemen</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="departemen" value="<?php echo $data['departemen']; ?>" autocomplete="off" required>
                  </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                  <a href="?module=departemen" class="btn btn-default btn-reset">Batal</a>
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