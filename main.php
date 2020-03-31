<?php
session_start();
include 'config/fungsi_indotgl.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel | Aplikasi Karyawan Riau POS</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplikasi Karyawan Riau POS">
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
    
    <!-- Fungsi untuk membatasi karakter yang diinputkan -->
    <script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
          i = (i + 1) % field.form.elements.length;
          field.form.elements[i].focus();
          return false;
        };
        // else return false
        return false;
      }
    </script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Su0KcGihFx4m64pHdDLiGTt4LbiNQSo"></script>
      <script type="text/javascript">
          function initialize() {
              // Creating map object
              var map = new google.maps.Map(document.getElementById('map_canvas'), {
                  zoom: 15,
                  center: new google.maps.LatLng(0.510392, 101.449172),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              });

              // creates a draggable marker to the given coords
              var vMarker = new google.maps.Marker({
                  position: new google.maps.LatLng(0.510392, 101.449172),
                  draggable: true
              });

              // adds a listener to the marker
              // gets the coords when drag event ends
              // then updates the input with the new coords
              google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                  $("#txtLat").val(evt.latLng.lat().toFixed(6));
                  $("#txtLng").val(evt.latLng.lng().toFixed(6));

                  map.panTo(evt.latLng);
              });

              // centers the map on markers coords
              map.setCenter(vMarker.position);

              // adds the marker on the map
              vMarker.setMap(map);
          }
      </script>

  </head>
  <body class="skin-blue fixed" onload="initialize();">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="?module=beranda" class="logo">
          <span style="font-size:20px">Riau POS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- panggil file "top-menu.php" untuk menampilkan menu -->
              <?php include "top-menu.php" ?>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
            
            <!-- panggil file "sidebar-menu.php" untuk menampilkan menu -->
            <?php include "sidebar-menu.php" ?>

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- panggil file "content-menu.php" untuk menampilkan content -->
        <?php include "content.php" ?>

        <!-- Modal Logout -->
        <div class="modal fade" id="logout">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-sign-out"> Logout</i></h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin logout? </p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Copyright &copy; 2019.</strong>
      </footer>
    </div><!-- ./wrapper -->

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