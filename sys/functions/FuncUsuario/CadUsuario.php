<?php

    include '../../db/conn.php';

    $obj = array('success'=>0, 'error'=>1, 'login'=>3);    

/*------------------------------------------------------------*/

    if(isset($_POST['nome']))
        $nome= $_POST['nome'];

    if(isset($_POST['login']))
        $login = $_POST['login'];

    if(isset($_POST['senha']))
        $senha = $_POST['senha'];

    if(isset($_POST['permissao']))
        $permissao = $_POST['permissao'];

    if(isset($_POST['cargo']))
        $cargo  = $_POST['cargo'];

    if(isset($_POST['status']))
        $status  = $_POST['status'];
            
/*------------------------------------------------------------*/

    $queryLogin = "SELECT * FROM sgd_usuario WHERE login =  $login";
    $resultLogin = $mysqli->query($queryLogin);
    $rowLogin = $resultLogin->fetch_assoc();

    if (empty($rowLogin)) {

            $queryAdd = "INSERT INTO sgd_usuario (nome, login, senha, permissao, cargo, ativo)VALUES ('" . $nome . "','" . $login . "','" . $senha .  "'," . $permissao . "," . $cargo . ",'" . $status . "')";

            $resultAdd = $mysqli->query($queryAdd);
            $affectedAdd = $mysqli->affected_rows;

        /*------------------------------------------------------------*/
           if($affectedAdd == 1){
                
                $query  = "SELECT login, nome FROM sgd_usuario WHERE login = $login";
                $result = $mysqli->query($query);
                $row    = $result->fetch_assoc();
                
                $resposta[] = $obj['success'];
                $resposta[] = $row['login'];
                $resposta[] = $row['nome'];
                
                print_r (json_encode($resposta));
                
            }

            else {

                $resposta[] = $obj['error'];
                print_r (json_encode($resposta));
                
            }

    } else {

            $resposta[] = $obj['login'];
            print_r (json_encode($resposta));

    }

?>
