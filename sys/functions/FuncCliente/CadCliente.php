<?php

    include '../../db/conn.php';

    $obj = array('success'=>0, 'error'=>1, 'existe'=>2);     

/*------------------------------------------------------------*/
 
    if(isset($_POST['nome']))
        $nome= $_POST['nome'];

    if(isset($_POST['cpf']))
        $cpf= $_POST['cpf'];

    if(isset($_POST['sexo']))
        $sexo = $_POST['sexo'];

    if(isset($_POST['etnia']))
        $etnia  = $_POST['etnia'];
        
    if(isset($_POST['estado_civil']))
        $estado_civil  = $_POST['estado_civil'];
        
    if(isset($_POST['dt_nascimento']))
        $dt_nascimento  = $_POST['dt_nascimento'];
    
    if(isset($_POST['telefone_01']))
        $telefone_01  = $_POST['telefone_01'];
        
    if(isset($_POST['telefone_02']))
        $telefone_02  = $_POST['telefone_02'];
    
  
    if(isset($_POST['status']))
        $status  = $_POST['status'];

    if(isset($_POST['email']))
        $email  = $_POST['email'];

   

/*------------------ENDEREÇO---------------------*/

    if(isset($_POST['cep']))
        $cep  = $_POST['cep'];
        
    if(isset($_POST['estado']))
        $estado  = $_POST['estado'];

    if(isset($_POST['cidade']))
        $cidade  = $_POST['cidade'];

    if(isset($_POST['endereco']))
        $endereco  = $_POST['endereco'];

    if(isset($_POST['complemento']))
        $complemento  = $_POST['complemento'];
    
    if(isset($_POST['numero']))
        $numero  = $_POST['numero'];

    if(isset($_POST['bairro']))
        $bairro  = $_POST['bairro'];
/*------------------ENDEREÇO---------------------*/
            
/*------------------------------------------------------------*/

    $queryCliente = "SELECT * FROM sgd_cliente WHERE cpf = '" . $cpf . "'";
    $resultCliente = $mysqli->query($queryCliente);
    $rowCliente = $resultCliente->fetch_assoc();

    if (empty($rowCliente)) { 

            $queryAdd = "INSERT INTO sgd_cliente ( nome, cpf, status, sexo, estado_civil, etnia, dt_nascimento, telefone_01, telefone_02, email, cep, estado, cidade, endereco, complemento, numero, bairro)
             VALUES ('".$nome."', '".$cpf."','".$status."','".$sexo."', '".$estado_civil."', '".$etnia."', '".$dt_nascimento."', '".$telefone_01."', '".$telefone_02."', '".$email."','".$cep."', '".$estado."', '".$cidade."', '".$endereco."', '".$complemento."', '".$numero."', '".$bairro."')";
      

            $resultAdd = $mysqli->query($queryAdd);
            $affectedAdd = $mysqli->affected_rows;

        /*------------------------------------------------------------*/
        if($affectedAdd == 1){
                
            $query  = "SELECT cpf, nome FROM sgd_cliente WHERE cpf = '" . $cpf . "'";
            $result = $mysqli->query($query);
            $row    = $result->fetch_assoc();
            
            $resposta[] = $obj['success'];
            $resposta[] = $row['nome'];
            $resposta[] = $row['cpf'];
            
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
