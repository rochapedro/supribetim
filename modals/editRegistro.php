
<div class="modal fade" id="editRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar Registro de Temperatura</h4>
      </div>
      <div class="modal-body">
        <form method="POST" style="padding-bottom: 10rem;" id="editarRegistro" action="<?php echo $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'].'/'.'Registro_Controller.php?funcao=editarRegistros' ?>" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-9">
              <label for="validationCustom05">Nome</label>
              <input type="hidden" class="form-control" name="id_movimento_edit" id="id_movimento_edit">
                <select class="selectpicker form-control" style="border-color:brown" data-live-search="true" name="id_pessoa_edit" id="id_pessoa_edit">
                  <option value="">Selecione um nome</option>
                    <?php
                      echo PessoasController::getOptionsPessoas();
                    ?>
                </select>
            </div>
              <div class="form-group col-md-3">
                <label for="inputAddress">Temperatura</label>
                <input type="text" class="form-control" name="temperatura_edit" id="temperatura_edit">
              </div>
          </div>
          <div class="form-group col-md-12">
            <button style="float: right; margin-left: 8px;" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button style="float: right;" type="submit" class="btn btn-primary" onclick="return validarRegistro_edit()">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>