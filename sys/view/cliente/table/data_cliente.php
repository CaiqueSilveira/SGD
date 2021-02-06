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
$result_cliente = "SELECT * FROM sgd_cliente ";
$resultado_cliente = mysqli_query($conn, $result_cliente);
$qnt_linhas = mysqli_num_rows($resultado_cliente);

//Obter os dados a serem apresentados
$result_cliente = "SELECT * FROM sgd_cliente WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_cliente.=" AND ( nome LIKE '%".$requestData['search']['value']."%' ";    
	$result_cliente.=" OR id LIKE '%".$requestData['search']['value']."%' )";  
}

$resultado_cliente=mysqli_query($conn, $result_cliente);
$totalFiltered = mysqli_num_rows($resultado_cliente);
//Ordenar o resultado
$result_cliente.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_cliente=mysqli_query($conn, $result_cliente);


while( $row_cliente=mysqli_fetch_array($resultado_cliente) ) {  
	$dado = array(); 
	$dado[0] = $row_cliente["id"];
	$dado[1] = $row_cliente["cpf"];
	$dado[2] = $row_cliente["nome"];
	$dado[3] = $row_cliente["telefone_01"];
	$dado[4] = $row_cliente["telefone_02"];
	if ($row_cliente["status"] == 'A') {
		$dado[5] = '<span class="label label-success">Ativo</span>';
		} else {
		$dado[5] = '<span class="label label-danger">Inativo</span>';
		}
	$dado[6] =
	'
			<div class="btn-group">
			<button class="btn btn-dark  dropdown-toggle" data-toggle="dropdown" >
	      	<i class="fa fa-cog"></i></button>
	             <ul class="dropdown-menu pull-right">
	           
	             <li><a href="alterar.php?id='.$row_cliente["id"].'"><i class="fa fa-edit"></i> Editar</a></li>
	             			<li class="divider"></li>
	             <li><a href="javascript:void(0)" id="'.$row_cliente["id"].'" ><i class="fa fa-trash"></i> Remover</a>
		         	<script type="text/javascript">
		         	var Aux = document.getElementById("'.$row_cliente["id"].'");
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
