<?php include("_copy/cabecalho.php");
      include("banco/conecta.php");
      include("banco/banco-corrida.php"); ?>

    <div class="container">
      <div class="principal">
        <h1>Corridas</h1>
        <?php
          if(array_key_exists("adc",$_GET) && $_GET["adc"] == true) {
        ?>
            <div class="alert alert-success" role="alert">
              Nova corrida adicionada!
            </div>
        <?php
          }
        ?>

        <!-- Modal de Registro -->
        <div class="modal fade" id="CorRegModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Registre uma corrida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="needs-validation"  action="AdceAlt/adc-corr.php" method="post"  novalidate>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="MotCor">Motorista</label>
                        <select class="form-control" id="MotCor" name="CMotCor" required>
                          <option value="">Escolha...</option>

                          <?php
                            $motoristas = listaNmsMot($conexao);
                            foreach ($motoristas as $motorista) {
                          ?>
                          <option value="<?=$motorista['id_motorista']?>"><?=$motorista['nm_motorista']?> </option>

                          <?php
                            }
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          Selecione um motorista.
                        </div>
                    </div>

                    <div class="col-md-6">
                      <label for="PasCor">Passageiro</label>
                      <select class="form-control" id="PasCor" name="CPasCor" required>
                        <option value="">Escolha...</option>

                        <?php
                          $passageiros = listaNmsPas($conexao);
                          foreach ($passageiros as $passageiro) {
                        ?>
                        <option value="<?=$passageiro['id_passageiro']?>"><?=$passageiro['nm_passageiro']?></option>
                        <?php
                          }
                        ?>

                      </select>
                      <div class="invalid-feedback">
                        Selecione um passageiro.
                      </div>
                    </div>

                    </div>
                      <label for="VaCor">  Valor da Corrida</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">R$</div>
                        </div>
                        <input type="number" class="form-control" id="VaCor" step=".01" name="CVaCor" placeholder="00,00" required>
                        <div class="invalid-feedback">
                          Coloque um valor.
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CorRegModal">Registre um nova corrida</button>
          </div>
        </div>
        <!-- FInal Busca -->


        <br/>

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Id da Corrida</th>
              <th>Nome do Motorista</th>
              <th>Nome do Passageiro</th>
              <th>Valor da Corrida</th>
            </tr>
          </thead>

          <tbody id="myTable">
            <?php
              $corridas =  listaCorrida($conexao);
              foreach ($corridas as $corrida) {

            ?>
            <tr>
              <td><?=$corrida['id']?></td>
              <td><?=$corrida['nm_motorista']?></td>
              <td><?=$corrida['nm_passageiro']?></td>
              <td>R$<?=$corrida['valor_corr']?></td>
            </tr>

          <?php
            }
          ?>

          </tbody>
        </table>


      </div>
    </div>


<?php include("_copy/rodape.php"); ?>
