<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <?php include '../../db/conn.php'; 
      $id = $_SESSION['usuarioID'];
      
      $query = 'SELECT * FROM sgd_usuario 
                WHERE id = "' . $id . '"';
      
      $result = $mysqli->query($query);
      $row = $result->fetch_assoc();
      
      ?>
   <body class="hold-transition skin-blue sidebar-mini fixed">
      <?php include '../../util/nav.php'; ?>
      <div class="content-wrapper">
      <div class="se-pre-con"></div>
      <section class="content" id="content">
         <form id="att" name="cadastro">
            <input type="hidden" id="id" value="<?php echo $_SESSION['usuarioID']; ?>" />
            <ul class="nav nav-tabs">
               <li class="nav-item">
                  <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                  <i class="fa fa-address-book"></i>
                  Informações do Usuário </a>
               </li>
            </ul>
            <div class="row">
            <section class="col-md-12">
               <div class="tab-pane active" id="dados_basicos">
                  <div class="panel panel-default border-form" style="margin-bottom: 43px;">
                     <div class="panel-body">
                        <div class="form-group">
                           <label>Nome Completo</label>
                           <div class="input-group">
                              <div class="input-group-addon">
                                 <i class="fa fa-user"></i>
                              </div>
                              <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Não abreviar!"
                                 value="<?php echo $row['nome']; ?>" required disabled />
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Login</label>
                           <div class="input-group">
                              <div class="input-group-addon">
                                 <i class="fa fa-barcode"></i>
                              </div>
                              <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Insira somente número"
                                 value="<?php echo $row['login']; ?>" required disabled />
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-4">
                              <div class="form-group">
                                 <label>Permissão</label>
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                    <select id="permissao" name="permissao" required class="form-control" disabled>
                                    <?php
                                       $queryPermissao = 'SELECT * FROM sgd_permissao';
                                       $resultPermissao = $mysqli->query($queryPermissao);
                                       ?>
                                    <?php
                                       if ($resultPermissao->num_rows > 0) {
                                             echo "<option>SELECIONE UMA PERMISSÃO</option>";
                                         // output data of each row
                                         while($rowPermissao = $resultPermissao->fetch_assoc()) {
                                       
                                           if ($row['permissao'] == $rowPermissao['id']){
                                             echo "<option selected>". $rowPermissao['nivel'] ."</option>";
                                           } else {
                                             echo "<option>". $rowPermissao['nivel'] ."</option>";
                                           }
                                         }
                                       
                                       } else {
                                         echo "<option>ERRO</option>";
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-4">
                              <div class="form-group">
                                 <label>Cargo</label>
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                    <select id="cargo_usuario" name="cargo_usuario" required class="form-control" disabled>
                                    <?php
                                       $queryCargo = 'SELECT * FROM sgd_cargo';
                                       $resultCargo = $mysqli->query($queryCargo);
                                       ?>
                                    <?php
                                       if ($resultCargo->num_rows > 0) {
                                             echo "<option>SELECIONE UM CARGO</option>";
                                         // output data of each row
                                         while($rowCargo = $resultCargo->fetch_assoc()) {
                                       
                                           if ($row['cargo'] == $rowCargo['id']){
                                             echo "<option selected>". $rowCargo['cargo'] ."</option>";
                                           } else {
                                             echo "<option>". $rowCargo['cargo'] ."</option>";
                                           }
                                         }
                                       
                                       } else {
                                         echo "<option>ERRO</option>";
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-4">
                              <div class="form-group">
                                 <label>Status</label>
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                    <select id="status_usuario" name="status_usuario" required class="form-control" disabled>
                                       <option>SELECIONE O STATUS</option>
                                       <?php
                                          if ($row['ativo'] == 'A') {
                                                                                echo "<option selected>ATIVO</option>";
                                            echo "<option>INATIVO</option>";
                                          } else if ($row['ativo'] == 'I'){
                                            echo "<option>ATIVO</option>";
                                            echo "<option selected>INATIVO</option>";
                                          } else {
                                            echo "<option>ERRO</option>";
                                          }
                                          ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12">
                              <div class="form-group">
                                 <label>Redefinir a senha:</label>
                              </div>
                              <div class="row">
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="password" class="form-control" placeholder="Insira sua senha atual" id="atual_senha"
                                             name="atual_senha" minlength="6" maxlength="8" required />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="password" class="form-control" placeholder="Insira a nova senha" id="nova_senha"
                                             name="nova_senha" minlength="6" maxlength="8" required />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="password"  class="form-control" placeholder="Confirma a nova senha"
                                             id="conf_senha" name="conf_senha" minlength="6" maxlength="8" required />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br />
                              <div class="m_botao1" style="float:right;">
                                 <button type="button" name="cancelar" id="cancelar" class="btn btn-danger">Cancelar</button>
                                 <button type="submit" name="atualizar" id="atualizar" class="btn btn-success">Atualizar</button>
                              </div>
                              <br />
                           </div>
                        </div>
                     </div>
            </section>
            </div>
         </form>
      </section>
      <?php include '../../util/footer.php' ?>
      </div>
   </body>
</html>
<script type="text/javascript">
   $(window).load(function () {
     $(".se-pre-con").fadeOut("slow");;
   });
</script>
<script type="text/javascript">
   $('#att').submit(function () {
   
     var attSenha = new Object();
   
     $senha = $('#atual_senha').val();
     $nova_senha = $('#nova_senha').val();
     $conf_senha = $('#conf_senha').val();
   
     if ($nova_senha != $conf_senha) {
       swal({
         button: true,
         title: "Senhas não coincidem!",
         text: "Os campos devem possuir a mesma senha.",
         icon: "error",
   
       });
       return false;
   
     } else {
   
       attSenha.senha = $senha;
       attSenha.nova_senha = $nova_senha;
       attSenha.id = $('#id').val();
   
       AttSenha(attSenha);
       return false;
     }
   
   });
   
   
   
   function AttSenha(attSenha) {
   
     $data = '';
     $data += 'senha=' + attSenha.senha + '&';
     $data += 'novasenha=' + attSenha.nova_senha + '&';
     $data += 'id=' + attSenha.id;
   
     $.ajax({
   
       type: 'post',
       url: '/sgd/sys/functions/FuncUsuario/AttSenha.php',
       data: $data,
       dataType: 'html',
   
       success: function (data) {
   
         if (data == 0) {
           swal({
             button: true,
             title: "Sucesso!",
             text: "A senha foi alterada.",
             icon: "success",
   
           })
           document.getElementById("atual_senha").value = '';
           document.getElementById("nova_senha").value = '';
           document.getElementById("conf_senha").value = '';
   
         } else if (data == 1) {
           swal({
             button: true,
             title: "Erro!",
             text: "Senha atual incorreta.",
             icon: "warning",
   
           })
           document.getElementById("atual_senha").value = '';
           document.getElementById("nova_senha").value = '';
           document.getElementById("conf_senha").value = '';
   
         }
   
       },
       error: function (data) {}
   
     });
   
   }
</script>