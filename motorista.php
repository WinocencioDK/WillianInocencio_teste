<?php include("_copy/cabecalho.php");
      include("banco/conecta.php");
      include("banco/banco-corrida.php");
 ?>

    <div class="container">
      <div class="principal">
        <h1>Motoristas</h1>
        <?php
          if(array_key_exists("adc",$_GET) && $_GET["adc"] == true) {
        ?>
            <div class="alert alert-success" role="alert">
              Um novo motorista foi adicionado!
            </div>
          <?php
            }
          ?>
          <!-- Modal de Registro -->
          <div class="modal fade" id="MotRegModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Registre um motorista</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="needs-validation" onsubmit="return TestaCPF();" action="AdceAlt/adc-mot.php" method="post"  novalidate>

                      <div class="form-row">
                        <div class="col-md-7 mb-6">
                          <label for="nmComMot">Nome Completo</label>
                          <input type="text" maxlength="50" class="form-control" id="nmComMot" name="CnmComMot" placeholder="Nome Completo" required>
                          <div class="invalid-feedback">
                            Coloque um Nome Correto.
                          </div>
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="daNscMot">Data de Nascimento</label>
                          <div class="input-group">
                            <input type="date" min="01-01-2001" max="31-12-1979" class="form-control" id="daNscMot" name="CdaNscMot" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Coloque sua data de Nascimento.
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-7 mb-3">
                          <label for="cpfMot">CPF</label>
                          <input type="text" maxlength="11" class="form-control" onkeyup="return TestaCPF();" id="cpfMot" name="CcpfMot" placeholder="CPF válido" required>
                          <div id="Some" class="invalid-feedback">
                            Coloque um CPF valido.
                          </div>
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="sxMot">Sexo</label>
                            <select class="form-control" id="sxMot" name="CsxMot" required>
                              <option value="">Escolha...</option>
                              <option value="Masculino">Masculino</option>
                              <option value="Feminino">Feminino</option>
                            </select>
                          <div class="invalid-feedback">
                            Selecione o seu sexo.
                          </div>
                        </div>
                      </div>



                    <div class="form-row">
                      <div class="col-md-10 mb-6">
                        <label for="modCar">Modelo do Carro</label>
                        <input type="text" maxlength="50" class="form-control" id="modCar" name="CmodCar" placeholder="Modelo do Carro" required>
                        <div class="invalid-feedback">
                          Coloque um Modelo Valido.
                        </div>
                      </div>
                      <div class="col-md-2 mb-3">
                        <br/><br/>
                        <input class="form-check-input" type="checkbox" id="isAtivo" name="CisAtivo"  checked>
                        <label class="form-check-label" for="inlineFormCheck">
                          Ativo
                        </label>
                      </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- FInal Modal de Registro -->

          <br/>
          <br/>
          <!-- Busca -->
          <div class="row">
            <div class="col-9">
              <input class="form-control" type="text" placeholder="Busque..." id="myBusca">
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MotRegModal">Registre um novo motorista</button>
            </div>
          </div>
          <!-- FInal Busca -->
          <!-- Tabela -->
          <br/>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nome </th>
                <th>Data de Nascimento</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>Modelo</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>

            <tbody id="myTable">
              <?php
                $motoristas = listaMotorista($conexao);
                foreach ($motoristas as $motorista) {

                  $data = date('d-m-Y',  strtotime($motorista['nasc_motorista']));
                  $idade = transIdade($data);
              ?>


              <tr>
                <td><?=$motorista['nm_motorista']?></td>
                <td><?=$data?></td>
                <td><?=$idade?></td>
                <td><?=$motorista['sx_motorista']?></td>
                <td><?=$motorista['cpf']?></td>
                <td><?=substr($motorista['md_carro'], 0, 15)?></td>
                <td><?php if($motorista['st_motorista'] == true) {
                  echo "<span class='text-primary'>Ativo</span>" ;
                }else {
                  echo "<span class='text-danger'>Inativo</span";
                }?></td>
                <td> <button type="button" data-toggle="modal" data-target="#AlteraModal" onclick="LevaMot(<?=$motorista['id_motorista'] . "," .$motorista['st_motorista']?>)" class="btn btn-sm btn-outline-secondary">Alterar status</button> </td>
              </tr>

              <?php
                }
              ?>

            </tbody>
          </table>
          <!-- Inicio do Modal de Inativo e Ativo -->

          <div class="modal fade" id="AlteraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja <span id="act0"></span>?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="AdceAlt/alt-sta.php" method="post">
                <input type="hidden" value="" id="act1" name="Cact1"/>
                <input type="hidden" value="" id="act2" name="Cact2"/>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                  <button type="submit" class="btn btn-primary">Sim</button>
                </form>
                </div>
              </div>
            </div>
          </div>


      </div>
    </div>


<?php include("_copy/rodape.php"); ?>
