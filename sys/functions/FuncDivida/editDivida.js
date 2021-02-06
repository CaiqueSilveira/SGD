function editDivida(divida) {

  $data = '';
  $data += 'id=' + divida.id + "&";
  $data += 'cliente=' + divida.cliente + "&";
  $data += 'nome_p=' + divida.nome_p + "&";
  $data += 'quantidade=' + divida.quantidade + "&";
  $data += 'valor_compra=' + divida.valor_compra + "&";
  $data += 'status=' + divida.status + "&";
  $data += 'dt_compra=' + divida.dt_compra;
 

  //---------------------------------------------------------------------------------------------------//
  $.ajax({
    type: 'post',
    url: '/sgd/sys/functions/FuncDivida/editDivida.php',
    data: $data,
    dataType: 'json',

  
        success: function (data) {

          if (data == 0) {
            swal({
              button: true,
              title: "Atualizado com Sucesso!",
              icon: "success",

            })
            window.setTimeout(function () {
              window.location = "/sgd/sys/view/divida/lista.php";},1500);
    

          } else if (data == 1) {
            swal({
              button: true,
              title: "Erro na atualização!",
              icon: "warning",

            })


          }

        },
        error: function (data) {}

      });

    }