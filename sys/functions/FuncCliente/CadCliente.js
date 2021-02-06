function CadCliente(cliente) {

  $data = '';
  $data += 'nome=' + cliente.nome + "&";
  $data += 'cpf=' + cliente.cpf + "&";
  $data += 'sexo=' + cliente.sexo + "&";
  $data += 'etnia=' + cliente.etnia + "&";
  $data += 'estado_civil=' + cliente.estado_civil + "&";
  $data += 'dt_nascimento=' + cliente.dt_nascimento + "&";
  $data += 'telefone_01=' + cliente.telefone_01 + "&";
  $data += 'telefone_02=' + cliente.telefone_02 + "&";
  $data += 'status=' + cliente.status + "&";
  $data += 'email=' + cliente.email + "&";
  $data += 'cep=' + cliente.cep + "&";
  $data += 'estado=' + cliente.estados + "&";
  $data += 'cidade=' + cliente.cidades + "&";
  $data += 'endereco=' + cliente.endereco + "&";
  $data += 'complemento=' + cliente.complemento + "&";
  $data += 'numero=' + cliente.numero + "&";
  $data += 'bairro=' + cliente.bairro;

  //---------------------------------------------------------------------------------------------------//
  $.ajax({
    type: 'post',
    url: '/sgd/sys/functions/FuncCliente/CadCliente.php',
    data: $data,
    dataType: 'json',

    success: function (data) {

      if (data[0] == 0) {
        swal({
          button: true,
          title: "Cliente cadastrado com sucesso!",
          icon: "success",

        })
        window.setTimeout(function () {
          window.location = "/sgd/sys/view/cliente/lista.php";
        }, 1500);


      } else if (data[0] == 2) {
        swal({
          button: true,
          title: "Cliente inválido!",
          text: "O Cliente já existe na base de dados.",
          icon: "warning",

        })
      } else if (data[0] == 1) {
        swal({
          button: true,
          title: "Erro!",
          text: "Contate o administrador do Sistema",
          icon: "warning",

        })
      }
    },

    error: function (data) { }

  });

}