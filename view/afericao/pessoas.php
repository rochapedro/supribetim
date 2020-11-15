<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}

  // Chamo as dependências da página
  require_once ($_SESSION['REGISTRO_URL_APP'].'/session.php');  
  require_once ($_SESSION['REGISTRO_URL_APP'].'/scripts.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Casa_Controller.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Pessoa_Controller.php'); 

?>

<!doctype html>
<html lang="en">
  <head>
    <?php
      getMeta();
      getIcon();
      // Chamo as dependências de CSS da página
      getCSSCommonFiles();
      getCSSDataTables();
    ?>

    <title><?php getAppName(); echo " | Pessoas"; ?></title>
    <style>
      .novo {
        margin-bottom: 10px;
      }

      table.dataTable td {
        word-break: break-word;
      }

    @media only screen and (max-width: 1000px) {
      .novo {
        margin-bottom: 0px;
      }
    }
    </style>
  </head>
  <body>
    
    <?php 
      require_once ($_SESSION['REGISTRO_URL_INCLUDES'].'/navbar/navbar.php');
    ?>

    <div class="container" style="margin-top: 60px;">
      <div class="panel panel-primary" style="margin-bottom: 20px;">
        <div class="panel-body">
          <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pessoas</h2>
          <div class="col-md-12 novo">      
            <a href="cadastro.php"><button style="float: right; margin-right:3px" type="button" class="btn btn-primary">Novo</button></a>
          </div>
          <div class="col-md-12 table-responsive">
            <table id="tablePessoas" cellspacing="0" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
              <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Comum</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  echo PessoasController::showTablePessoas();
                ?>
              </tbody>   
            </table>
          </div>
        </div><!-- /card-body -->
      </div><!-- /card -->
    </div><!--  /container -->

    <?php
      // Chamo o modal responsável por editar as pessoas
      require_once($_SESSION['REGISTRO_URL_MODALS'].'editPessoa.php');
      getJsCommonFiles();
      getJsDataTables();
    ?>

    <!-- Importando o js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
      //Funçao pra validar os formulários
      function validar(){
				var nome_edit = editrarPessoa.nome_edit.value;
				var id_casa_edit = editrarPessoa.id_casa_edit.value;
				
				if(nome_edit == ""){
					alert('Preencha o campo nome.');
					editrarPessoa.nome_edit.focus();
					return false;
				}
				
				if(id_casa_edit == ""){
					alert('Preencha o campo comum.');
					editrarPessoa.id_casa_edit.focus();
					return false;
				}
			}

      $('#editPessoas').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        var recipient = button.data('whatever')
        var recipientnome = button.data('whatevernome')
        var recipienttelefone = button.data('whatevertelefone')
        var recipientrua = button.data('whateverrua')
        var recipientnumero = button.data('whatevernumero')
        var recipientbairro = button.data('whateverbairro')
        var recipientcidade = button.data('whatevercidade')
        var recipientid_casa = button.data('whateverid_casa')
        var recipientid_usuario = button.data('whateverid_usuario')
        
       // $('#id_localidade option[value="' + recipientid_localidade + '"]').prop('selected', true);

        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id_pessoa_edit').val(recipient)
        modal.find('#nome_edit').val(recipientnome)
        modal.find('#telefone_edit').val(recipienttelefone)
        modal.find('#rua_edit').val(recipientrua)
        modal.find('#numero_edit').val(recipientnumero)
        modal.find('#bairro_edit').val(recipientbairro)
        modal.find('#cidade_edit').val(recipientcidade)
        modal.find('#id_casa_edit').val(recipientid_casa)
        modal.find('#id_usuario_edit').val(recipientid_usuario)
        })

      // Função do datatable
      $(document).ready(function() {
          var table = $('#tablePessoas').DataTable( {
              lengthChange: false,
              buttons: [ 'excel', 'pdf' ],
              "language": {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "Nenhum registro foi encontrado",
                "info": "<b>Total de _TOTAL_ registros</b>",
                "infoEmpty": "",
                "infoFiltered": "<i>(filtrado de um total de _MAX_ registros)</i>",
                "loadingRecords": "Carregando...",
                "processing":     "Buscando...",
                "search":         "",
                "searchPlaceholder": "Buscar",
                "paginate": {
                  "first":      'Primeira',
                  "last":       "Última",
                  "next":       "Próxima",
                  "previous":   "Anterior"
                }
              }
          } );
      
          table.buttons().container()
              .appendTo( '#tablePessoas .col-md-6:eq(0)' );
      } );

      // Função de deletar pessoas via ajax
      function delPessoa(id){
        $.ajax({
            method:'POST',
            url:'<?php echo $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'].'/'.'Pessoa_Controller.php?' ?>',
            dataType: 'text',
            data: {id_pessoa: id, funcao: 'delPessoa'}
        })
        .done(function(retorno) {
            retorno = jQuery.parseJSON(String(retorno));
            if (retorno.sucesso == true){
                $('tr[linha-pessoa="' + id +'"]').fadeOut();
            }else{
                
            }
        });
      }

      // Função de selecionar o menú da navbar quando estiver na página
      $(function(){
          $('a').each(function(){
              if ($(this).prop('href') == window.location.href) {
                  $(this).addClass('active'); $(this).parents('li').addClass('active');
              }
          });
      });

    </script>

  
  </body>
</html>