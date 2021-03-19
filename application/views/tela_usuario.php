<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuários
                  <!-- Button trigger modal -->
                  <button type="button" id="btncadastrarnovousuario" class="btn btn-primary" data-bs-toggle="modal">Adicionar novo usuário</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Ordem</th>
                      <th>Nome</th>
                      <th>Usuário de cadastro</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($tabela_usuarios)){
                          foreach ($tabela_usuarios as $row){ ?>
                      <tr>
                          <td>
                              <?php echo $row->tb_cadastro_usuarios_id;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_usuarios_nome;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_usuarios_login;?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary btnresetarsenha">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
							<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
							<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
							</svg>
                              Resetar senha
                            </button>
                          </td>
                      </tr>
                          <?php } ?>
                      <?php  } else { ?>
                          <tr>
                              <td colspan="4">Você ainda não possui nenhum locatário cadastrado...</td>
                          </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->




<!-- Modal -->
<div class="modal fade" id="modalcadastrarusuario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcadastrarusuarioLabel">Cadastrar novo usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="nomelabel">Nome</span>
          <input type="text" id="input_nome" name="input_nome" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="loginlabel">Login</span>
          <input type="text" id="input_login" name="input_login" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="senhalabel">Senha</span>
          <input type="password" id="input_senha" name="input_senha" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="fechar" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="cadastrar" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div> <!-- ./Modal -->

<script>



$(document).on('click','#btncadastrarnovousuario',function(e) {
  $('#modalcadastrarusuario').modal('show');
});

$(".btnresetarsenha").mousedown(function() {
  alert("Recurso em Desenvolvimento!");
});

$(document).on('click','#cadastrar',function(e) {
  $.ajax({
    data: {'nome':$("#input_nome").val(),'login':$("#input_login").val(),'senha':$("#input_senha").val()},
    type: "post",
    dataType: 'JSON',
    url: "./adicionar_usuario",
    success: function(response){
      //console.log(response);
      //alert(response.resposta);
      document.location.reload(true);
    },
    timeout: 15000,
    error: function(){
      document.location.reload(true);
      //alert('Não é Json');
    }, 
  });
  $('#modalcadastrarusuario').modal('hide');
});

</script>



