<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ucfirst($_GET["action"])?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="views/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="views/dist/js/plugins/sweetalert/sweetalert.js"></script>
    <!--script src="view/dist/js/plugins/sweetalert/sweetalert.min.js"></script-->
    <link rel="stylesheet" href="views/dist/js/plugins/sweetalert/sweetalert.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

</head>

<body class="hold-transition sidebar-mini">


<div class="wrapper">



        <?php

        if($_SESSION["validar"] == true){
            require_once "modules/navbar.php";
        }

        $mvc = new AdminController();
        $mvc -> getLinks();

        if($_SESSION["validar"] == true){
            require_once "modules/footer.php";
        }
         ?>

</div>
<!-- /.content-wrapper -->


</div>

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!--<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- Sparkline -->
<script src="views/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="views/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- DataTables -->
<script src="views/plugins/datatables/jquery.dataTables.js"></script>
<script src="views/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Slimscroll -->
<script src="views/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!--<script src="views/dist/js/adminlte.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="views/dist/js/pages/dashboard.js"></script> -->
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function(){
        $('select').formSelect();
    });

    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd'
        });
    });
    $(document).ready(function(){
        $('.modal').modal();
    });
    $(document).ready(function () {
        $("#inventario").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
        $("#example1").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

    });



</script>
</body>

</html>