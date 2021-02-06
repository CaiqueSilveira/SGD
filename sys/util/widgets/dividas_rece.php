
<?php

include '../db/conn.php';

$query = "SELECT COUNT(*) FROM sgd_divida WHERE status = 'N'";
$result = $mysqli->query($query);

$row = $result->fetch_array();

?>
<div class="col-lg-6 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3 >
            <?php print_r ($row[0]); ?> 
            </h3>
            <h4>
                Dívidas a Receber
            </h4>
        </div>
        <div class="icon">
          
           
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="cadDivida/relDivida.php" id="verMais" class="small-box-footer">
          Ver mais <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>