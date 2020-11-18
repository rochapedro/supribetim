
<div class="modal fade" id="cadRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="titulo_modal_cadastrar"></h4>
      </div>
      <div class="modal-body">
        <form method="POST" style="margin-bottom: 10rem;" id="cadastrarRegistro" action="<?php echo $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'].'/'.'Registro_Controller.php?funcao=cadastrarRegistro' ?>" enctype="multipart/form-data">
          <div class="form-row" >
            <div class="form-group col-md-9">
              <label for="validationCustom05">Nome</label>
                <select class="selectpicker form-control" style="border-color:brown" data-show-subtext="true" data-live-search="true" name="id_pessoa" id="id_pessoa">
                  <option value="">Selecione um nome</option>
                    <?php
                      echo PessoasController::getOptionsPessoas();
                    ?>
                </select>
            </div>
              <div class="form-group col-md-3">
                <label for="inputAddress">Temperatura</label>
                <input type="text" class="form-control" name="temperatura" id="temperatura">
              </div>
              <!-- Input que fornece o id da casa de oração do usuário que está fazendo cadastro, dessa maneira, os registros são efetuados apenas nas casa de oração correspondente ao usuário. -->
              <input type="hidden" value="<?php echo $_SESSION['id_casa']; ?>" name="id_casa">
              <input type="hidden" value="<?php echo $_SESSION['id_usuario']; ?>" name="id_usuario">
          </div>
          <div class="form-group col-md-12">
            <button style="float: right; margin-left: 8px;" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button style="float: right;" type="submit" class="btn btn-primary" onclick="return validarRegistro()">Cadastrar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>