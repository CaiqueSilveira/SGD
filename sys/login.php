<?php 
    $nomePage = $_SERVER['PHP_SELF'];
    if($nomePage === '/sgd/sys/login.php'){
        include "secure/secure.php"; 
      }
   protegePagina_login();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>SGD | Sistema de Gerenciamento Dívidas</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="bootstrap/img/logo_tj.png" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/fonts/iconic/css/material-design-iconic-font.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/animate/animate.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/css-hamburgers/hamburgers.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/animsition/css/animsition.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/select2/select2.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/vendor/daterangepicker/daterangepicker.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/util.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/main.css" />
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form action="/sgd/sys/secure/valida.php" class="login100-form validate-form" method="post">
                        <span class="login100-form-title p-b-48">
                            <img src="bootstrap/img/logo_tj.png" style="width: 70%; margin-top: -15%; margin-bottom: -5%;" />
                        </span>
                        <span class="login100-form-title p-b-26">
                            SGD - Sistema de Ger. de Dívidas
                        </span>
                        <div class="al alert-error" id="minha" style="display: none; border-radius: 5px;">
                            <a href="#" class="close" data-dismiss="alert" onclick="fechar();">×</a>
                            <strong>Usuário ou Senha Incorreta!</strong>
                            <br />
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Insira o Usuário!">
                            <input class="input100" type="text" name="usuario" id="usuario" value="" placeholder="Nome do Usuário" />
                            <!--	<span class="focus-input100" data-placeholder="Email"></span> -->
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Insira a Senha!">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="senha" id="senha" value="" placeholder="Senha" />
                            <!--	<span class="focus-input100" data-placeholder="Password"></span> -->
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <button class="login100-form-btn">
                                    Entrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/bootstrap/js/popper.js"></script>
        <script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/daterangepicker/moment.min.js"></script>
        <script src="bootstrap/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="bootstrap/js/main.js"></script>
        <script>
               $(document).ready(function(){
               <?php if ( isset($_GET['incorreto']) && $_GET['incorreto'] == 1 ){?>

                 <?php echo ' exibir();' ?>
               <?php } ?>
            });
               function exibir() {
               document.getElementById("minha").style.display = "block";
               }
                function fechar() {
               document.getElementById("minha").style.display = "none";
               }
        </script>
    </body>
</html>
