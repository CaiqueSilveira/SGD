<!DOCTYPE html>
<html>
   <?php include '../../util/head.php'; ?>
   <?php include '../../db/conn.php'; 
      $id = $_GET['id'];
      
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
            <form id="edit" name="cadastro">
               <input type="hidden"  id="id" 
                  value="<?php echo $_GET['id']; ?>" required/>
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active_tab1" href="#" style="border:1px solid #ccc;  " id="info_dados">
                     <i class="fa fa-address-book"></i>
                     Informações do Usuário </a>
                  </li>
               </ul>
               <div class="row">
                  <section class="col-md-12 ">
                     <div class="tab-pane active" id="dados_basicos">
                        <div class="panel panel-default border-form" style="margin-bottom: 43px;">
                           <div class="panel-body">
                              <!-- Nome Completo Usuário -->
                              <div class="form-group">
                                 <label>Nome Completo</label>
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Não abreviar!" 
                                       value="<?php echo $row['nome']; ?>" required/>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <label>Login</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="text" class="form-control" id="login" name="login" placeholder="Insira somente número"  value="<?php echo $row['login']; ?>" required/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <label>Senha</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="password" class="form-control" id="atual_senha" name="atual_senha" placeholder="Insira somente número"  value="<?php echo $row['senha']; ?>" required/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <label>Confirmar Senha</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-barcode"></i>
                                          </div>
                                          <input type="password" class="form-control" id="conf_senha" name="conf_senha" placeholder="Insira somente número" onblur="validatePassword();"   value="<?php echo $row['senha']; ?>" required/>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-xs-4">
                                    <div class="form-group">
                                       <label>Permissão</label>
                                       <div class="input-group">
                                          <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                          <select id="permissao" name="permissao" required class="form-control">
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
                                                   echo "<option value='". $rowPermissao['id'] ."' selected>". $rowPermissao['nivel'] ."</option>";
                                                 } else {
                                                   echo "<option value='". $rowPermissao['id'] ."'>". $rowPermissao['nivel'] ."</option>";
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
                                          <select id="cargo" name="cargo" required class="form-control">
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
                                                   echo "<option value='". $rowCargo['id'] ."' selected>". $rowCargo['cargo'] ."</option>";
                                                 } else {
                                                   echo "<option value='". $rowCargo['id'] ."'>". $rowCargo['cargo'] ."</option>";
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
                                          <select id="status" name="status" required class="form-control" >
                                             <option>Selecione o Status</option>
                                             <?php
                                                if ($row['ativo'] == 'A'){
                                                  echo "<option value='A' selected>Ativo</option>";
                                                  echo "<option value='I'>Inativo</option>";
                                                } else {
                                                  echo "<option value='A'>Ativo</option>";
                                                  echo "<option value='I' selected>Inativo</option>";
                                                }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br />
                              <div class="m_botao1" style="float:right">
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
      $(window).load(function() {
          $(".se-pre-con").fadeOut("slow");;
      });
   </script>
   <!-- NEXT SCRIPT -->
   <script type="text/javascript">
      $('#edit').submit(function() {
      
          var attUsuario = new Object();
            
          attUsuario.id = $('#id').val();
          attUsuario.nome = $('#nome').val();
          attUsuario.login = $('#login').val();
          attUsuario.senha = $('#atual_senha').val();
          attUsuario.permissao = $('#permissao').val();
          attUsuario.cargo = $('#cargo').val();
          attUsuario.status = $('#status').val();
      
              AttUsuario(attUsuario);
              return false;
      
      });
      
      
      function AttUsuario(attUsuario) {
      
        $data = '';
        $data += 'id=' + attUsuario.id + "&";
        $data += 'nome=' + attUsuario.nome + "&";
        $data += 'login=' + attUsuario.login + "&";
        $data += 'atual_senha=' + attUsuario.senha + "&";
        $data += 'permissao=' + attUsuario.permissao + "&";
        $data += 'cargo=' + attUsuario.cargo + "&";
        $data += 'status=' + attUsuario.status;
      
        $.ajax({
          type: 'post',
          url: '/sgd/sys/functions/FuncUsuario/AttUsuario.php',
          data: $data,
          dataType: 'json',
      
      
          success: function (data) {
      
            if (data == 0) {
              swal({
                button: true,
                title: "Atualizado com Sucesso!",
                icon: "success",
      
              })
      
              window.location.href = '?id=' + attUsuario.id;
      
      
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
   </script>
