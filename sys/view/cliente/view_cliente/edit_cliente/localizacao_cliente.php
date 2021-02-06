<!-- Localização -->
<div class="tab-pane " id="localizacao">
   <div class="panel panel-default border-form">
      <div class="panel-body">
         <div class="form-group">
            <label>CEP</label>
            <div class="input-group">
               <div class="input-group-addon">
                  <i class="fa fa-home"></i>
               </div>
               <input style="width: 36%;" class="form-control"  id="cep" name="cep"
                  data-inputmask="&quot;mask&quot;: &quot;99999-999&quot;" data-mask="" required="" type="text" placeholder="00000-000" value="<?php echo $row['cep']; ?>">
               <button type="button"  class="form-control" style="width: 40px">
               <i  class="fa fa-search"></i>
               </button>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-6">
               <div class="form-group">
                  <label>Estado</label>
                  <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                     <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="NÃO ABREVIAR!" value="<?php echo $row['estado']; ?>" />
                  </div>
               </div>
            </div>
            <div class="col-xs-6">
               <div class="form-group">
                  <label>Cidade</label>
                  <div class="input-group">
                     <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                     <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="NÃO ABREVIAR!" value="<?php echo $row['cidade']; ?>" />
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label>Endereço</label>
            <div class="input-group">
               <div class="input-group-addon">
                  <i class="fa fa-home"></i>
               </div>
               <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="NÃO ABREVIAR!" value="<?php echo $row['endereco']; ?>" />
            </div>
         </div>
         <div class="form-group">
            <label>Complemento</label>
            <div class="input-group">
               <div class="input-group-addon">
                  <i class="fa fa-home"></i>
               </div>
               <input type="text" class="form-control" id="complemento" name="complemento" placeholder="NÃO ABREVIAR!" value="<?php echo $row['complemento']; ?>"/>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-6">
               <div class="form-group">
                  <label>Número</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                     </div>
                     <input type="text" class="form-control" id="numero" name="numero" required placeholder="000" value="<?php echo $row['numero']; ?>"/>
                  </div>
               </div>
            </div>
            <div class="col-xs-6">
               <div class="form-group">
                  <label>Bairro</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                     </div>
                     <input type="text" class="form-control" id="bairro" name="bairro" required placeholder="NÃO ABREVIAR!" value="<?php echo $row['bairro']; ?>"/>
                  </div>
               </div>
            </div>
         </div>
         <br>
         <div style="float:right;">
            <button type="reset" class="btn btn-danger">Limpar</button>
            <button type="button" name="previous_dados" id="previous_dados" class="btn btn-info">
            Anterior
            </button>
            <button type="submit" name="salvar" id="salvar" class="btn btn-success">Salvar</button>
         </div>
         <br />
      </div>
   </div>
</div>