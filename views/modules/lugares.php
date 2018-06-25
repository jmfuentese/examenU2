<div class="content" style="width:75%; margin:50px auto;">
    <div>
        <h4 class="center-align">Orden de envios de comprobantes</h4>
        <h5 class="center-align">Festival Verano 2018</h5>
    </div>
    <table class="striped">
        <thead>
          <tr>
              <th>ID</th>
              <th>Alumna</th>
              <th>Grupo</th>
              <th>Mama</th>
              <th>Fecha de Pago</th>
              <th>Fecha de Envio</th>
          </tr>
        </thead>

        <tbody>
          <?php 
            $lugares = new Controller();
            $lugares -> pagosListController();
           ?>
        </tbody>
      </table>
</div>