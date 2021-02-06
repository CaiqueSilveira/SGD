<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <?php include '../../db/conn.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini fixed" id="sec">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper" >
         <section class="content" id="content">
            <form id="formCliente" name="formCliente">
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                     <i class="fa fa-address-book"></i>
                     Informações do Cliente</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link inactive_tab1" href="#" id="list_localizacao" style="border:1px solid #ccc;">
                     <i class="fa fa-map-marker"></i>
                     Localização</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <?php include 'view_cliente/cad_cliente/info_cliente.php' ?>
                  <?php include 'view_cliente/cad_cliente/localizacao_cliente.php' ?>
               </div>
            </form>
         </section>
         <?php include '../../util/footer.php' ?>
      </div>
   </body>
   <!-- InputMask -->
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
   <script src="../../bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
   <!-- InputMask -->
   <!-- Script de Edit -->
   <script src="../../functions/FuncCliente/CadCliente.js" type="text/javascript"></script>
   <script type="text/javascript">
      $('#formCliente').submit(function () {
      
          var cliente = new Object();
      
          cliente.nome = $('#nome').val().toUpperCase();
          cliente.cpf = $('#cpf').val().toUpperCase();
          cliente.sexo = $('#sexo').val().toUpperCase();
          cliente.estado_civil = $('#estado_civil').val().toUpperCase();
          cliente.etnia = $('#etnia').val().toUpperCase();
          cliente.dt_nascimento = $('#dt_nascimento').val();
          cliente.telefone_01 = $('#telefone_01').val();
          cliente.telefone_02 = $('#telefone_02').val();
          cliente.status = $('#status').val().toUpperCase();
          cliente.email = $('#email').val().toUpperCase();
          cliente.cep = $('#cep').val();
          cliente.estados = $('#estados').val().toUpperCase();
          cliente.cidades = $('#cidades').val().toUpperCase();
          cliente.endereco = $('#endereco').val().toUpperCase();
          cliente.complemento = $('#complemento').val().toUpperCase();
          cliente.numero = $('#numero').val();
          cliente.bairro = $('#bairro').val().toUpperCase();
      
      
      
          CadCliente(cliente);
      
                return false;
      });
      
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
         
          $('#info_dados').click(function() {
      
              $('#info_dados').addClass('active_tab1');
              $('#info_dados').removeClass('inactive_tab1');
              $('#list_localizacao').addClass('inactive_tab1');
              $('#list_localizacao').removeClass('active_tab1');
              $('#info_pessoais').addClass('inactive_tab1');
              $('#info_pessoais').removeClass('active_tab1');
              $('#info_profissionais').addClass('inactive_tab1');
              $('#info_profissionais').removeClass('active_tab1');
              $('#dados_basicos').show();
              $('#localizacao').hide();
              $('#dados_pessoais').hide();
              $('#dados_profissionais').hide();
      
          })
      
          $('#list_localizacao').click(function() {
      
              $('#list_localizacao').addClass('active_tab1');
              $('#list_localizacao').removeClass('inactive_tab1');
              $('#info_dados').addClass('inactive_tab1');
              $('#info_dados').removeClass('active_tab1');
              $('#info_pessoais').addClass('inactive_tab1');
              $('#info_pessoais').removeClass('active_tab1');
              $('#info_profissionais').addClass('inactive_tab1');
              $('#info_profissionais').removeClass('active_tab1');
              $('#dados_basicos').hide();
              $('#localizacao').show();
              $('#dados_pessoais').hide();
              $('#dados_profissionais').hide();
      
          })
      
          $('#info_profissionais').click(function() {
      
              $('#info_profissionais').addClass('active_tab1');
              $('#info_profissionais').removeClass('inactive_tab1');
              $('#info_pessoais').addClass('inactive_tab1');
              $('#info_pessoais').removeClass('active_tab1');
              $('#list_localizacao').addClass('inactive_tab1');
              $('#list_localizacao').removeClass('active_tab1');
              $('#info_dados').addClass('inactive_tab1');
              $('#info_dados').removeClass('active_tab1');
              $('#dados_basicos').hide();
              $('#localizacao').hide();
              $('#dados_pessoais').hide();
              $('#dados_profissionais').show();
      
          })
      
      $('#btn_dados').click(function () {
         var error_nome = '';
              var error_cpf = '';
              var error_sexo = '';
              var error_civil = '';
              var error_etnia = '';
              var error_status = '';
              var error_email = '';
              var error_telefone_01 = '';
              var error_telefone_02 = '';
              var error_data_02 = '';
           
      
          
              if ($.trim($('#nome').val()).length == 0) {
                  error_nome = 'Preencha este campo!';
                  $('#error_nome').text(error_nome);
                  window.location.href = '#sec';
      
              } else {
                  error_nome = '';
                  $('#error_nome').text(error_nome);
      
              }
              // VALIDA cpf
      
              if ($.trim($('#cpf').val()).length == 0) {
                  error_cpf = 'Preencha este campo!';
                  $('#error_cpf').text(error_cpf);
                  window.location.href = '#sec';
      
              } else {
                  error_cpf = '';
                  $('#error_cpf').text(error_cpf);
      
              }
               // VALIDA rg
      
              // VALIDA sexo
              if ($.trim($('#sexo').val()).length == 0) {
                  error_sexo = 'Selecione um item deste campo!';
                  $('#error_sexo').text(error_sexo);
                  window.location.href = '#sec';
      
              } else {
                  error_sexo = '';
                  $('#error_sexo').text(error_sexo);
      
              }
              if ($.trim($('#estado_civil').val()).length == 0) {
                  error_civil = 'Selecione um item deste campo!';
                  $('#error_civil').text(error_civil);
                  window.location.href = '#sec';
      
              } else {
                  error_civil = '';
                  $('#error_civil').text(error_civil);
      
              }
              // VALIDA etnia
              if ($.trim($('#etnia').val()).length == 0) {
                  error_etnia = 'Selecione um item deste campo!';
                  $('#error_etnia').text(error_etnia);
                  window.location.href = '#sec';
      
              } else {
                  error_etnia = '';
                  $('#error_etnia').text(error_etnia);
      
              }
              // VALIDA data nas
              if ($.trim($('#dt_nascimento').val()).length == 0) {
                  error_data_02 = 'Preencha este campo!';
                  $('#error_data_02').text(error_data_02);
                  window.location.href = '#sec';
      
              } else {
                  error_data_02 = '';
                  $('#error_data_02').text(error_data_02);
      
              }
            
                  
              if ($.trim($('#email').val()).length == 0) {
                  error_email = 'Preencha este campo!';
                  $('#error_email').text(error_email);
                  window.location.href = '#sec';
      
              } else {
                  error_email = '';
                  $('#error_email').text(error_email);
      
              }
      
              // VALIDA TELEFONE 01
              if ($.trim($('#telefone_01').val()).length == 0) {
                  error_telefone_01 = 'Preencha este campo!';
                  $('#error_telefone_01').text(error_telefone_01);
                  window.location.href = '#sec';
      
              } else {
                  error_telefone_01 = '';
                  $('#error_telefone_01').text(error_telefone_01);
      
              }
              // VALIDA TELEFONE 02
              if ($.trim($('#telefone_02').val()).length == 0) {
                  error_telefone_02 = 'Preencha este campo!';
                  $('#error_telefone_02').text(error_telefone_02);
                  window.location.href = '#sec';
      
              } else {
                  error_telefone_02 = '';
                  $('#error_telefone_02').text(error_telefone_02);
      
              }
                // VALIDA TELEFONE 02
              if ($.trim($('#status').val()).length == 0) {
                  error_status = 'Preencha este campo!';
                  $('#error_status').text(error_status);
                  window.location.href = '#sec';
      
              } else {
                  error_status = '';
                  $('#error_status').text(error_status);
      
              }
            
            
      
      
              if (error_cpf != '' || error_nome!= '' ||  error_sexo != '' || error_civil != '' ||  error_etnia != ''  || error_status != '' || error_email != '' || error_telefone_01 != '' ||
                  error_telefone_02 != '' ) {
                      
                  return false;
      
              } else
              {
      
              
        
      
              //AVANÇAR PARA LOCALIZAÇÃO
              $('#info_dados').removeClass('active_tab1');
              $('#info_dados').addClass('inactive_tab1');
              $('#list_localizacao').removeClass('inactive_tab1');
              $('#list_localizacao').addClass('active_tab1');
              $('#dados_basicos').hide();
              $('#localizacao').show();
      
              }
          });
      
          //VOLTAR PARA DADOS BÁSICOS
          $('#previous_dados').click(function() {
      
              $('#info_dados').addClass('active_tab1');
              $('#info_dados').removeClass('inactive_tab1');
              $('#list_localizacao').addClass('inactive_tab1');
              $('#list_localizacao').removeClass('active_tab1');
              $('#localizacao').hide();
              $('#dados_basicos').show();
      
      
          });
      
      
      });
   </script>
   <script type="text/javascript">
      $(function() {
           $("[data-inputmask]").inputmask();
      
      });
      
      $(window).load(function() {
          $(".se-pre-con").fadeOut("slow");;
      });
      
   </script>
</html>