<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";

// fungsi query untuk menampilkan data dari tabel admin
$query = mysqli_query($mysqli, "SELECT id_admin, nama_admin, foto_admin FROM admin WHERE id_admin='$_SESSION[id_admin]'")
                                or die('Ada kesalahan pada query tampil Manajemen User: '.mysqli_error($mysqli));

// tampilkan data
$data = mysqli_fetch_assoc($query);
?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- User image -->

  <?php  
  if ($data['foto_admin']=="") { ?>
    <img src="images/admin/user-default.png" class="user-image" alt="User Image"/>
  <?php
  }
  else { ?>
    <img src="images/admin/<?php echo $data['foto_admin']; ?>" class="user-image" alt="User Image"/>
  <?php
  }
  ?>

    <span class="hidden-xs"><?php echo $data['nama_admin']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">

      <?php  
      if ($data['foto_admin']=="") { ?>
        <img src="images/admin/user-default.png" class="img-circle" alt="User Image"/>
      <?php
      }
      else { ?>
        <img src="images/admin/<?php echo $data['foto_admin']; ?>" class="img-circle" alt="User Image"/>
      <?php
      }
      ?>

      <p>
        <?php echo $data['nama_admin']; ?>
      </p>
    </li>
    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profil" class="btn btn-default btn-flat">Profil</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>