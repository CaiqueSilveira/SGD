<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <?php include '../../db/conn.php'; ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper" id="sec">
         <section class="content" id="content">
            <form id="formDivida" name="formDivida">
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                     <i class="fa fa-address-book"></i>
                     Informações do Dívida</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <?php include 'view_divida/form_cad.php' ?>
               </div>
            </form>
         </section>
         <?php include '../../util/footer.php' ?>
      </div>
   </body>
</html>
<!-- InputMask -->
<script src="../../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="../../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="../../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- InputMask -->
<!-- Script de Edit -->
<script src="../../functions/FuncDivida/CadDivida.js" type="text/javascript"></script>
<script type="text/javascript">
   $('#formDivida').submit(function () {
   
       var divida = new Object();
   
       divida.cliente = $('#cliente').val();
       divida.nome_p = $('#nome_p').val().toUpperCase();
       divida.quantidade = $('#quantidade').val();
       divida.valor_compra = $('#valor_compra').val();
       divida.status = $('#status').val().toUpperCase();
       divida.dt_compra = $('#dt_compra').val();

       CadDivida(divida);
   
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
   
       });
   
</script>
<script type="text/javascript">
   $(function() {
   
       //Datemask dd/mm/yyyy
       $("[data-inputmask]").inputmask();
   
   });
   
   
   $(window).load(function() {
       $(".se-pre-con").fadeOut("slow");;
   });
   
</script>