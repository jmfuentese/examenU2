<?php
/*La clase Controller contiene todos los controladores para la seccion de usuario normal.
Permite crear registros de pagos y listar la informacion solicitada*/
	class Controller{
        //template() es el controlador encargado de invocar el archivo de la plantilla
		public function template(){
			include "views/template.php";
		}
        //controlador para redireccionamiento mediante el parametro action en la url
		public function getLinks(){
		    //se valida que el parametro action este disponible
			if(isset($_GET["action"])){
				$link = $_GET["action"];

			}else{
				$link = "registro";
            }
            //llama al modelo de creador de las rutas en la clase Rutas
  			$resp = Pages::linkPagesM($link);
			//se incluye el archivo de la ruta generada
  			include $resp;
		}

		//controlador para listar todos los registros de alumnas
        public static function alumnasListController(){
		    //se llama al modelo general para listar elementos y se le pasa como parametro el nombre de la tabla
            //la respuesta se recibe en una variable
            $respuesta = Model::getListModel("alumnas");

            //se imprime cada registro de alumnas mediante un foreach a modo de opcion para un select
            foreach($respuesta as $row => $alumna){
                //se concatena el nombre y apellido de cada alumna en una variable
                $str = $alumna["nombre"]." ".$alumna["apellido"];
                //se imprime la opcion y se pasa la variable con el nombre completo de la alumna tanto al atributo value
                //como al texto interno de la opcion
                echo '<option class="alumnas" value="'.$str.'">'.$str.'</option>';
            }
        }

        //controlador para listar todos los registros de grupos
        public static function gruposListController(){
		    //se llama al modelo para extraer los registros de grupos de la base de datos
            $respuesta = Model::getListModel("grupos");

            //se imprime cada registro de grupos mediante un foreach a modo de opcion para un select
            foreach($respuesta as $row => $grupo){
                echo '<option value="'.$grupo["nombre"].'">'.$grupo["nombre"].'</option>';
            }
        }

        //controlador para listar todos los registros de pagos
        public static function pagosListController(){
            //se llama al modelo para extraer los registros de pagos de la base de datos
          $respuesta = Model::getPagosListModel("pagos");

            //se imprime cada registro de grupos mediante un foreach a modo de opcion para un select
          foreach($respuesta as $row => $item){
                //se llama al modelo getItemById para obtener un solo registro pasandole como parametros
                //el nombre de la tabla y el id del registro que se desea obtener
                //esto se hace para cada alumna y grupo en cada registro de pagos
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

        //controlador para el registro de pagos
        public static function registroPagoController(){
		    //se verifica que se hayan enviado los datos del formulario de registro de pago
            if(isset($_POST["grupo"]) && isset($_POST["alumna"]) && isset($_POST["fecha_pago"]) && isset($_POST["folio"])){
                /*En esta seccion se obtienen los datos del archivo subido por el usuario como comprobante de pago*/
                $file_name = $_FILES["archivo"]["name"];
                $file_size = $_FILES["archivo"]["size"];
                $file_type = $_FILES["archivo"]["type"];
                $file_temp_loc = $_FILES["archivo"]["tmp_name"];
                //se concatena el nombre del archivo con la hora de subida y la url de la carpeta donde se guardara,
                //la hora se concatena para diferenciar cada imagen en caso de que haya coincidencias en los nombres
                $file_store = "admin/uploads/".date("h_i_s")."_".$file_name;


                //Se valida que el tamaño del archivo sea menor a 8megabytes
                if ($file_size <= 8000000) {
                    //se valida el formato de la imagen, solo se aceptan jpg, jpeg y png
                    if ($file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/jpeg" ) {
                        //se mueve el archivo a la carpeta de archivos dentro del servidor
                        move_uploaded_file($file_temp_loc, $file_store);
                        //se obtiene el nombre y el apellido de la alumna por separado y se almacenan en una variable como un array
                        $alumna = explode(" ", $_POST["alumna"]);
                        //se concatena el nombre y apellido de la mama en una sola variable
                        $mama = $_POST["nombre_mama"] . " " . $_POST["apellido_mama"];
                        //se prepara el array asociativo que contiene los datos para mandarselos al modelo y hacer la insercion en la base
                        //de datos
                        $datos = array("grupo" => $_POST["grupo"], "nombre" => $alumna[0], "apellido" => $alumna[1],
                            "mama" => $mama, "fecha_pago" => $_POST["fecha_pago"], "archivo" => date("h_i_s")."_".$file_name,
                            "fecha_registro" => date("Y-m-d h:i:s"), "folio" => $_POST["folio"]);
                        //se crea una instancia de la clase Model
                        $respuesta = new Model();
                        //Se llama al modelo para registrar el nuevo pago y se le pasa el array asociativo
                        $respuesta->registroPagoModel("pagos", $datos);
                        //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                        if ($respuesta) {
                            //Impresiones de sweetalert en caso de exito
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
                            //Impresiones de sweetalert en caso de error
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
                        //Impresiones de sweetalert en caso de formato incorrecto
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
                    //Impresiones de sweetalert en caso de tamaño excesivo del archivo
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
