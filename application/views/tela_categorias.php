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
                <h3 class="card-title">Categoria
                  <!-- Button trigger modal -->
                  <button type="button" id="btncadastrarnovocategoria" class="btn btn-primary" data-bs-toggle="modal">Adicionar nova categoria</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Ordem</th>
                      <th>Nome</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($tabela_categorias)){
                          foreach ($tabela_categorias as $row){ ?>
                      <tr>
                          <td>
                              <?php echo $row->tb_cadastro_categorias_id;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_categorias_nome;?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary btneditar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi  bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                              </svg>
                              Editar
                            </button>
                          </td>
                      </tr>
                          <?php } ?>
                      <?php  } else { ?>
                          <tr>
                              <td colspan="3">Você ainda não possui categorias cadastradas...</td>
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
<div class="modal fade" id="modalcadastrarcategoria" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcadastrarcategoriaLabel">Cadastrar nova categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="nomelabel">Nome da nova categoria</span>
          <input type="text" id="input_nome" name="input_nome" class="form-control">
        </div>
      <div class="modal-footer">
        <button type="button" id="fechar" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="cadastrar" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div> <!-- ./Modal -->

<script>

  $(document).on('click','#btncadastrarnovocategoria',function(e) {
    $('#modalcadastrarcategoria').modal('show');
  });

  $(".btneditar").mousedown(function() {
    alert("Recurso em Desenvolvimento!");
  });

  $(document).on('click','#cadastrar',function(e) {
    $.ajax({
      data: {'nomedacategoria':$("#input_nome").val()},
      type: "post",
      dataType: 'JSON',
      url: "./adicionar_categoria",
      success: function(response){
        //console.log(response);
        document.location.reload(true);
      },
      timeout: 15000,
      error: function(){
        document.location.reload(true);
      }, 
    });
    $('#modalcadastrarcategoria').modal('hide');
  });

</script>



