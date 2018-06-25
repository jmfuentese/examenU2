<?php

	class AdminController{

		public function template(){
			include "views/template.php";
		}

		public function getLinks(){
			if(isset($_GET["action"])){
				$link = $_GET["action"];

			}else{
				$link = "index";
			}

			$resp = Pages::linkPagesM($link);

			include $resp;
		}

		public static function loginController(){
            if(isset($_POST["usuario"]) && isset($_POST["password"])){
                $datos = array("usuario"=>$_POST["usuario"], "password"=>$_POST["password"]);
                $respuesta = AdminModel::loginModel("usuarios", $datos);
                //Valiación de la respuesta del modelo para ver si es un usuario correcto.
                if($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == $_POST["password"]){
                    //session_start();
                    $_SESSION["validar"] = true;
                    $_SESSION["usuario"] = $_POST["usuario"];
                    $_SESSION["password"] = $_POST["password"];
                    //header("location:index.php?action=dashboard");
                    echo "<script>window.location.href = 'index.php?action=dashboard'</script>";
                }else{
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Error! Verifica tus credenciales.',
                              showConfirmButton: false,
                              timer:2000
                            },
                            function () {
                                window.location.href = 'index.php?action=fallo';
                                tr.hide();
                             });
                        </script>";
                }

            }
		}

		public static function registroAlumnaController(){
            if(isset($_POST["nombre"]) && isset($_POST["apellido"])){

                $datos = array( "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"],
                    "fecha_nacimiento"=>$_POST["fecha_nacimiento"], "grupo"=>$_POST["grupo"]);
                $respuesta =  new AdminModel();
                $respuesta->registroAlumnaModel("alumnas",$datos);
                if($respuesta){
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Alumna registrada exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=alumnas';
                                tr.hide();
                             });
                          </script>";
                }else{
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar la alumna!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=alumnas';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function registroGrupoController(){
            if(isset($_POST["nombre"])){

                $datos = array( "nombre"=>$_POST["nombre"]);
                $respuesta =  new AdminModel();
                $respuesta->registroGrupoModel("grupos",$datos);
                if($respuesta){
                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Grupo registrado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=grupos';
                                tr.hide();
                             });
                          </script>";
                }else{
                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al registrar la alumna!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=grupos';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function updateAlumnaController($idA){
            if(isset($_POST["nombre"])){

                $datos = array( "nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"],
                    "fecha_nacimiento"=>$_POST["fecha_nacimiento"], "grupo"=>$_POST["grupo"]);
                $respuesta =  new AdminModel();
                $r = $respuesta->updateAlumnaModel("alumnas",$datos, $idA);
                if($r){

                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Alumna actualizada exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=alumnas';
                                tr.hide();
                             }
                            );
                          </script>";
                }else{

                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al actualizar el registro!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=alumnas';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function updateGrupoController($idG){
            if(isset($_POST["nombre"])){

                $datos = array( "nombre"=>$_POST["nombre"]);
                $respuesta =  new AdminModel();
                $r = $respuesta->updateGrupoModel("grupos",$datos, $idG);
                if($r){

                    echo "<script>
                            swal({
                              type:'success',
                              title: 'Grupo actualizado exitosamente!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=grupos';
                                tr.hide();
                             }
                            );
                          </script>";
                }else{

                    echo "<script>
                            swal({
                              type:'error',
                              title: 'Hubo un error al actualizar el registro!',
                              showConfirmButton: false,
                              timer:2500
                            },
                            function () {
                                window.location.href = 'index.php?action=grupos';
                                tr.hide();
                             });
                        </script>";
                }

            }
        }

        public static function gruposListController(){
            if (isset($_GET["idBG"])){
                AdminModel::borrarModel("grupos", $_GET["idBG"]);
                echo "<script>
                    swal({
                      type:'success',
                      title: 'Grupo eliminado exitosamente!',
                      showConfirmButton: false,
                      timer:2500
                    },
                    function () {
                        window.location.href = 'index.php?action=grupos';
                        tr.hide();
                     }
                    );
                  </script>";
            }
            $respuesta = AdminModel::getListModel("grupos");

            foreach($respuesta as $row => $grupo){
                echo'<tr>
                    <td>'.$grupo["id"].'</td>
                    <td>'.$grupo["nombre"].'</td>
                    <td>
                        <a href="index.php?action=editarGrupo&idGrupo='.$grupo["id"].'"><i class="material-icons prefix blue-text">edit</i></a>
                        <a href="index.php?action=grupos&idBG='.$grupo["id"].'"><i class="material-icons prefix red-text">delete</i></a>
                    </td>
                    </tr>';
            }
        }

        public static function gruposSelectController(){
            $respuesta = AdminModel::getListModel("grupos");

            foreach($respuesta as $row => $grupo){
                echo '<option>'.$grupo["nombre"].'</option>';
            }
        }

        public static function alumnasListController(){

		    if (isset($_GET["idB"])){
                AdminModel::borrarModel("alumnas", $_GET["idB"]);
                echo "<script>
                    swal({
                      type:'success',
                      title: 'Alumna eliminada exitosamente!',
                      showConfirmButton: false,
                      timer:2500
                    },
                    function () {
                        window.location.href = 'index.php?action=alumnas';
                        tr.hide();
                     }
                    );
                  </script>";
            }
            $respuesta = AdminModel::getListModel("alumnas");

            foreach($respuesta as $row => $alumna){
                echo'<tr>
                    <td>'.$alumna["id"].'</td>
                    <td>'.$alumna["nombre"].'</td>
                    <td>'.$alumna["apellido"].'</td>
                    <td>'.$alumna["fecha_nacimiento"].'</td>
                    <td>'.$alumna["grupo"].'</td>
                    <td>
                        <a href="index.php?action=editarAlumna&idAlumna='.$alumna["id"].'"><i class="material-icons prefix blue-text">edit</i></a>
                        <a href="index.php?action=alumnas&idB='.$alumna["id"].'"><i class="material-icons prefix red-text">delete</i></a>
                    </td>
                    </tr>';
            }
        }

        public static function pagosListController(){
            $respuesta = AdminModel::getPagosSortedListModel("pagos");

            foreach($respuesta as $row => $item){

                $alumna = AdminModel::getItemById("alumnas", $item["id_alumna"]);
                $grupo = AdminModel::getItemById("grupos", $item["id_grupo"]);
                echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$alumna["nombre"]." ".$alumna["apellido"].'</td>
                    <td>'.$grupo["nombre"].'</td>
                    <td>'.$item["mama"].'</td>
                    <td>'.$item["fecha_pago"].'</td>
                    <td><a href="uploads/'.$item["archivo"].'" target="_blank">ver</a></td>
                    <td>'.$item["fecha_registro"].'</td>
                    <td>'.$item["folio"].'</td>
                    </tr>';

            }
        }

        public static function getItemByIdController($table, $id){
		    return AdminModel::getItemById($table,$id);

        }



	}


?>