<?php
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar'</script>";
    exit();
}
$vistaAlumnas = new AdminController();
?>
<div class="">
    <section class="">
        <div class="" style="padding: 40px;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="card-title" style="display: inline-block;">Alumnas</h3>
                        </div>
                        <!-- Modal Trigger -->
                        <a class="white-text waves-effect waves-light btn modal-trigger" href="#agregarAlumna">Registrar alumna</a>
                        <!-- Modal Structure -->
                        <div id="agregarAlumna" class="modal">
                            <form method="post">
                                <div class="card-body">
                                    <h4>Nueva alumna</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="nombre" id="nombre" type="text" class="validate">
                                            <label for="nombre" style="font-weight: 100;">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="apellido" id="apellido" type="text" class="validate">
                                            <label for="nombre" style="font-weight: 100;">Apellido</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Fecha de nacimiento:</label>
                                        <input type="text" class="datepicker" name="fecha_nacimiento" required>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s4">
                                            <select name="grupo" required>
                                                <option value="" disabled selected>Seleccionar grupo</option>
                                                <?php
                                                    $vistaAlumnas->gruposSelectController();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro">Guardar</button>

                            </form>
                            <?php
                                $vistaAlumnas->registroAlumnaController();
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaAlumnas -> alumnasListController();
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