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
                           <div class="input-group-addon"><i class="fa fa-users"></i></div>
                           <select id="cliente" name="cliente" required class="form-control">
                           <?php
                              $queryCliente = 'SELECT * FROM sgd_cliente';
                              $resultCliente = $mysqli->query($queryCliente);
                              ?>
                           <?php
                              if ($resultCliente->num_rows > 0) {
                                    echo "<option>SELECIONE UM CLIENTE</option>";
                                // output data of each row
                                while($rowCliente = $resultCliente->fetch_assoc()) {
                                
                                    echo "<option value='". $rowCliente['id'] ."'>". $rowCliente['nome'] ."</option>";
                                }
                              
                              } else {
                                echo "<option>Não existe nenhum cliente cadastrado.</option>";
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
                           <i class="fa fa-shopping-basket"></i>
                        </div>
                        <input type="text" required  class="form-control" id="nome_p" name="nome_p" placeholder="NOME DO PRODUTO!" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label>Quantidade</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-cubes"></i>
                        </div>
                        <input type="number" required  class="form-control" id="quantidade" name="quantidade"  placeholder="000" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <label>Valor da Compra</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-bitcoin"></i>
                        </div>
                        <input type="text" required  class="form-control" id="valor_compra" name="valor_compra"  placeholder="R$ 00.00" onKeyPress="return(moeda(this,'.',',',event))"/>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6">
                     <div class="form-group">
                        <label>Status da Dívida</label>
                        <div class="input-group">
                           <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
                           <select id="status" name="status" required class="form-control">
                              <option value="">Selecione o Status</option>
                              <option value="P">Pago</option>
                              <option value="N">Não Pago</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-6">
                     <label>Data da Compra</label>
                     <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="date" class="form-control" id="dt_compra" name="dt_compra" required />
                     </div>
                  </div>
               </div>
               <br />
               <div style="float:right;">
                  <button type="reset" class="btn btn-danger">Limpar</button>
                  <button type="submit" name="btn_dados" id="btn_dados" class="btn btn-success">Salvar</button>
               </div>
               <br />
            </div>
         </div>
      </div>
   </section>
</div>
<script language="javascript">   
   function moeda(a, e, r, t) {
       let n = ""
         , h = j = 0
         , u = tamanho2 = 0
         , l = ajd2 = ""
         , o = window.Event ? t.which : t.keyCode;
       if (13 == o || 8 == o)
           return !0;
       if (n = String.fromCharCode(o),
       -1 == "0123456789".indexOf(n))
           return !1;
       for (u = a.value.length,
       h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
           ;
       for (l = ""; h < u; h++)
           -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
       if (l += n,
       0 == (u = l.length) && (a.value = ""),
       1 == u && (a.value = "0" + r + "0" + l),
       2 == u && (a.value = "0" + r + l),
       u > 2) {
           for (ajd2 = "",
           j = 0,
           h = u - 3; h >= 0; h--)
               3 == j && (ajd2 += e,
               j = 0),
               ajd2 += l.charAt(h),
               j++;
           for (a.value = "",
           tamanho2 = ajd2.length,
           h = tamanho2 - 1; h >= 0; h--)
               a.value += ajd2.charAt(h);
           a.value += r + l.substr(u - 2, u)
       }
       return !1
   }
    
</script>