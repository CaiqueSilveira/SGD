<!DOCTYPE html>
<html>
   <?php include '../../db/conn.php'; ?>
   <?php include '../../util/head.php'; ?>
   <?php
      $id = $_GET['id'];
      $query = 'SELECT * FROM sgd_cliente WHERE id = "' . $id . '"';
      $result = $mysqli->query($query);
      $row = $result->fetch_assoc();
      ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper" id="sec">
         <section class="content" id="content">
            <form id="formEdit" name="formEdit" >
               <input type="hidden"  id="id" 
                  value="<?php echo $_GET['id']; ?>" required/>
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
                  <?php include 'view_cliente/edit_cliente/info_cliente.php' ?>
                  <?php include 'view_cliente/edit_cliente/localizacao_cliente.php' ?>
               </div>
            </form>
         </section>
         <?php include '../../util/footer.php' ?>
      </div>
   </body>
   </body>
</html>
<script src="../../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="../../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="../../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script src="../../functions/FuncCliente/editCliente.js" type="text/javascript"></script>
<script type="text/javascript">
   $(window).load(function() {
       $(".se-pre-con").fadeOut("slow");;
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
      
       $('#btn_dados').click(function() {
   
           //AVANÇAR PARA LOCALIZAÇÃO
           $('#info_dados').removeClass('active_tab1');
           $('#info_dados').addClass('inactive_tab1');
           $('#list_localizacao').removeClass('inactive_tab1');
           $('#list_localizacao').addClass('active_tab1');
           $('#dados_basicos').hide();
           $('#localizacao').show();
   
   
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
  
       $('#formEdit').submit(function() {
       
       var cliente = new Object();
   
       cliente.id = $('#id').val();
       cliente.nome = $('#nome').val();
       cliente.cpf = $('#cpf').val();
       cliente.sexo = $('#sexo').val();
       cliente.etnia = $('#etnia').val();
       cliente.estado_civil = $('#estado_civil').val();
       cliente.dt_nascimento = $('#dt_nascimento').val();
       cliente.telefone_01 = $('#telefone_01').val();
       cliente.telefone_02 = $('#telefone_02').val();
       cliente.status = $('#status').val();
       cliente.email = $('#email').val();
       cliente.cep = $('#cep').val();
       cliente.estados = $('#estados').val();
       cliente.cidades = $('#cidades').val();
       cliente.endereco = $('#endereco').val();
       cliente.complemento = $('#complemento').val();
       cliente.numero = $('#numero').val();
       cliente.bairro = $('#bairro').val();
   
       editCliente(cliente);
   
       return false;
       
     });
           
   
</script>