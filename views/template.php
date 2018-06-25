<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danzlife</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="views/dist/js/plugins/sweetalert/sweetalert.js"></script>
    <!--script src="view/dist/js/plugins/sweetalert/sweetalert.min.js"></script-->
    <link rel="stylesheet" href="views/dist/js/plugins/sweetalert/sweetalert.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="views/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            

    

</head>

<body class="hold-transition sidebar-mini">


<div class="wrapper">



        <?php
        include "views/modules/navbar.php";
        $mvc = new Controller();
        $mvc -> getLinks();

         ?>

</div>
<!-- /.content-wrapper -->


<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="views/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="views/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select').formSelect();
    });

    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd'
        });
    });

    $('input#input_text, textarea#textarea2').characterCounter();
</script>
<script>
    $(document).ready(function(){
        $("#grupoSelect").on('change', function(){
            $("#grupoSelect option:selected").each(function(){
                grupo = $(this).val();
                
                $.post("models/fetchAlumnas.php", {grupo : grupo}, function (data) {
                    $("#alumnaSelect").html(data);
                });
            });
        });
    });
</script>
<script>
    $(function () {
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