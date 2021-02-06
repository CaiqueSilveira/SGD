<?php

    include '../../db/conn.php';

    $obj = array('success'=>0, 'error'=>1);     

/*------------------------------------------------------------*/


    if(isset($_POST['id']))    
        $id   = $_POST['id'];
            
/*------------------------------------------------------------*/
            $queryRemove = "DELETE FROM sgd_divida WHERE id = '$id'";
            $resultRemove = $mysqli->query($queryRemove);
            $affectedAdd = $mysqli->affected_rows;

        
        if ($affectedAdd == 1){
                
            $resposta[] = $obj['success'];
            $resposta[] = $id;
            
            print_r (json_encode($resposta));
            
        } 

        else {

            $resposta[] = $obj['error'];
            $resposta[] = $queryRemove;
        
            print_r (json_encode($resposta));
            
        }


?>