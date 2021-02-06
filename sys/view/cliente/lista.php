<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper" style="min-height: 0px;">
         <section class="content" id="content">
            <div class="row">
               <div class="box box-info">
                  <div class="box-header">
                     <h3 class="box-title">Lista de Clientes</h3>
                  </div>
                  <div class="box-body table-responsive">
                     <table id="lista_cliente" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>CPF</th>
                              <th>Nome</th>
                              <th>Telefone 01</th>
                              <th>Telefone 02</th>
                              <th>Status</th>
                              <th style="text-align: center;">Opções</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </section>
         <?php include '../../util/footer.php' ?>
      </div>
   </body>
   <?php include 'table/datatable.php'?>
   <script type="text/javascript">
      $(window).load(function() {
          $(".se-pre-con").fadeOut("slow");;
      });
      
      
   </script>
   <script type="text/javascript">
      function RemoveFunc(id) {
      
        $data = '';
        $data += 'id=' + id;     
         
        swal("Tem Certeza que deseja remover o Cliente?", {
            buttons: {
              cancel: "Não",
              catch: {
                text: "Sim",
                value: "remover",
              },
            },
          })
          .then((value) => {
            switch (value) {   
              case "remover":
                RemoveCliente(id);
                break;
          
              default:
                swal("Nenhum Cliente foi removido!");
            }
          });
      
      }  
      
      function RemoveCliente(id) {
      $.ajax({
      type: 'post',
      url: '/sgd/sys/functions/FuncCliente/removerCliente.php',
      data: $data,
      dataType: 'json',
      
      success: function (data) {
          
          if (data[0] == 0){
            
                     swal({
                      button: true, 
                      title: "Cliente removido com sucesso!",
                      icon: "success",
                      
                    })
      
      
                     window.setTimeout(function(){ 
                       window.location = "/sgd/sys/view/cliente/lista.php"; 
                       },
                     1000);
          
      
          } else if (data[0] == 1){
                     swal({
                      button: true, 
                      title: "ERRO",
                      text: "Ocorreu um erro!",
                      icon: "warning",
                      
                    })
          }
      },
      
      error: function (data) {}
      
      });
      
      }

   </script> 
</html>