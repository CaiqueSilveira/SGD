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
                     <h3 class="box-title">Lista de Usuários</h3>
                  </div>
                  <div class="box-body table-responsive">
                     <table id="lista_usuario" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Nome</th>
                              <th>Login</th>
                              <th>Permissão</th>
                              <th>Cargo</th>
                              <th>Status</th>
                              <th>Editar</th>
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
   </html>
   <?php include 'table/datatable.php' ?>
   <script type="text/javascript">
      $(window).load(function() {
          $(".se-pre-con").fadeOut("slow");;
      });
   </script>
