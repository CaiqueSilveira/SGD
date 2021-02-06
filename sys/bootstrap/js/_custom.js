var arrFuncao = [];
var funcao = new Object();
var id = 0;
$html_funcao = '';


function AddFuncao() {

	$funcao = $('#funcao').val();
	$empresa = $('#empresa').val();
	$inicio = $('#inicio').val();
	$fim = $('#fim').val();
	$candidatar = $('#candidatar').val();
	$experiencia_ctps = $('#experiencia_ctps').val();

	funcao.id = id;
	funcao.funcao = $funcao;
	funcao.empresa = $empresa;
	funcao.inicio = $inicio;
	funcao.fim = $fim;
	funcao.candidatar = $candidatar;
	funcao.experiencia_ctps = $experiencia_ctps;

	arrFuncao.push(funcao);
	id++;
	funcao = new Object();

	for (var i = 0; i < arrFuncao.length; i++) {

		if (arrFuncao[i].candidatar == 'Sim')
			$html_funcao += '<tr style="background-color: #00A65A">';
		else
			$html_funcao += '<tr>';

		if (arrFuncao[i].experiencia_ctps != 'Sim') {

			$html_funcao += '<td>' + arrFuncao[i].funcao + '</td>';
			$html_funcao += '<td>' + arrFuncao[i].empresa + '</td>';
			$html_funcao += '<td>' + arrFuncao[i].inicio + ' ~ ' + arrFuncao[i].fim + '</td>';

		} else {

			$html_funcao += '<td><b>' + arrFuncao[i].funcao + '</td></b>';
			$html_funcao += '<td><b>' + arrFuncao[i].empresa + '</td></b>';
			$html_funcao += '<td><b>' + arrFuncao[i].inicio + ' ~ ' + arrFuncao[i].fim + '</td></b>';

		}

		$html_funcao += '</tr>';

	}

	$('#tb_funcao').html($html_funcao);

	$html_funcao = '';
	$('#funcao').val('');
	$('#empresa').val('');
	$('#inicio').val('');
	$('#fim').val('');
	$('#candidatar').val('');
	$('#experiencia_ctps').val('');

}

function FunCadFuncoes(num_cadastro) {

	for (var i = 0; i < arrFuncao.length; i++) {

		$data = '';

		$data += 'num_cadastro=' + num_cadastro + '&';
		$data += 'funcao=' + arrFuncao[i].funcao + '&';
		$data += 'empresa=' + arrFuncao[i].empresa + '&';
		$data += 'inicio=' + arrFuncao[i].inicio + '&';
		$data += 'fim=' + arrFuncao[i].fim + '&';
		$data += 'candidatar=' + arrFuncao[i].candidatar + '&';
		$data += 'experiencia_ctps=' + arrFuncao[i].experiencia_ctps;

		$.ajax({

			url: '/agtbr/sys/functions/CadFuncao.php',
			data: $data,
			type: 'get',
			success: function (data) {},
			error: function (data) {}

		});

	}

}

function GetEndereco() {

	$('#loader2').show();
	$('#searchCep').hide();

	$cep = $('#cep').val();

	$url = 'http://viacep.com.br/ws/' + $cep + '/json/'

	$.ajax({
		url: $url,
		success: function (data) {

			$('#endereco').val(data.logradouro);
			$('#bairro').val(data.bairro);
			$('#cidade').val(data.localidade);
			$('#estado').val(data.uf);
			$('#complemento').val(data.complemento);

			$('#endereco').css("background-color", "#F6F6c3");
			$('#bairro').css("background-color", "#F6F6c3");
			$('#cidade').css("background-color", "#F6F6c3");
			$('#estado').css("background-color", "#F6F6c3");

			$('#loader2').hide();
			$('#searchCep').show();

		},
		error: function (data) {}


	});

}

/*============================= PROCURAR ==============================*/

function Procurar() {
	procura = $('#procura').val();

	$('#content').hide();
	$('#loader').show();

	$data = '';
	$data += 'procura=' + procura;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/Procurar.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			if (data[0] == '')
				window.alert('Nada encontrado');

			if (data[0] != 1) {
                
                console.log(data);

				$html = '';
                $html += '<div class="row">';
                $html += '<div class="box">';
                $html += '<div class="box-header">';
                $html += '<h3 class="box-title">Listar</h3>';
                $html += '</div>';
                $html += '<div class="box-body table-responsive">';
                $html += '<table id="example1" class="table table-bordered table-striped">';
                $html += '<thead>';
                $html += '<tr>';
                $html += '<th>Identificação</th>';
                $html += '<th>Nº</th>';
                $html += '<th>Nome</th>';
                $html += '<th>Telefone</th>';
                $html += '<th>Ação</th>';
                $html += '</tr>';
                $html += '</thead>';
				$html += '<tbody>';
				
                for (var i = 0; i < data.length; i++) {
                    $html += '<tr>';
                    $html += '<td>' + data[i].cpf + '</td>';
                    $html += '<td>' + data[i].num_cadastro + '</td>';
                    $html += '<td>' + data[i].nome + '</td>';
                    $html += '<td>' + data[i].telefone_01 + '</td>';
                    $html += '<td><form action="/agtbr/sys/page/curriculo/verCadastro.php" type="get">';
                    $html += '<input name="cpf" type="hidden" value="' + data[i].cpf + '" />';
                    $html += '<button>Detalhes</button>';
                    $html += '</form></td>';
                    $html += '</tr>';
				    
                }
                
				$html += '</tbody>';
				$html += '</table>';
				$html += '</div>';
				$html += '</div>';

					/*$html += '<div class="row">';
                $html += '<div class="box">';
                $html += '<div class="box-header">';
                $html += '<h3 class="box-title">Listar</h3>';
                $html += '</div>';
                $html += '<div class="box-body table-responsive">';
                $html += '<table id="example1" class="table table-bordered table-striped">';
                $html += '<thead>';
                $html += '<tr>';
                $html += '<th>Identificação</th>';
                $html += '<th>Razão Social</th>';
                $html += '<th>Responsável</th>';
                $html += '</tr>';
                $html += '</thead>';
                $html += '<tbody>';
                $html += '<tr>';
                $html += '<td></td>';
                $html += '<td></td>';
                $html += '<td></td>';
                $html += '</tr>';
                $html += '</tbody>';
                $html += '</table>';
                $html += '</div>';
                $html += '</div>';*/

					$('#content').html($html);

					$('#loader').hide();
					$('#content').show();
			}
		},

		error: function (data) {
			window.alert('Nada encontrado');
			$('#loader').hide();
			$('#content').show();
		}

	});

}

/*============================= CADASTRAR CURRICULO ==============================*/

function FunCadCurriculo(cadastro) {

	$data = '';
	$data += 'nome=' + cadastro.nome + "&";
	$data += 'sexo=' + cadastro.sexo + "&";
	$data += 'endereco=' + cadastro.endereco + "&";
	$data += 'numero=' + cadastro.numero + "&";
	$data += 'bairro=' + cadastro.bairro + "&";
	$data += 'complemento=' + cadastro.complemento + "&";
	$data += 'cep=' + cadastro.cep + "&";
	$data += 'cidade=' + cadastro.cidade + "&";
	$data += 'estado=' + cadastro.estado + "&";
	$data += 'cpf=' + cadastro.cpf + "&";
	$data += 'rg=' + cadastro.rg + "&";
	$data += 'dt_nascimento=' + cadastro.dt_nascimento + "&";
	$data += 'telefone_01=' + cadastro.telefone_01 + "&";
	$data += 'telefone_02=' + cadastro.telefone_02 + "&";
	$data += 'email=' + cadastro.email + "&";
	$data += 'escolaridade=' + cadastro.escolaridade + "&";
	$data += 'situacao=' + cadastro.situacao + "&";
	$data += 'escQual=' + cadastro.escQual + "&";
	$data += 'aonde=' + cadastro.aonde + "&";
	$data += 'deficiente=' + cadastro.deficiente + "&";
	$data += 'deficiencia=' + cadastro.deficiencia + "&";
	$data += 'deficienciaGrau=' + cadastro.deficienciaGrau + "&";
	$data += 'habilitacaoQual=' + cadastro.habilitacaoQual + "&";
	$data += 'dt_habilitacao=' + cadastro.dt_habilitacao + "&";
	$data += 'curso=' + cadastro.curso + "&";
	$data += 'curso_qual=' + cadastro.curso_qual + "&";
	$data += 'xpQual=' + cadastro.xpQual + "&";
	$data += 'id_usuario=' + cadastro.id_usuario;

	$.ajax({
		type: 'post',
		url: '/agtbr/sys/functions/CadCurriculo.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			if (data[0] == 0) {
				window.alert("Cadastrado com sucesso! \nNúmero: " + data[1]);
				FunCadFuncoes(data[1]);
				document.cadastro.reset();

				arrFuncao = [];
				$('#tb_funcao').html('');

			} else
				window.alert("Falha no cadastramento.");
		},

		error: function (data) {}

	});

}

/*============================= ATUALIZAR CURRICULO ==============================*/

function FunAttCurriculo(cadastro) {

	$data = '';
	$data += 'nome=' + cadastro.nome + "&";
	$data += 'sexo=' + cadastro.sexo + "&";
	$data += 'endereco=' + cadastro.endereco + "&";
	$data += 'numero=' + cadastro.numero + "&";
	$data += 'bairro=' + cadastro.bairro + "&";
	$data += 'complemento=' + cadastro.complemento + "&";
	$data += 'cep=' + cadastro.cep + "&";
	$data += 'cidade=' + cadastro.cidade + "&";
	$data += 'estado=' + cadastro.estado + "&";
	$data += 'cpf=' + cadastro.cpf + "&";
	$data += 'rg=' + cadastro.rg + "&";
	$data += 'dt_nascimento=' + cadastro.dt_nascimento + "&";
	$data += 'telefone_01=' + cadastro.telefone_01 + "&";
	$data += 'telefone_02=' + cadastro.telefone_02 + "&";
	$data += 'email=' + cadastro.email + "&";
	$data += 'escolaridade=' + cadastro.escolaridade + "&";
	$data += 'area_atuacao=' + cadastro.area_atuacao + "&";
	$data += 'curso=' + cadastro.curso + "&";
	$data += 'curso_qual=' + cadastro.curso_qual;

	$.ajax({
		type: 'post',
		url: '/agtbr/sys/functions/AttCurriculo.php',
		data: $data,
		dataType: 'html',

		success: function (data) {

			if (data[0] == 0) {
				window.alert("Atualizado com sucesso!");
				window.location.href = 'verCadastro.php?cpf=' + cadastro.cpf;
			} else
				window.alert("Falha na atualização.");

		},

		error: function (data) {
			window.alert("Falha no diretório da função para cadastrar curriculo.");
		}

	});

}

/*============================= DELETAR CURRICULO ==============================*/

function DelCurriculo(cpf) {

	$data = '';
	$data += 'cpf=' + cpf;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/DelCurriculo.php',
		data: $data,
		dataType: 'html',
		success: function (data) {

			if (data[0] == 0) {

				window.alert("Curriculo removido sucesso!");
				window.location.href = 'relCurriculo.php';

			} else
				window.alert("Falha na remoção.");

		},
		error: function (data) {}

	});

}

/*============================== CADASTRAR EMPRESA ===============================*/

function FunCadEmpresa(cadastro, funcao) {

	$data = '';

	$data += 'tipo=' + cadastro.tipo + "&";
	$data += 'num_identificacao=' + cadastro.num_identificacao + "&";
	$data += 'razao_social=' + cadastro.razao_social + "&";
	$data += 'nome_fantasia=' + cadastro.nome_fantasia + "&";
	$data += 'logradouro=' + cadastro.logradouro + "&";
	$data += 'numero=' + cadastro.numero + "&";
	$data += 'complemento=' + cadastro.complemento + "&";
	$data += 'bairro=' + cadastro.bairro + "&";
	$data += 'cep=' + cadastro.cep + "&";
	$data += 'municipio=' + cadastro.municipio + "&";
	$data += 'uf=' + cadastro.uf + "&";
	$data += 'telefone_01=' + cadastro.telefone_01 + "&";
	$data += 'telefone_02=' + cadastro.telefone_02 + "&";
	$data += 'responsavel=' + cadastro.responsavel + "&";
	$data += 'email=' + cadastro.email + "&";
	$data += 'id_usuario=' + cadastro.id_usuario;

	$.ajax({
		type: 'post',
		url: '/agtbr/sys/functions/CadEmpresa.php',
		data: $data,
		dataType: 'html',

		success: function (data) {

			if (data[0] == 0) {

				window.alert("Cadastrado com sucesso!");
				document.cadastro.reset();

			} else {
				window.alert("Falha no cadastramento.");
			}

		},

		error: function (data) {
			window.alert("Falha no diretório da função para cadastrar empresa.");
		}

	});

}

/*============================== CADASTRAR VAGA ===============================*/

function FunCadVaga(cadastro) {

	$data = '';
	$data += 'num_identificacao=' + cadastro.num_identificacao + '&';
	$data += 'forma_contato=' + cadastro.forma_contato + '&';
	$data += 'contratacao=' + cadastro.contratacao + '&';
	$data += 'funcao=' + cadastro.funcao + '&';
	$data += 'atividade=' + cadastro.atividade + '&';
	$data += 'quantidade_vagas=' + cadastro.quantidade_vagas + '&';
	$data += 'experiencia=' + cadastro.experiencia + '&';
	$data += 'ctps=' + cadastro.ctps + '&';
	$data += 'escolaridade=' + cadastro.escolaridade + '&';
	$data += 'escQual=' + cadastro.escQual + '&';
	$data += 'faixa_etaria=' + cadastro.faixa_etaria + '&';
	$data += 'curso=' + cadastro.curso + '&';
	$data += 'cursoQual=' + cadastro.cursoQual + '&';
	$data += 'sexo=' + cadastro.sexo + '&';
	$data += 'aceita_deficiencia=' + cadastro.aceita_deficiencia + '&';
	$data += 'tipos_deficiencia=' + cadastro.tipos_deficiencia + '&';
	$data += 'salario=' + cadastro.salario + '&';
	$data += 'incentivos=' + cadastro.incentivos + '&';
	$data += 'id_usuario=' + cadastro.id_usuario;

	$.ajax({
		type: 'post',
		url: '/agtbr/sys/functions/CadVaga.php',
		data: $data,
		dataType: 'html',

		success: function (data) {

			if (data[0] == 0) {

				window.alert("Cadastrado com sucesso!");
				document.cadastro.reset();

			} else
				window.alert("Falha no cadastramento.");

		},

		error: function (data) {
			window.alert("Falha no diretório da função para cadastrar vaga.");
		}

	});

}

/*============================== CADASTRAR ENCAMINHAMENTO ===============================*/

function FunCadEncaminhamento(cadastro) {

	$data = '';
	$data += 'num_identificacao=' + cadastro.num_identificacao + '&';
	$data += 'id_vaga=' + cadastro.id_vaga + '&';
	$data += 'cpf=' + cadastro.cpf + '&';
	$data += 'id_usuario=' + cadastro.id_usuario;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/CadEncaminhamento.php',
		data: $data,
		dataType: 'html',
		success: function (data) {

			if (data[0] == 0) {
				window.alert('Candidato encaminhado com sucesso.');

				var r = confirm("Deseja imprimir o encaminhamento?");
				if (r)
					window.location.href = '/agtbr/sys/functions/relatorio/Encaminhamento.php?cpf=' + cadastro.cpf;
			} else
				window.alert('Falha no encaminhamento.');


		},
		error: function (data) {

			window.alert("Falha no diretório da função para encaminhar candidato.");

		}

	});

}


/*============================== BUSRCAR CPF ===============================*/

function BuscarCPF(cpf, funcao) {

	$data = '';
	$data += 'cpf=' + cpf + '&';
	$data += 'funcao=' + funcao;

	switch (funcao) {

		//========================== CADASTRAR ===============================//    
	case 'cadastrar':
		{
			$.ajax({

				type: 'post',
				url: '/agtbr/sys/functions/BuscarCPF.php',
				data: $data,
				dataType: 'html',

				success: function (data) {

					if (data[0] == 0) {

						document.getElementById('cpf').value = '';
						window.alert("CPF já cadastrado.");

					}
                    
                    else{
                        /*console.log(data);*/
                        window.alert("Currículo NÃO está cadastrado.");
                    }

				},
				error: function (data) {}

			});

			break;

		}

		//============================== ENCAMINHAR ==========================//
	case 'encaminhar':
		{
			$.ajax({

				type: 'post',
				url: '/agtbr/sys/functions/BuscarCPF.php',
				data: $data,
				dataType: 'json',

				success: function (data) {

					if (data == null) {

						window.alert('Nenhum candidato com este CPF foi encontrado');

						$('#nome').html('');
						$('#telefone').html('');
						$('#cursoQual').html('');
						$('#experiencia').html('');
						$('#cpf').val('');
						$('#escolaridade').val('');

					} else {

						$dt_nascimento = "";
						$dt_nascimento += data.dt_nascimento;

						var ano_atual = new Date();

						$idade = ano_atual.getFullYear() - parseInt($dt_nascimento.substring(6, 10));
						$('#idade').html($idade + " anos.");

						$nome = "";
						$nome += data.nome;
						$('#nome').html($nome);

						$escolaridade = "";
						$escolaridade += data.escolaridade;
						$('#escolaridade').html($escolaridade);

						$telefone = "";
						$telefone += data.telefone_01 + " / " + data.telefone_02;
						$('#telefone').html($telefone);

						$cursoQual = "";
						$cursoQual += data.curso_qual;
						$('#cursoQual').html($cursoQual);

						if (data.experiencia != '') {

							$experiencia = "";
							$experiencia += data.experiencia;
							$('#experiencia').html($experiencia);

						} else {
							$experiencia = 'Nenhuma'
							$('#experiencia').html($experiencia);
						}

					}

				},

				error: function (data) {
					window.alert("Falha no diretório da função para buscar cpf.");
				}

			});

		}

		//============================= DEFAULT =============================//    
	default:
		{

			//window.alert("Função não cadastrada.");
			break;

		}

	}

}

/*============================== BUSRCAR EMPRESA ===============================*/

function BuscarEmpresa(num_identificacao, funcao) {

	$data = '';
	$data += 'num_identificacao=' + num_identificacao + '&';
	$data += 'funcao=' + funcao;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/BuscarEmpresa.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			if (funcao == 'encaminhar') {

				$('#nome_empresa').html(data.razao_social);
				$('#telefone_empresa').html(data.telefone_01 + ' / ' + data.telefone_02);
				$('#endereco').html(data.logradouro + ', N ' + data.numero + ', ' + data.bairro);
				$('#responsavel').html(data.responsavel);
				$('#email').html(data.email);

				$('#nome_cargo').html(data.funcao);
				$('#atividade').html(data.atividade);
				$('#incentivos').html(data.incentivos);
				$('#quantidade_vagas').html(data.quantidade_vagas);
				$('#salario').html('R$ ' + data.salario);

			} else {

				$empresa = "";
				$empresa += data.razao_social;
				$('#nome_empresa').html($empresa);

				$empresa = "";
				$empresa += data.telefone_01 + ' / ' + data.telefone_02;
				$('#telefone_empresa').html($empresa);

				$empresa = "";
				$empresa += data.logradouro + ", Nº " + data.numero + ", " + data.bairro;
				$('#endereco_empresa').html($empresa);

				$empresa = "";
				$empresa += data.responsavel;
				$('#responsavel_empresa').html($empresa);

				$empresa = "";
				$empresa += data.email;
				$('#email_empresa').html($empresa);

				BuscarVaga(num_identificacao);

			}

		},

		error: function (data) {
			window.alert('Falha no diretório da função para buscar empresa.');
		}

	});

}

/*============================== BUSRCAR VAGA ===============================*/

function BuscarVaga(experiencia) {

	$arrExp = experiencia.split(";");

	$sbstr = $arrExp[0].substring(0, 4);

	$experiencia = '%' + $sbstr + '%';

	$data = '';
	$data += 'experiencia=' + $experiencia;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/BuscarVaga.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			$vagas = "";
			$vagas += "<option id='' value=''>Selecione uma das opções a baixo</option>";

			for (var i = 0; i < data.length; i++) {

				$vagas +=
					"<option id='" + data[i].funcao +
					"' value='" + data[i].num_identificacao + ';' + data[i].funcao + ';' + data[i].id_vaga + "'>" +
					data[i].funcao +
					"</option>";

			}

			$('#vagas').html($vagas);

		},
		error: function (data) {}

	});

}

/*============================== LISTAR VAGA ===============================*/

function BuscarVaga(num_identificacao) {

	$data = '';
	$data += 'num_identificacao=' + num_identificacao;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/ListVaga.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			$vagas = "";
			$vagas += "<option id='' value=''>-- Selecione uma vaga --</option>";

			for (var i = 0; i < data.length; i++) {
				$vagas += "<option value='" + data[i].id_vaga + "'>" + data[i].funcao + "</option>";
			}

			$('#vagas').html($vagas);

		},
		error: function (data) {}

	});

}

/*============================== VER VAGA ===============================*/

function VerVaga(id) {

	$data = '';
	$data += 'id_vaga=' + id;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/VerVaga.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			$vaga = '';
			$vaga += data.funcao;
			$('#nome_cargo').html($vaga);

			$vaga = '';
			$vaga += data.atividade;
			$('#atividade').html($vaga);

			$vaga = '';
			$vaga += data.incentivos;
			$('#incentivos').html($vaga);

			$vaga = '';
			$vaga += data.quantidade_vagas;
			$('#quantidade_vagas').html($vaga);

			$vaga = '';
			$vaga += data.salario;
			$('#salario').html($vaga);

			var vaga = new Object();

			vaga.funcao = data.funcao;
			vaga.id_vaga = data.id_vaga;
			vaga.qtdVaga = data.quantidade_vagas;

			BuscarCurriculos(vaga);

		},
		error: function (data) {}

	});

}

/*============================== BUSCAR CURRICULOS ===============================*/

function BuscarCurriculos(vaga) {

	$bairro = $('#bairro').val();

	$pcd = $('#pcd').val();

	$data = '';
	$data += 'funcao=' + vaga.funcao + '&';
	$data += 'id_vaga=' + vaga.id_vaga + '&';

	if ($bairro != '' || $bairro != null)
		$data += 'bairro=' + $bairro + '&';

	if ($pcd != '' || $pcd != null || $pcd != 'undefined')
		$data += 'pcd=' + $pcd + '&';

	$data += 'id_vaga=' + vaga.id_vaga + '&';
	$data += 'qtdVaga=' + vaga.qtdVaga;

	console.log($data);

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/RelCurriculos.php',
		data: $data,
		dataType: 'json',

		success: function (data) {

			if (data.empty != 0) {

				$vagas = "";
				$vagas += "<option id='' value=''>-- Selecione um curriculo --</option>";

				for (var i = 0; i < data.length; i++) {
					$vagas += "<option value='" + data[i].cpf + "'>" + data[i].nome + " - " + data[i].area_atuacao + "</option>";
				}

			} else
				$vagas = "<option id='' value=''>-- Nenhuma candidato encontrado para esta vaga --</option>";


			$('#curriculo').html($vagas);

			console.log(data);

		},
		error: function (data) {
			console.log(data.responseText);
		}

	});

}

/*============================== MUDAR STATUS ENCAMINHAMENTOS ===============================*/

function AttStatus(status) {

	$data = '';
	$data += 'id_encaminhado=' + status.id_encaminhado + '&';
	$data += 'status=' + status.status;


	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/AttStatus.php',
		data: $data,
		dataType: 'html',

		success: function (data) {

			if (data[0] == 0) {
				window.alert('Status alterado com sucesso.');
				$('#en_status').html('<b>' + status.status + '</b>');
			} else
				window.alert('Falha na mudança de status.');

		},

		error: function (data) {}

	});

}

/*============================== ATUALIZAR SENHA ===============================*/

function DelEncaminhamento(id_encaminhamento) {

	$data = '';
	$data = 'id_encaminhamento=' + id_encaminhamento;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/DelEncaminhamento.php',
		data: $data,
		dataType: 'html',

		sucess: function (data) {

			if (data[0] == 0) {
				window.alert('Encaminhamento deletado com sucesso.');
				location.reload();
			} else
				window.alert('Falha ao deletar o encaminhamento.');

		},
		error: function (data) {}

	});

}

/*============================== ATUALIZAR SENHA ===============================*/

function AttSenha(attSenha) {

	$data = '';
	$data += 'senha=' + attSenha.senha + '&';
	$data += 'id=' + attSenha.id;

	$.ajax({

		type: 'post',
		url: '/agtbr/sys/functions/AttSenha.php',
		data: $data,
		dataType: 'html',

		success: function (data) {

			if (data == 0) {
				window.alert('Senha alterada com sucesso');
			}

		},
		error: function (data) {}

	});

}

/*============================= NÃO IMPLEMENTADO ============================*/

function NaoImplementado(botao) {
	window.alert('Função ' + botao + ' não implementada.' + '\n' +
		'Comunique ao setor responsável.');
}