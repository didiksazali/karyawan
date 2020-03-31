
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
    // jika menu karyawan dipilih, menu karyawan aktif
    if ($_GET["module"]=="karyawan") { ?>
        <li class="active treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
                <li><a href="?module=jabatan"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li><a href="?module=departemen"><i class="fa fa-circle-o"></i> Departemen </a></li>
                <li><a href="?module=agama"><i class="fa fa-circle-o"></i> Agama </a></li>
            </ul>
        </li>
        <?php
    }
    // jika menu jabatan dipilih, menu jabatan aktif
    elseif ($_GET["module"]=="jabatan") { ?>
        <li class="active treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
                <li class="active"><a href="?module=jabatan"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li><a href="?module=departemen"><i class="fa fa-circle-o"></i> Departemen </a></li>
                <li><a href="?module=agama"><i class="fa fa-circle-o"></i> Agama </a></li>
            </ul>
        </li>
        <?php
    }
    // jika menu departemen dipilih, menu departemen aktif
    elseif ($_GET["module"]=="departemen") { ?>
        <li class="active treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
                <li><a href="?module=jabatan"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li class="active"><a href="?module=departemen"><i class="fa fa-circle-o"></i> Departemen </a></li>
                <li><a href="?module=agama"><i class="fa fa-circle-o"></i> Agama </a></li>
            </ul>
        </li>
        <?php
    }
    // jika menu agama dipilih, menu agama aktif
    elseif ($_GET["module"]=="agama") { ?>
        <li class="active treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
                <li><a href="?module=jabatan"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li><a href="?module=departemen"><i class="fa fa-circle-o"></i> Departemen </a></li>
                <li class="active"><a href="?module=agama"><i class="fa fa-circle-o"></i> Agama </a></li>
            </ul>
        </li>
        <?php
    }
    // jika menu tidak dipilih, menu tidak aktif
    else { ?>
        <li class="treeview">
            <a href="javascript:void(0);">
                <i class="fa fa-file-text"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=karyawan"><i class="fa fa-circle-o"></i> Karyawan </a></li>
                <li><a href="?module=jabatan"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li><a href="?module=departemen"><i class="fa fa-circle-o"></i> Departemen </a></li>
                <li><a href="?module=agama"><i class="fa fa-circle-o"></i> Agama </a></li>
            </ul>
        </li>
        <?php
    }
	// jika menu admin dipilih, menu admin aktif
	if ($_GET["module"]=="admin" || $_GET["module"]=="form_admin") { ?>
		<li class="active">
			<a href="?module=admin"><i class="fa fa-user"></i> Manajemen Admin</a>
	  	</li>
	<?php
	}
	// jika tidak, menu admin tidak aktif
	else { ?>
		<li>
			<a href="?module=admin"><i class="fa fa-user"></i> Manajemen Admin</a>
	  	</li>
	<?php
	}
	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
