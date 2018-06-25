<?php

session_start();

if(!$_SESSION["validar"]){

    header("location:index.php?action=ingresar");

    exit();

}
$vistaEditarAlumna = new AdminController();
?>
<div class="" style="margin:50px;">


    <section class="" style="">
        <div class="">
            <div class="row">
                <div class="col-md-5">

                    <div class="card card-white">

                        <div class="card-header">
                            <h1 class="card-title">Modificar Alumna</h1>


                        </div>
                        <?php

                        $idA = $_GET["idAlumna"];
                        $alumna = $vistaEditarAlumna->getItemByIdController("alumnas",$idA);

                        ?>
                        <form role="form" style="" method="post">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre" value="<?php echo $alumna["nombre"]?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control"  placeholder="" name="apellido" value="<?php echo $alumna["apellido"]?>" required>
                                </div>


                                <div class="row">
                                    <label>Fecha de nacimiento:</label>
                                    <input type="text" class="datepicker" name="fecha_nacimiento" value="<?php echo $alumna["fecha_nacimiento"]?>" required>
                                </div>


                                <div class="row">
                                    <div class="input-field col s4">
                                        <select name="grupo" required>
                                            <option value="" disabled selected>Seleccionar grupo</option>
                                            <?php
                                            $vistaEditarAlumna->gruposSelectController();
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" style="width: 150px;" name="modificar">Modificar</button>

                            </div>
                    </div>


                    </form>
                    <?php
                    $vistaEditarAlumna->updateAlumnaController($idA);
                    ?>
                </div>
                <div class="col-md-6">
                    <img src="views/dist/img/dancing.png" style="padding:40px 20px 20px 160px;" />
                </div>
            </div>

        </div>
</div>
</section>

</div>