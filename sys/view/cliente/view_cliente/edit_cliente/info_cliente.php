<!-- Informações Pessoais  -->
<div class="row">
   <section class="col-md-12 ">
      <div class="tab-pane active" id="dados_basicos">
         <div class="panel panel-default border-form" style="margin-bottom: 43px;">
            <div class="panel-body">
               <div class="row form-group">
                  <div class="col-xs-6">
                     <label>CPF</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                        <input type="text" class="form-control" data-inputmask="'mask': '999.999.999-99'" placeholder="000.000.000-00"
                           id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>" required />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Nome Completo</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                     </div>
                     <input type="text" class="form-control" id="nome" placeholder="Não abreviar!" name="nome" value="<?php echo $row['nome']; ?>" required />
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Sexo</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-venus-mars"></i></div>
                           <select id="sexo" name="sexo" required class="form-control">
                              <option value="">Selecione o sexo</option>
                              <option <?php echo ($row['sexo'] == "M" ? "selected" : "" ); ?> value="M">Masculino</option>
                              <option <?php echo ($row['sexo'] == "F" ? "selected" : "" ); ?> value="F">Feminino</option>
                              <option <?php echo ($row['sexo'] == "N" ? "selected" : "" ); ?> value="N">Não declarado</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Estado Civil</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-male"></i></div>
                           <select id="estado_civil" name="estado_civil" required class="form-control">
                              <option value="">Selecione o estado civil</option>
                              <option <?php echo ($row['estado_civil'] == "S" ? "selected" : "" ); ?> value="S">Solteiro(a)</option>
                              <option <?php echo ($row['estado_civil'] == "C" ? "selected" : "" ); ?> value="C">Casado(a)</option>
                              <option <?php echo ($row['estado_civil'] == "D" ? "selected" : "" ); ?> value="D">Divorciado(a)</option>
                              <option <?php echo ($row['estado_civil'] == "V" ? "selected" : "" ); ?> value="V">Viúvo (a)</option>
                              <option <?php echo ($row['estado_civil'] == "O" ? "selected" : "" ); ?> value="O">Outros</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Etnia/Raça</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-universal-access"></i></div>
                           <select id="etnia" name="etnia" required class="form-control">
                              <option value="">Selecione a etnia/raça</option>
                              <option <?php echo ($row['etnia'] == "BR" ? "selected" : "" ); ?> value="BR">Branco</option>
                              <option <?php echo ($row['etnia'] == "PD" ? "selected" : "" ); ?> value="PD">Pardo</option>
                              <option <?php echo ($row['etnia'] == "NG" ? "selected" : "" ); ?> value="NG">Negro</option>
                              <option <?php echo ($row['etnia'] == "IN" ? "selected" : "" ); ?> value="IN">Indígena</option>
                              <option <?php echo ($row['etnia'] == "ND" ? "selected" : "" ); ?> value="ND">Não Declarado</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <label>Data de Nascimento</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?php echo $row['dt_nascimento']; ?>" required />
                     </div>
                  </div>
               </div>
               <div class="row form-group">
                  <div class="col-md-6">
                     <label>Telefone 01</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="tel" class="form-control" id="telefone_01" name="telefone_01" data-inputmask='"mask": "(99) 99999-9999"'
                           data-mask required placeholder="(99) 99999-9999" value="<?php echo $row['telefone_01']; ?>" />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>Telefone 02</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" id="telefone_02" name="telefone_02" data-inputmask='"mask": "(99) 99999-9999"'
                           data-mask placeholder="(99) 99999-9999" value="<?php echo $row['telefone_02']; ?>"/>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Status</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                           <select id="status" name="status" required class="form-control">
                              <option value="">Selecione o Status</option>
                              <option <?php echo ($row['status'] == "A" ? "selected" : "" ); ?> value="A">Ativo</option>
                              <option <?php echo ($row['status'] == "I" ? "selected" : "" ); ?> value="I">Inativo</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>E-mail</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                           </div>
                           <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com.br" value="<?php echo $row['email']; ?>"/>
                        </div>
                     </div>
                  </div>
               </div>
               <br/>
               <div style="float:right;">
                  <button type="reset" class="btn btn-danger">Limpar</button>
                  <button type="button" name="btn_dados" id="btn_dados" class="btn btn-success">Próximo</button>
               </div>
               <br/>
            </div>
         </div>
      </div>
   </section>
</div>