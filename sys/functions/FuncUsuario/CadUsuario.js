function CadUsuario(cadastro) {

	$data = '';
	$data += 'nome=' + cadastro.nome + "&";
	$data += 'login=' + cadastro.login + "&";
	$data += 'senha=' + cadastro.senha + "&";
	$data += 'permissao=' + cadastro.permissao + "&";
	$data += 'cargo=' + cadastro.cargo + "&";
	$data += 'status=' + cadastro.status;


	$.ajax({
		type: 'post',
		url: '/sgd/sys/functions/FuncUsuario/CadUsuario.php',
		data: $data,
		dataType: 'json',

		success: function (data) {
				
				if (data[0] == 0){
                   swal({
                    button: true, 
                    title: "Usuário cadastrado com sucesso!",
                    text: "Login de usuário: " + data[1] + " \n Nome: " + data[2] + "",
                    icon: "success",
                    
                  })
				  window.setTimeout(function () {
					window.location = "/sgd/sys/view/usuario/r_usuario.php";},1500);

				} else if (data[0] == 2){
                   swal({
                    button: true, 
                    title: "Login inválidos!",
                    text: "Login já existe na base de dados.",
                    icon: "warning",
                    
                  })
				} else {
                   swal({
                    button: true, 
                    title: "Erro!",
                    text: "Contacte o administrador do sistema.",
                    icon: "warning",
                    
                  })
				}
		},

		error: function (data) {}

	});

}