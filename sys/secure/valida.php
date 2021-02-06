<?php
  // Inclui o arquivo com o sistema de segurança

  include("secure.php");


  // Verifica se um formulário foi enviado
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Salva duas variáveis com o que foi digitado no formulário
      // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
      $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
      $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

      // Utiliza uma função criada no seguranca.php pra validar os dados digitados
      if (validaUsuario($usuario, $senha) == true) {
      // O usuário e a senha digitados foram validados, manda pra página interna

      //header("Location: /sisauto/sys/page/index.php");
        header("Location: /sgd/sys/login.php?teste=1");

      } else {
        expulsaVisitante();
      }

  }

?>
