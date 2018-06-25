<?php

$idB = $_GET['idGrupo'];
echo $idA;
echo "<script>
        swal({
          title: 'Estas seguro?',
          text: 'Se eliminara la alumna seleccionada de la base de datos.',
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              
            swal('Poof! Your imaginary file has been deleted!', {
              icon: 'success',
            });
          } else {
            swal('No se ha eliminado el registro');
          }
        });
    </script>";


?>