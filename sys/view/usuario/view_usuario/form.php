<!-- Informações Pessoais  -->

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
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Não abreviar!" required />
            </div>
          </div>
          <!-- /Nome Completo Agente -->
        
          <!-- Login -->
          <div class="form-group">
            <label>Login</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </div>
              <input type="number" class="form-control" id="login" name="login" placeholder="Insira somente número" required />
            </div>
          </div>
          <!-- /Login -->
          <!-- Senha Usuario -->
          <div class="form-group">
            <label>Senha</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </div>
              <input type="password" class="form-control" placeholder="Insira sua senha" id="senha" name="senha" minlength="6" maxlength="8" required />
            </div>
          </div>
          <!-- /Senha Usuario -->
          <!-- Confirmar Senha -->
          <div class="form-group">
            <label>Confirmar Senha</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </div>
              <input type="password" class="form-control" placeholder="Confirme sua senha" id="confirm_password" onblur="validatePassword();" name="confirm_password" minle="6" max="8" required />
            </div>
          </div>
          <!-- /Confirmar Senha -->
          <!-- Segunda Row -->
          <div class="row">
            <!-- Permissao Usuario -->
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
                      
                          echo "<option value='". $rowPermissao['id'] ."'>". $rowPermissao['nivel'] ."</option>";
                      }

                    } else {
                      echo "<option>ERRO</option>";
                    }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /Permissao Usuario -->
            <!-- Cargo Usuario -->
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
                      
                          echo "<option value='". $rowCargo['id'] ."'>". $rowCargo['cargo'] ."</option>";
                      }

                    } else {
                      echo "<option>ERRO</option>";
                    }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /Cargo Usuario -->
            <!-- Status Usuario -->
            <div class="col-xs-4">
              <div class="form-group">
                <label>Status</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                  <select id="status" name="status" required class="form-control" >
                    <option>Selecione o Status</option>
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /Status Usuario -->
          </div>
          <!-- /Segunda Row -->
          <br />
          <!-- Botão -->
          <div style="float:right; ">
            <button type="reset" class="btn btn-info">Limpar</button>
            <button type="submit" class="btn btn-success" >Salvar</button>
          </div>
          <!-- /Botão -->
          <br />
        </div>
        <!-- /panel-body -->
      </div>
      <!-- /panel panel-default -->
    </div>
    <!-- /tab-pane active -->
  </section>
</div>
<!-- Cor do botao -->

<!-- /Cor do botao -->

<!-- Script de Cadastro -->
<script type="text/javascript">
  function validatePassword() {

    var password = document.getElementById("senha");
    var confirm_password = document.getElementById("confirm_password");

     if (password.value != confirm_password.value) {
       swal({
           button: true, 
           title: "Senhas não coincidem!",
           text: "Os campos devem possuir a mesma senha.",
           icon: "error",
                    
        });
     }

  }

  </script>