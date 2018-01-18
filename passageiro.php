<?php include("_copy/cabecalho.php");
      include("conecta.php");
      include("banco-corrida.php");
 ?>

    <div class="container">
      <div class="principal">
        <h1>Passageiros</h1>
        <?php
          if(array_key_exists("adc",$_GET) && $_GET["adc"] == true) {
        ?>
            <div class="alert alert-success" role="alert">
              Um novo passageiro foi adicionado!
            </div>
        <?php
          }
        ?>

          <!-- Modal de Registro -->
          <div class="modal fade" id="PasRegModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Registre um passageiro</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="needs-validation" onsubmit="return TestaCPF();" action="adc-pas.php" method="post"  novalidate>

                      <div class="form-row">
                        <div class="col-md-7 mb-6">
                          <label for="nmComPas">Nome Completo</label>
                          <input type="text" maxlength="50" class="form-control" id="nmComPas" name="CnmComPas" placeholder="Nome Completo" required>
                          <div class="invalid-feedback">
                            Coloque um Nome Correto.
                          </div>
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="daNscPas">Data de Nascimento</label>
                          <div class="input-group">
                            <input type="date" min="01-01-2001" max="31-12-1979" class="form-control" id="daNscPas" name="CdaNscPas" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                              Coloque sua data de Nascimento.
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-7 mb-3">
                          <label for="cpfMot">CPF</label>
                          <input type="number" maxlength="9" class="form-control" onkeyup="return TestaCPF();" id="cpfMot" name="CcpfPas" placeholder="CPF válido" required>
                          <div id="Some" class="invalid-feedback">
                            Coloque um CPF valido.
                          </div>
                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="sxPas">Sexo</label>
                            <select class="form-control" id="sxPas" name="CsxPas" required>
                              <option value="">Escolha...</option>
                              <option value="Masculino">Masculino</option>
                              <option value="Feminino">Feminino</option>
                            </select>
                          <div class="invalid-feedback">
                            Selecione o seu sexo.
                          </div>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PasRegModal">Registre um novo passageiro</button>
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
              </tr>
            </thead>

            <tbody id="myTable">
              <?php
                $passageiros = listaPassageiro($conexao);
                foreach ($passageiros as $passageiro) {

                  $data = date('d-m-Y',  strtotime($passageiro['nasc_passageiro']));
                  $idade = transIdade($data);
              ?>
              <tr>
                <td><?=$passageiro['nm_passageiro']?></td>
                <td><?=$data?></td>
                <td><?=$idade?></td>
                <td><?=$passageiro['sx_passageiro']?></td>
                <td><?=$passageiro['cpf']?></td>
              </tr>

            <?php
              }
            ?>

            </tbody>
          </table>



      </div>
    </div>


<?php include("_copy/rodape.php"); ?>
