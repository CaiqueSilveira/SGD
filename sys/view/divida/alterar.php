<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>:
   <?php include '../../db/conn.php'; ?>
   <?php
      $id = $_GET['id'];
             $query = 'SELECT * FROM sgd_divida 
                    WHERE id = "' . $id . '"';
           $result = $mysqli->query($query);
          $row = $result->fetch_assoc();
      ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <div class="se-pre-con"></div>
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper">
         <section class="content" id="content">
            <form id="formEdit" name="formEdit" novalidate>
               <input type="hidden"  id="id" 
                  value="<?php echo $_GET['id']; ?>" required/>
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                     <i class="fa fa-address-book"></i>
                     Informações da Divida</a>
                  </li>
               </ul>
               <div class="tab-content">
                  <?php include 'view_divida/form_edit.php' ?>
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
<script src="../../functions/FuncDivida/editDivida.js" type="text/javascript"></script>
<script type="text/javascript">
   $(window).load(function() {
       $(".se-pre-con").fadeOut("slow");;
   });
</script>
<script type="text/javascript">
   $(function() {
   
    
       $("[data-inputmask]").inputmask();
   
   });
       $('#formEdit').submit(function() {
       
       var divida = new Object();
   
       divida.id = $('#id').val();
       divida.cliente = $('#cliente').val();
       divida.nome_p = $('#nome_p').val();
       divida.quantidade = $('#quantidade').val();
       divida.valor_compra = $('#valor_compra').val();
       divida.status = $('#status').val();
       divida.dt_compra = $('#dt_compra').val();
       editDivida(divida);
       return false;
   
     });
</script>