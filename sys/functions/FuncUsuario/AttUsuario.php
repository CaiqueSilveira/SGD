<?php

    include '../../db/conn.php';

    
    if(isset($_POST['id']))    
    $id    = $_POST['id'];
	  
    if(isset($_POST['nome']))
        $nome= $_POST['nome'];

   
    if(isset($_POST['login']))
        $login = $_POST['login'];

    if(isset($_POST['atual_senha']))
        $senha = $_POST['atual_senha'];

    if(isset($_POST['permissao']))
        $permissao = $_POST['permissao'];

    if(isset($_POST['cargo']))
        $cargo  = $_POST['cargo'];

    if(isset($_POST['status']))
        $status  = $_POST['status'];


    $query = "UPDATE sgd_usuario SET nome = '$nome', login = '$login', senha = '$senha', permissao = '$permissao', cargo = '$cargo', ativo = '$status' WHERE id = '$id'";
       
	    $mysqli->query($query);
	    
	    $affected = $mysqli->affected_rows;
	    
	    $obj = array('success'=>0,'error'=>1);  

	    if($affected == 1)
	        print_r (json_encode($obj['success']));

		    else
		        print_r (json_encode($obj['error']));

?>