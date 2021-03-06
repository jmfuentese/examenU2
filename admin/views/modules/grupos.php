<?php
//session_start();
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar';</script>";
    exit();
}

$vistaGrupos = new AdminController();
?>
<div class="">
    <section class="">
        <div class="" style="padding: 40px;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="card-title" style="display: inline-block;">Grupos</h3>
                        </div>
                        <!-- Modal Trigger -->
                        <a class="white-text waves-effect waves-light btn modal-trigger" href="#agregarGrupo">Registrar grupo</a>
                        <!-- Modal Structure -->
                        <div id="agregarGrupo" class="modal">
                            <form method="post">
                                <div class="card-body">
                                    <h4>Nuevo grupo</h4>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="nombre" id="grupo" type="text" class="validate">
                                            <label for="nombre" style="font-weight: 100;">Nombre</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro">Guardar</button>

                            </form>
                            <?php
                                $vistaGrupos->registroGrupoController();
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
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vistaGrupos -> gruposListController();
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


