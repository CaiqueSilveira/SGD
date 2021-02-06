<?php

    include '../../db/conn.php';

    $obj = array('success'=>0, 'error'=>1, 'existe'=>2);    

/*------------------------------------------------------------*/

  if(isset($_POST['cliente']))
        $cliente= $_POST['cliente'];

    if(isset($_POST['nome_p']))
        $nome_p= $_POST['nome_p'];

    if(isset($_POST['quantidade']))
        $quantidade = $_POST['quantidade'];

     if(isset($_POST['valor_compra']))
        $valor_compra = $_POST['valor_compra'];

    if(isset($_POST['status']))
        $status  = $_POST['status'];
        
    if(isset($_POST['dt_compra']))
        $dt_compra  = $_POST['dt_compra'];

   
            
/*------------------------------------------------------------*/

    $queryDivida = "SELECT * FROM sgd_divida WHERE descricao = '" . $nome_p . "'";
    $resultDivida = $mysqli->query($queryDivida);
    $rowDivida = $resultDivida->fetch_assoc();

    if (empty($rowDivida)) {

            $queryAdd = "INSERT INTO sgd_divida (cliente, descricao, valor, quantidade, data_compra, status) VALUES ('" . $cliente . "','" . $nome_p . "','" . $valor_compra . "','" . $quantidade . "','" . $dt_compra . "','" . $status . "')";

            $resultAdd = $mysqli->query($queryAdd);
            $affectedAdd = $mysqli->affected_rows;

        /*------------------------------------------------------------*/
           if($affectedAdd == 1){
                
            $query  = "SELECT descricao FROM sgd_divida WHERE descricao = '" . $nome_p . "'";
            $result = $mysqli->query($query);
            $row    = $result->fetch_assoc();
            
            $resposta[] = $obj['success'];
            $resposta[] = $row['descricao'];
         
            
            print_r (json_encode($resposta));
            
        }

        else {

            $resposta[] = $obj['error'];
            $resposta[] = $queryAdd;
            print_r (json_encode($resposta));
            
        }

} else {

        $resposta[] = $obj['existe'];
        print_r (json_encode($resposta));

}


?>