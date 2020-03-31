  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_admin']; ?></strong> di Aplikasi Karyawan Riau POS.
          </p>        
        </div>
      </div>
    </div>
    <?php
         $id    = $_SESSION['id_admin'];

             ?>

             <!-- Small boxes (Stat box) -->
             <div class="row">



             </div><!-- /.row -->



  </section><!-- /.content -->