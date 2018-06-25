<?php
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar'</script>";
    exit();
}
$vistaPagos = new AdminController();
?>
<div class="">
    <section class="">
        <div class="" style="padding: 40px;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="card-title" style="display: inline-block;">Pagos</h3>
                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="pagosTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumna</th>
                            <th>Grupo</th>
                            <th>Mama</th>
                            <th>Fecha de pago</th>
                            <th>Comprobante</th>
                            <th>Fecha de registro</th>
                            <th>Folio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaPagos -> pagosListController();
                        //$vistaUsuario -> borrarUsuarioController();
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div>
</section>
</div>