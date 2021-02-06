<?php

    include '../../db/conn.php';

	    if(isset($_POST['senha']))    
	        $senha    = $_POST['senha'];

	    if(isset($_POST['novasenha']))    
	        $nova_senha    = $_POST['novasenha'];

	    if(isset($_POST['id']))    
	        $id    = $_POST['id'];


	    $query = "UPDATE sgd_usuario SET senha = '".$nova_senha."' WHERE id = '".$id."' and senha = '".$senha."'";
	    
	    $mysqli->query($query);
	    
	    $affected = $mysqli->affected_rows;
	    
	    $obj = array('success'=>0,'error'=>1);  

	    if($affected == 1)
	        print_r (json_encode($obj['success']));

		    else
		        print_r (json_encode($obj['error']));


?>