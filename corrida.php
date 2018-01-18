<?php include("_copy/cabecalho.php");
      include("conecta.php");
      include("banco-corrida.php"); ?>

    <div class="container">
      <div class="principal">
        <h1>Corridas</h1>

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
                <form id="needs-validation" onsubmit="return TestaCPF();" action="adc-cor.php" method="post"  novalidate>

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
                        <input type="text" class="form-control" id="VaCor" name="CVaCor" placeholder="00,00">
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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CorRegModal">Registre um nova corrida</button>

          <table class="table-bordered table-hover">
            <thead>
              <tr>
                <th colspan="4">Motorista</th>
                <th colspan="4">Passageiro</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4">Nome do motorista</td>
                <td colspan="4">Nome do Passageiro</td>

              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="8">R$00.00</td>
              </tr>
            </tfoot>
        </table>


      </div>
    </div>


<?php include("_copy/rodape.php"); ?>
