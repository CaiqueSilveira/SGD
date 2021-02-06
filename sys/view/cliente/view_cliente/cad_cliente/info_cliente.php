<!-- Informações Pessoais  -->
<div class="row">
   <section class="col-md-12">
      <div class="tab-pane active" id="dados_basicos">
         <div class="panel panel-default border-form" style="margin-bottom: 43px;">
            <div class="panel-body">
               <div class="row form-group">
                  <div class="col-xs-4">
                     <label>CPF</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                        <input type="text" class="form-control" data-inputmask="'mask': '999.999.999-99'" placeholder="000.000.000-00" id="cpf" name="cpf" />
                     </div>
                     <span id="error_cpf" class="text-danger"></span>
                  </div>
               </div>
               <div class="form-group">
                  <label>Nome Completo</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                     </div>
                     <input type="text" class="form-control" id="nome" placeholder="Não abreviar!" name="nome" />
                  </div>
                  <span id="error_nome" class="text-danger"></span>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Sexo</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-venus-mars"></i></div>
                           <select id="sexo" name="sexo" class="form-control">
                              <option value="">Selecione o sexo</option>
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                              <option value="N">Não declarado</option>
                           </select>
                        </div>
                        <span id="error_sexo" class="text-danger"></span>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Estado Civil</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-male"></i></div>
                           <select id="estado_civil" name="estado_civil" class="form-control">
                              <option value="">Selecione o estado civil</option>
                              <option value="S">Solteiro(a)</option>
                              <option value="C">Casado(a)</option>
                              <option value="D">Divorciado(a)</option>
                              <option value="V">Viúvo (a)</option>
                              <option value="O">Outros</option>
                           </select>
                        </div>
                        <span id="error_civil" class="text-danger"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Etnia/Raça</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-universal-access"></i></div>
                           <select id="etnia" name="etnia" class="form-control">
                              <option value="">Selecione a etnia/raça</option>
                              <option value="BR">Branco</option>
                              <option value="PD">Pardo</option>
                              <option value="NG">Negro</option>
                              <option value="IN">Indígena</option>
                              <option value="ND">Não Declarado</option>
                           </select>
                        </div>
                        <span id="error_etnia" class="text-danger"></span>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <label>Data de Nascimento</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" />
                     </div>
                     <span id="error_data_02" class="text-danger"></span>
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col-md-6">
                     <label>Telefone 01</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="tel" class="form-control" id="telefone_01" name="telefone_01" data-inputmask='"mask": "(99) 99999-9999"' data-mask placeholder="(99) 99999-9999" />
                     </div>
                     <span id="error_telefone_01" class="text-danger"></span>
                  </div>
                  <div class="col-md-6">
                     <label>Telefone 02</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" id="telefone_02" name="telefone_02" data-inputmask='"mask": "(99) 99999-9999"' data-mask placeholder="(99) 99999-9999" />
                     </div>
                     <span id="error_telefone_02" class="text-danger"></span>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Status</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                           <select id="status" name="status" class="form-control">
                              <option value="">Selecione o Status</option>
                              <option value="A">Ativo</option>
                              <option value="I">Inativo</option>
                           </select>
                        </div>
                        <span id="error_status" class="text-danger"></span>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>E-mail</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                           </div>
                           <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com.br" />
                        </div>
                        <span id="error_email" class="text-danger"></span>
                     </div>
                  </div>
               </div>
               <br />
               <div style="float: right;">
                  <button type="reset" class="btn btn-danger">Limpar</button>
                  <button type="button" name="btn_dados" id="btn_dados" class="btn btn-success">Próximo</button>
               </div>
               <br />
            </div>
         </div>
      </div>
   </section>
</div>
