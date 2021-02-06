<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sgd";


$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array(
	0 => 'id',
	1 => 'nome'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT * FROM sgd_usuario";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT * FROM sgd_usuario WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome LIKE '%".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR id LIKE '%".$requestData['search']['value']."%' )";  
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);



// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 

	$dado[0] = $row_usuarios["id"];
	
	$dado[1] = $row_usuarios["nome"];
	$dado[2] = $row_usuarios["login"];

	
$queryCargo = 'SELECT * FROM sgd_cargo';
$resultCargo = $conn->query($queryCargo);

$queryPermissao = 'SELECT * FROM sgd_permissao';
$resultPermissao = $conn->query($queryPermissao);

	while($rowPermissao = $resultPermissao->fetch_assoc()) {
		if ($row_usuarios['permissao'] == $rowPermissao['id']){
			$dado[3] = $rowPermissao['nivel'];
			break;
		} else {
			$dado[3] = 'NÃO INFORMADO';
		}
	}

	while($rowCargo = $resultCargo->fetch_assoc()) {
		if ($row_usuarios['cargo'] == $rowCargo['id']){
			$dado[4] = $rowCargo['cargo'];
			break;
		} else {
			$dado[4] = 'NÃO INFORMADO';
		}
	}

	
	if ($row_usuarios["ativo"] == 'A') {
	$dado[5] = '<span class="label label-success">Ativo</span>';
	} else {
	$dado[5] = '<span class="label label-danger">Inativo</span>';
	}
	
	$dado[6] =
	'      <a href="/sgd/sys/view/usuario/alterar.php?id='. $dado[0] .'">
	 		 <span class="label label-success" style="padding: 3px 16px;">
			 <i class="fa fa-chevron-right"></i>
			 </span>
	      	</a>
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
