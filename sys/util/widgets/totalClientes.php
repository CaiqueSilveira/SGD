
<?php

include '../db/conn.php';

$query = "SELECT COUNT(*) FROM sgd_cliente ";
$result = $mysqli->query($query);

$row = $result->fetch_array();

?>
<div class="col-lg-6 col-xs-6">
    <div class="small-box bg-blue">
        <div class="inner">
            <h3 >
               <?php print_r ($row[0]); ?> 
            </h3>
            <h4>
            Clientes Cadastrados
</h4>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="cadCliente/relCliente.php" id="verMais" class="small-box-footer">
            Ver mais <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>