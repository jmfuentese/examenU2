<?php $ingreso = new AdminController();?>
<div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Ingreso al sistema</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar sesion</p>

                <form  method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input name="usuario" id="user" type="text" class="validate">
                            <label for="password" style="font-weight: 100;">Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password" style="font-weight: 100;">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="text-center col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                    $ingreso -> loginController();
                    if(isset($_GET["action"])){
                        if($_GET["action"] == "fallo"){
                            echo "Fallo al ingresar";
                        }
                    }

                ?>
                <!--<p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>-->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="../views/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>
