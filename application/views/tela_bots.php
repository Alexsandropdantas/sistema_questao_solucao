<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bots cadastrados
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary acao" data-bs-toggles="modal" data-bs-targets="#cadastrar">Adicionar nova solução</button>
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
                      <th>Chave API</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($tabela_bots)){
                          foreach ($tabela_bots as $row){ ?>
                      <tr>
                          <td>
                              <?php echo $row->tb_cadastro_zulip_bots_id;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_zulip_bots_nome;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_usuarios_nome;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_zulip_bots_apikey;?>
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
<div class="modal fade" id="cadastrarbots" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo bot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Nome</span>
          <input type="text" id="nomebot" name="nomebot" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Chave API</span>
          <input type="text" id="chaveapi" name="chaveapi" class="form-control">
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
  $(document).on('click','.acao',function(e) {
    $('#cadastrarbots').modal('show');
  });

  $(document).on('click','#cadastrar',function(e) {
    $.ajax({
      data: {'nomebot':$("#nomebot").val(),'chaveapi':$("#chaveapi").val()},
      type: "post",
      dataType: 'JSON',
      url: "./adicionar_bot",
      success: function(response){
        //console.log(response);
        //alert(response.resposta);
        document.location.reload(true);
      },
      timeout: 15000,
      error: function(){
        alert('Não é Json');
      }, 
    });
    $('#cadastrarbots').modal('hide');
  });
</script>



