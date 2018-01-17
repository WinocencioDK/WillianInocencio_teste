<?php include("_copy/cabecalho.php"); ?>

    <div class="container">
      <div class="principal">
        <h1>Motoristas</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MotRegModal">
            Registre um novo motorista
          </button>

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
                    <form id="needs-validation" onsubmit="return TestaCPF();" action="adc-mot.php" method="post"  novalidate>

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
                          <input type="number" maxlength="9" class="form-control" onkeyup="return TestaCPF();" id="cpfMot" name="CcpfMot" placeholder="CPF válido" required>
                          <div class="invalid-feedback">
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



      </div>
    </div>


<?php include("_copy/rodape.php"); ?>
