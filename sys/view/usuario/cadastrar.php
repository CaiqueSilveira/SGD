<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <?php include '../../db/conn.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper">
      <section class="content" id="content">
         <form id="formUsuario" name="formUsuario" method="post">
            <ul class="nav nav-tabs">
               <li class="nav-item">
                  <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                  <i class="fa fa-address-book"></i>
                  Informações do Usuário</a>
               </li>
            </ul>
            <div class="tab-content">
               <?php include 'view_usuario/form.php' ?>
         </form>
      </section>
      <?php include '../../util/footer.php' ?>
      </div>
   </body>
   </html>
   <script src="../../functions/FuncUsuario/CadUsuario.js" type="text/javascript"></script>
   <!-- InputMask -->
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
   <!-- /InputMask -->
   <script type="text/javascript">
      $('#formUsuario').submit(function() {
             var cadastro = new Object();
             cadastro.nome = $('#nome').val().toUpperCase();
             cadastro.login = $('#login').val();
             cadastro.senha = $('#senha').val();
             cadastro.permissao = $('#permissao').val().toUpperCase();
             cadastro.cargo = $('#cargo').val().toUpperCase();
             cadastro.status = $('#status').val().toUpperCase();
             CadUsuario(cadastro);
             return false;
      });   
      $(window).load(function() {
         $(".se-pre-con").fadeOut("slow");;
      });
   </script>
