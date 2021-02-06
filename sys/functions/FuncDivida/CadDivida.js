function CadDivida(divida) {

  $data = '';
  $data += 'cliente=' + divida.cliente + "&";
  $data += 'nome_p=' + divida.nome_p + "&";
  $data += 'quantidade=' + divida.quantidade + "&";
  $data += 'valor_compra=' + divida.valor_compra + "&";
  $data += 'status=' + divida.status + "&";
  $data += 'dt_compra=' + divida.dt_compra;


  //---------------------------------------------------------------------------------------------------//
  $.ajax({
    type: 'post',
    url: '/sgd/sys/functions/FuncDivida/CadDivida.php',
    data: $data,
    dataType: 'json',

    success: function (data) {

      if (data[0] == 0) {
        swal({
          button: true,
          title: "Divida cadastrada com sucesso!",
          icon: "success",

        })
        window.setTimeout(function () {
          window.location = "/sgd/sys/view/divida/lista.php";
        }, 1500);


      } else if (data[0] == 2) {
        swal({
          button: true,
          title: "Divida inválido!",
          text: "A Divida já existe na base de dados.",
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