<?php

	class Controller{

		public function template(){
			include "views/template.php";
		}

		public function getLinks(){
			if(isset($_GET["action"])){
				$link = $_GET["action"];

			}else{
				$link = "registro";
            }
  			$resp = Pages::linkPagesM($link);

  			include $resp;
		}

        public static function alumnasListController(){
            $respuesta = Model::getListModel("alumnas");

            foreach($respuesta as $row => $alumna){
                $str = $alumna["nombre"]." ".$alumna["apellido"];
                echo '<option class="alumnas" value="'.$str.'">'.$str.'</option>';
            }
        }

        public static function gruposListController(){
            $respuesta = Model::getListModel("grupos");

            foreach($respuesta as $row => $grupo){
                echo '<option value="'.$grupo["nombre"].'">'.$grupo["nombre"].'</option>';
            }
        }

        public static function pagosListController(){
          $respuesta = Model::getPagosListModel("pagos");

          foreach($respuesta as $row => $item){
              
                $alumna = Model::getItemById("alumnas", $item["id_alumna"]);
                $grupo = Model::getItemById("grupos", $item["id_grupo"]);
                echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$alumna["nombre"]." ".$alumna["apellido"].'</td>
                    <td>'.$grupo["nombre"].'</td>
                    <td>'.$item["mama"].'</td>
                    <td>'.$item["fecha_pago"].'</td>
                    <td>'.$item["fecha_registro"].'</td>
                    </tr>';

            }
        }

        public static function registroPagoController(){
            if(isset($_POST["grupo"]) && isset($_POST["alumna"]) && isset($_POST["fecha_pago"]) && isset($_POST["folio"])){
                //$target_dir = "../uploads/";
                $file_name = $_FILES["archivo"]["name"];
                $file_size = $_FILES["archivo"]["size"];
                $file_type = $_FILES["archivo"]["type"];
                $file_temp_loc = $_FILES["archivo"]["tmp_name"];
                $file_store = "admin/uploads/".date("h_i_s")."_".$file_name;



                if ($file_size <= 8000000) {
                    if ($file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/jpeg" ) {
                        move_uploaded_file($file_temp_loc, $file_store);
                        $alumna = explode(" ", $_POST["alumna"]);
                        $mama = $_POST["nombre_mama"] . " " . $_POST["apellido_mama"];
                        $datos = array("grupo" => $_POST["grupo"], "nombre" => $alumna[0], "apellido" => $alumna[1],
                            "mama" => $mama, "fecha_pago" => $_POST["fecha_pago"], "archivo" => date("h_i_s")."_".$file_name,
                            "fecha_registro" => date("Y-m-d h:i:s"), "folio" => $_POST["folio"]);
                        $respuesta = new Model();
                        $respuesta->registroPagoModel("pagos", $datos);
                        //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                        if ($respuesta) {

                            echo "<script>
                            swal({
                              type:'success',
                              title: 'Pago registrado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=lugares';
                                tr.hide();
                             });
                          </script>";
                        } else {
                            echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar el pago!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=registro';
                                tr.hide();
                             });
                        </script>";
                        }
                    }else{
                        echo "<script>
                            swal({
                              type:'error',
                              title: 'No se pudo cargar la imagen seleccionada, porfavor verifica que tenga un formato correcto (.jpg, .jpeg, .png).',
                              showConfirmButton: false,
                              timer:4500
                            });
                        </script>";
                    }
                }else{
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'No se pudo cargar la imagen seleccionada, porfavor verifica que su tamaño no exceda los 8Mb',
                              showConfirmButton: false,
                              timer:4500
                            });
                        </script>";
                }
            }
        }


	}
