<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}
  // Chamo todas as dependências relacionadas a página
  require_once ($_SESSION['REGISTRO_URL_APP'].'/session.php');  
  require_once ($_SESSION['REGISTRO_URL_APP'].'/scripts.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Casa_Controller.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <?php
      getMeta();
      getIcon();
      // Chamo as dependências de CSS da página
      getCSSCommonFiles();
      getCSSSelectpiker();
    ?>
    <title><?php getAppName(); echo " | Cadastro"; ?></title>
  </head>
  <body>
    <!-- Chamo a navbar -->
    <?php 
      require_once ($_SESSION['REGISTRO_URL_INCLUDES'].'/navbar/navbar.php');
    ?>

    <div class="container" style="margin-top: 60px;">
      <div class="panel panel-primary">
        <div class="panel-body">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cadastro</h2>
            <form style="margin-top: 30px;" method="POST" id="cadastrar" action="<?php echo $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'].'/'.'Pessoa_Controller.php?funcao=cadastrarPessoa' ?>" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="validationNome">Nome</label>
                    <input type="hidden" name="id_usuario" id="inputWarning1" value="<?php echo $_SESSION['id_usuario']; ?>" class="form-control">
                    <input type="text" name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="validationTelefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="telefone form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="validationRua">Rua</label>
                    <input type="text" name="rua" id="rua" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="validaNúmero">Número</label>
                    <input type="text" name="numero" id="numero" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="validationBairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="validationCidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="validationComum">Comum</label>
                    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="id_casa" id="validationCustom07">
                    <option value="">Selecione uma comum</option>
                        <?php
                            echo CasasController::getOptionsCasas();
                        ?>
                    </select>
                </div>
              </div><!-- /form row -->
              <div class="col-md-12">
                <button style="float:right;" type="submit" onclick="return validar()" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
        </div><!-- /panel body -->
      </div><!-- /panel -->
    </div><!-- /container -->

    <?php
      // Chamo as dependências de JavaScript da dágina
      getJsCommonFiles();
      getJsDataTables();
      getJqueryMask();
      getJsSelectpiker();
    ?>

    <script type="text/javascript">
    //Funçao pra validar os formulários
      function validar(){
				var nome = cadastrar.nome.value;
				var id_casa = cadastrar.id_casa.value;
				
				if(nome == ""){
					alert('Preencha o campo nome.');
					cadastrar.nome.focus();
					return false;
				}
				
				if(id_casa == ""){
					alert('Preencha o campo comum.');
					cadastrar.id_casa.focus();
					return false;
				}
			}

      // Máscara de telefone do Jquery
      $('.telefone').mask('(00) 0000-00009');
      $('.telefone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('.telefone').mask('(00) 00000-0009');
        } else {
            $('.telefone').mask('(00) 0000-00009');
        }
      });

      // Função de selecionar o menú da navbar quando estiver na página
      $(function(){
          $('a').each(function(){
              if ($(this).prop('href') == window.location.href) {
                  $(this).addClass('active'); $(this).parents('li').addClass('active');
              }
          });
      });

      function limpar() {
        if(document.getElementById('nome').value!="") {
        document.getElementById('nome').value="";
        }
        }
    </script>
  
  </body>
</html>