<?php

session_start();

if(!$_SESSION["validar"]){

    header("location:index.php?action=ingresar");

    exit();

}
$vistaEditarGrupo = new AdminController();
?>
<div class="" style="margin:50px;">


    <section class="" style="">
        <div class="">
            <div class="row">
                <div class="col-md-5">

                    <div class="card card-white">

                        <div class="card-header">
                            <h1 class="card-title">Modificar Grupo</h1>


                        </div>
                        <?php

                        $idG = $_GET["idGrupo"];
                        $grupo = $vistaEditarGrupo->getItemByIdController("grupos", $idG);

                        ?>
                        <form role="form" style="" method="post">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre" value="<?php echo $grupo["nombre"]?>" required>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" style="width: 150px;" name="modificar">Modificar</button>

                            </div>
                    </div>


                    </form>
                    <?php
                    $vistaEditarGrupo->updateGrupoController($idG);
                    ?>
                </div>
                <div class="col-md-6">
                    <img src="views/dist/img/dancer.png" style="padding:40px 20px 20px 160px;" />
                </div>
            </div>

        </div>
</div>
</section>

</div>