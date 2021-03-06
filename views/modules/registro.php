<?php
    //Se crea una instancia nueva de la clase Controller para la vista de registro
    $vistaRegistro = new Controller();
 ?>
<div class="content" style="width:35%; margin:50px auto;">
    <div>
        <h4 class="center-align">Formulario de envío de Comprobantes</h4>
        <h5 class="center-align">Festival Verano 2018</h5>
    </div>
    <!--FORM INPUT - select (dropdown) de grupos-->
    <form method="post" enctype="multipart/form-data">
        <div class="input-field col s12" style="padding-top: 0px;">
            <select name="grupo" id="grupoSelect" required>
                <option value="" disabled>Seleccionar grupo</option>
                <?php
                    //se invoca el controlador para el listado de grupos
                    $vistaRegistro->gruposListController();
                 ?>
            </select>
        </div>
        <!--FORM INPUT - select (dropdown) de alumnas-->
        <select name="alumna" id="alumnaSelect">
            <option value="" disabled>Seleccionar alumna</option>
            <?php
            //se invoca el controlador para el listado de alumnas
            //posteriormente se reemplaza el contenido mediante la peticion ajax que se encuentra en el template
            $vistaRegistro->alumnasListController();
            ?>
        </select>
        <!--<div class="input-field col s12" style="padding-top: 25px;">

        </div>-->
        <!--FORM INPUT - nombre de la mama-->
        <label>Nombre de la mama:</label>
        <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" name="nombre_mama" required>
              <label for="first_name">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" name="apellido_mama" required>
              <label for="last_name">Apellido</label>
            </div>
        </div>
        <!--FORM INPUT - fecha de pago-->
        <label>Fecha de pago:</label>
        <input type="text" class="datepicker" name="fecha_pago" required>
        <label>Comprobante de folio:</label>
        <div class="file-field input-field">
          <div class="btn">
            <span>Buscar archivo</span>
            <input type="file" name="archivo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text"  required>
          </div>
        </div>
        <!--FORM INPUT - folio de autorizacion de pago-->
        <div class="row">
          <div class="input-field col s6">
            <input id="input_text" type="number" data-length="20" name="folio" required>
            <label for="input_text">Folio de autorización</label>
          </div>
        </div>
        <!--FORM INPUT - boton para enviar el formulario-->
        <div class="row" >
          <div class="input-field col s6">
              <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                <i class="material-icons right">save</i>
              </button>
          </div>
      </div>
      </div>
      
    </form>
    <?php
        //se invoca el controlador para el registro de pagos el cual obtiene mediante POST los campos registrados
        //en el formulario
        $vistaRegistro->registroPagoController();
    ?>
</div>