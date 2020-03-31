<!DOCTYPE html>
<?php
require_once "config/database.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login | Admin Karyawan Riau POS</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Login Admin">
    <meta name="author" content="Cloud Code Indonesia" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/riaupos.jpg" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Datepicker -->
    <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Chosen Select -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body class="skin-blue layout-top-nav" style="height: auto;" onload="initialize();">
<div class="wrapper" style="height: auto;">


    <!-- Full Width Column -->
    <div class="content-wrapper" style="min-height: 303px;">
        <div class="container">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

                <div style="color:#3c8dbc" class="login-logo">
                    <img style="margin-top:-12px" src="assets/img/riaupos.jpg" alt="Logo" height="50">
                </div><!-- /.login-logo -->

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
                      <td class='center' width='100'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='detail.php?id_karyawan=$data[id_karyawan]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'></i>
                          </a>";
                            ?>
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
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer center">
        <strong>Copyright &copy; 2019.</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- chosen select -->
<script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- Datepicker -->
<script src="assets/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='assets/plugins/fastclick/fastclick.min.js'></script>
<!-- maskMoney -->
<script src="assets/js/jquery.maskMoney.min.js"></script>
<!-- bootstrap time picker -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.min.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">

    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }

    $(document).ready(function () {
        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            todayHighlight: true
        });

        $('.tanggal2').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            todayHighlight: true
        });

        $('.jampicker').clockpicker({
            autoclose: true
        });


    });

    $(function () {

        // DataTables
        $("#dataTables1").dataTable();
        $('#dataTables2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieA").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: 700,
                color: "#f56954",
                highlight: "#f56954",
                label: "Chrome"
            },
            {
                value: 500,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "IE"
            },
            {
                value: 400,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "FireFox"
            },
            {
                value: 600,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Safari"
            },
            {
                value: 300,
                color: "#3c8dbc",
                highlight: "#3c8dbc",
                label: "Opera"
            },
            {
                value: 100,
                color: "#d2d6de",
                highlight: "#d2d6de",
                label: "Navigator"
            },
            {
                value: 100,
                color: "#D81B60",
                highlight: "#D81B60",
                label: "Navigator"
            },
            {
                value: 100,
                color: "#605ca8",
                highlight: "#605ca8",
                label: "Navigator"
            },
            {
                value: 100,
                color: "#001F3F",
                highlight: "#001F3F",
                label: "Navigator"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        });

        // datepicker plugin
        $('.date-picker').datepicker({
            // autoclose: true,
            // todayHighlight: true
            format: 'dd-mm-yyyy',
        });

        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true});
        //resize the chosen on window resize

        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
            if(event_name != 'sidebar_collapsed') return;
            $('.chosen-select').each(function() {
                var $this = $(this);
                $this.next().css({'width': $this.parent().width()});
            })
        });


        $('#chosen-multiple-style .btn').on('click', function(e){
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
            else $('#form-field-select-4').removeClass('tag-input-style');
        });


    });

</script>

</body>
</html>