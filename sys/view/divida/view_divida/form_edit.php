<!-- Informações Pessoais  -->
<div class="row">
   <section class="col-md-12 ">
      <div class="tab-pane active" id="dados_basicos">
         <div class="panel panel-default border-form" style="margin-bottom: 43px;">
            <div class="panel-body">
               <div class="row">
                  <div class="col-xs-4">
                     <div class="form-group">
                        <label>Relãção de Clientes</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                           <select id="cliente" name="cliente" required class="form-control">
                           <?php
                              $queryPermissao = 'SELECT * FROM sgd_cliente';
                              $resultPermissao = $mysqli->query($queryPermissao);
                              ?>
                           <?php
                              if ($resultPermissao->num_rows > 0) {
                                    echo "<option>SELECIONE UM CLIENTE</option>";
                                // output data of each row
                                while($rowPermissao = $resultPermissao->fetch_assoc()) {
                              
                                  if ($row['cliente'] == $rowPermissao['id']){
                                    echo "<option value='". $rowPermissao['id'] ."' selected>". $rowPermissao['nome'] ."</option>";
                                  } else {
                                    echo "<option value='". $rowPermissao['id'] ."'>". $rowPermissao['nome'] ."</option>";
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
               </div>
               <div class="row form-group">
                  <div class="col-md-4">
                     <label>Nome do Produto</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control"  value="<?php echo $row['descricao']; ?>" id="nome_p" name="nome_p" placeholder="NOME DO PRODUTO!" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label>Quantidade</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="number" class="form-control" value="<?php echo $row['quantidade']; ?>" id="quantidade" name="quantidade"  placeholder="000" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label>Valor da Compra</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $row['valor']; ?>" id="valor_compra" name="valor_compra"  placeholder="R$ 00.00" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Status da Dívida</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                           <select id="status" name="status" required class="form-control">
                           <?php
                              if ($row['status'] == 'P'){
                                echo "<option value='P' selected>Pago</option>";
                                echo "<option value='N'>Não Pago</option>";
                              } else {
                                echo "<option value='P'>Pago</option>";
                                echo "<option value='N' selected>Não Pago</option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <label>Data da Compra</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="date" class="form-control" value="<?php echo $row['data_compra']; ?>" id="dt_compra" name="dt_compra" required />
                     </div>
                  </div>
               </div>
               <br />
               <div style="float:right;">
                  <button type="reset" class="btn btn-danger">Limpar</button>
                  <button type="submit"  class="btn btn-success">Salvar</button>
               </div>
               <br />
            </div>
         </div>
      </div>
   </section>
</div>