<?php

if (!isset($_SESSION['FERRAM_URL_APP'])){
  session_start();
}
  // Chamo todas as dependências relacionadas a página
  require_once ('../app/session.php');  
  require_once ('../app/scripts.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Casa_Controller.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Pessoa_Controller.php');
  require_once ($_SESSION['REGISTRO_URL_CONTROLLERS'].'Registro_Controller.php');

  // Função de verifica os valores setados na sessão dos filtros do datatable
  if(isset($_REQUEST['filter'])){

    $_GET['data_inicial'] == '' ? $data_inicial = date("Y-m-d") : $data_inicial = $_GET['data_inicial'];
    $_GET['data_final'] == '' ? $data_final = date("Y-m-d") : $data_final = $_GET['data_final'];
    
    if(isset($_REQUEST['id_casa'])){
      $_GET['id_casa'] == '' ? $id_casa = $_SESSION['id_casa'] : $id_casa = $_GET['id_casa'];
    } else {
      $id_casa = $_SESSION['id_casa'];
    }
  } else {
    $data_inicial = date("Y-m-d");
    $data_final = date("Y-m-d");
    $id_casa = $_SESSION['id_casa'];
  }

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
    <title><?php getAppName(); echo " | Registros"; ?></title>
    <style>
      .limpar {
        margin-top: 18px;
      }

      .filtrar {
        margin-top: 17px;
      }

      @media only screen and (max-width: 1000px) {
        .limpar {
          margin-top: -4px;
        }

        .filtrar {
          margin-top: -4px;
          margin-right: 0px;
        }

        .novo {
          margin-top: 55px;
          margin-bottom: 45px;
        }

        .botao {
          float: right;
        }
      }
  </style>
  </head>
  <body>
    <!-- Chamo a navbar -->
    <?php 
      require_once ('../includes/navbar/navbar.php');
    ?>

    <div class="container" style="margin-top: 60px;">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            <?php
              if($_SESSION['is_admin'] == 1){
                echo 'Registros';
              } else {
                echo 'Casa de Oração: ' . $_SESSION['casa_oracao'];
              }
            ?>
          </h3>
        </div><!-- /panel heading -->
        <div class="panel-body">
          <h5 style="margin-left: 15px;" class="panel-title">Filtros</h5>
          <form method="GET" id="filtro" action="index.php" enctype="multipart/form-data">
            <div class="form-row">
              <!-- Chamo os filros para o datatable mediante as permissões do usuário -->
              <?php 
                require_once ($_SESSION['REGISTRO_URL_INCLUDES'].'/menus/filtros.php')
              ?>
            </div>
          </form>
          <div class="col-md-12 novo">
            <a style="float: right;" class="rounded js-scroll-trigger botao" href="cadastro.php"><button type="button" class="btn btn-warning">Cadastrar</button></a></li>       
            <button style="float: right; margin-right:2px" type="button" class="btn btn-primary botao" data-toggle="modal" data-target="#cadRegistro">Novo</button>
          </div>
          <div class="col-md-12 table-responsive" style="margin-top: 10px;">
            <table id="tableRegistros" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Temperatura</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  echo RegistrosController::showTableRegistros($id_casa, $data_inicial, $data_final);
                ?>
              </tbody>   
            </table>
          </div>
        </div><!-- /panel body -->
      </div><!-- /panel -->
    </div><!-- /container -->

    <?php
      // Chamo as dependências de JavaScript da página
      getJsCommonFiles();
      getJsDataTables();
      //Chamo os modais responsáveis por cadastrar e editar os registros
      require_once ($_SESSION['REGISTRO_URL_MODALS'].'cadRegistro.php');
      require_once ($_SESSION['REGISTRO_URL_MODALS'].'editRegistro.php');
    ?>
    
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $('#editRegistro').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        var recipient = button.data('whatever')
        var recipienttemperatura = button.data('whatevertemperatura')
        var recipientid_movimento = button.data('whateverid_movimento')
        
       // $('#id_localidade option[value="' + recipientid_localidade + '"]').prop('selected', true);

        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id_pessoa_edit').val(recipient)
        modal.find('#temperatura_edit').val(recipienttemperatura)
        modal.find('#id_movimento_edit').val(recipientid_movimento)
        })

      // Função do datatable
      $(document).ready(function() {
          var table = $('#tableRegistros').DataTable( {
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
              .appendTo( '#tableRegistros_wrapper .col-md-6:eq(0)' );
      } );
      
      // Função de deletar registro via ajax
      function delRegistro(id){
        $.ajax({
            method:'POST',
            url:'<?php echo $_SESSION['REGISTRO_URL_LOCATION_CONTROLLERS'].'/'.'Registro_Controller.php?' ?>',
            dataType: 'text',
            data: {id_movimento: id, funcao: 'delRegistro'}
        })
        .done(function(retorno) {
            retorno = jQuery.parseJSON(String(retorno));
            if (retorno.sucesso == true){
                $('tr[linha-movimento="' + id +'"]').fadeOut();
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