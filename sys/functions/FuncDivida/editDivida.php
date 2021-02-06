<?php

    include '../../db/conn.php';

    
    if(isset($_POST['id']))    
    $id = $_POST['id'];
      
 
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



    $query = "UPDATE sgd_divida SET descricao = '$nome_p', valor = '$valor_compra', quantidade = '$quantidade', data_compra = '$dt_compra', status = '$status' WHERE id = '$id'";
       
        $mysqli->query($query);
        
        $affected = $mysqli->affected_rows;
        
        $obj = array('success'=>0,'error'=>1);  

        if($affected == 1)
            print_r (json_encode($obj['success']));

            else
                print_r (json_encode($obj['error']));

?>