<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sgd";


$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;

//$requestData['search']['value']= $_POST['q'];

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'id',
	1 => 'nome'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_divida = "SELECT * FROM sgd_divida";
$resultado_divida = mysqli_query($conn, $result_divida);
$qnt_linhas = mysqli_num_rows($resultado_divida);

//Obter os dados a serem apresentados
$result_divida = "SELECT * FROM sgd_divida WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_divida.=" AND ( descricao LIKE '%".$requestData['search']['value']."%' ";    
	$result_divida.=" OR data_compra LIKE '%".$requestData['search']['value']."%' )";  
}

$resultado_divida=mysqli_query($conn, $result_divida);
$totalFiltered = mysqli_num_rows($resultado_divida);
//Ordenar o resultado
$result_divida.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_divida=mysqli_query($conn, $result_divida);

while( $row_divida =mysqli_fetch_array($resultado_divida) ) {  
	$dado = array(); 

   $querycliente = 'SELECT * FROM sgd_cliente';
   $resultcliente = $conn->query($querycliente);
	
		while($rowcliente = $resultcliente->fetch_assoc()) {
			if ($row_divida['cliente'] == $rowcliente['id']){
				$dado[0] = $rowcliente['nome'];
				break;
			} else {
				$dado[0] = 'NÃO INFORMADO';
			}
		}	
	

	$dado[1] = $row_divida["descricao"];
	$dado[2] = $row_divida["quantidade"];
	$dado[3] =date('d/m/Y', strtotime($row_divida["data_compra"]));
	$dado[4] = $row_divida["valor"];

	
	


	if ($row_divida["status"] == 'P') {
		$dado[5] = '<span class="label label-success">Pago</span>';
		} else {
		$dado[5] = '<span class="label label-danger">Não Pago</span>';
		}
	
	$dado[6] =
	'
			<div class="btn-group">
			<button class="btn btn-dark  dropdown-toggle" data-toggle="dropdown" >
	      	<i class="fa fa-cog"></i></button>
	             <ul class="dropdown-menu pull-right">
	             
	             <li><a href="alterar.php?id='.$row_divida["id"].'"><i class="fa fa-edit"></i> Editar</a></li>
	             			<li class="divider"></li>
	             <li><a href="javascript:void(0)" id="'.$row_divida["id"].'" ><i class="fa fa-trash"></i> Remover</a>
		         	<script>
		         	var Aux = document.getElementById("'.$row_divida["id"].'");
		         	Aux.onclick = function() {
		         		RemoveFunc(this.id);
					} 
		         	</script>
         		</li>
	            </ul>
         	</div>
	';	

	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
