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
                <h3 class="card-title">Palavras chave e soluções
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary acao" data-acao="c" data-bs-toggles="modal" data-bs-targets="#cadastrar">Adicionar nova solução</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 800px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Bot nome</th>
                      <th>Categoria</th>
                      <th>Palavras chave</th>
                      <th>Solução</th>
                      <th id="thacoes">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($tabela_questoes_solucoes)){
                          foreach ($tabela_questoes_solucoes as $row){ ?>
                      <tr>
                          <td>
                              <?php echo $row->tb_cadastro_zulip_bots_nome;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_categorias_nome;?>
                          </td>
                          <td>
                              <?php echo $row->tb_cadastro_questoes_solucoes_questao;?>
                          </td>
                          <td>
                              <?php echo $row->questao_abreviada;?>
                          </td>
                          <td>
                          <button type="button" class="btn btn-warning acao" data-acao="r" value="<?php echo $row->tb_cadastro_questoes_solucoes_id;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                              Ver
                            </button>
                            <button type="button" class="btn btn-primary acao" data-acao="u" value="<?php echo $row->tb_cadastro_questoes_solucoes_id;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi  bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                              </svg>
                              Editar
                            </button>
                            <button type="button" class="btn btn-danger acao" data-acao="d" value="<?php echo $row->tb_cadastro_questoes_solucoes_id;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            Excluir
                            </button>
                          </td>
                      </tr>
                          <?php } ?>
                      <?php  } else { ?>
                          <tr>
                              <td colspan="4">Não há questões e solucoes cadastradas!</td>
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
<div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="cadastrarLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cadastrarLabel">Cadastrar nova solução</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" name="form1" id="form1" action="./adicionar_questoes_solucoes">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Bot</label>
                <select class="form-select" name="botid" id="botid">
                  <option value="0" selected disabled>Selecione um bot...</option>
                    <?php foreach ($tabela_bots as $row){
                      echo '<option value="'.$row->tb_cadastro_zulip_bots_id.'">'.$row->tb_cadastro_zulip_bots_nome.'</option>';
                    } ?>
                </select>
                <input type="hidden" id="questaoid" name="questaoid" value="">
                <input type="hidden" id="tipoacao" name="tipoacao" value="1">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Categoria</label>
                <select class="form-select" name="categoriaid" id="categoriaid">
                  <option value="0" selected disabled>Selecione uma categoria...</option>
                    <?php foreach ($tabela_categorias as $row){
                      echo '<option value="'.$row->tb_cadastro_categorias_id.'">'.$row->tb_cadastro_categorias_nome.'</option>';
                    } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="questao">Palavras chave</label>
                <textarea class="form-control" name="questao"  id="questao" rows="7"></textarea>
              </div>
              <div class="form-group">
                <label for="resolucao">Resolução</label>
                <textarea class="form-control" name="resolucao"  id="resolucao" rows="7"></textarea>
              </div>
            </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary btnacaoexecutar" data-acao="c" id="btnc">Cadastrar</button>
          <button type="submit" class="btn btn-primary btnacaoexecutar" data-acao="u" id="btnu">Alterar</button>
          <button type="submit" class="btn btn-danger btnacaoexecutar" data-acao="d" id="btnd">Excluir</button>
        </div>
      </div>
  </div>
</div>

<div id="mensagens"></div>

<script>
$(document).on('click','.acao',function(e) {
  $('#cadastrar').modal('show');
  var acao = $(this).data('acao');
  $('#tipoacao').val(acao);
  if(acao != 'c'){
    $.ajax({
      data: {'valor':this.value},
      type: "post",
      dataType: 'JSON',
      url: "./preencher_questoes_solucoes_ajax",
      success: function(response){
        console.log("Ação " + acao + response[0].solucao);
        preencher_formulario(response, acao);
      },
      timeout: 15000,
      error: function(){
        alert('Erro contacte o administrador');
      }, 
    });
  }else{
    //console.log("Ação "+$(this).data('acao'));
    preencher_formulario(null, $(this).data('acao'));
  }
});

function preencher_formulario(response, acao){
  // carregar os selects primeiro
    if(acao == 'r' || acao == 'd'){
      $("#botid").attr('disabled', true);
      $("#categoriaid").attr('disabled', true);
      $("#questao").val("teste").attr('disabled', true);
      $("#resolucao").val("teste").attr('disabled', true);
      if(acao == 'r') $("#cadastrarLabel").text("Visuliza de solução");
      else $("#cadastrarLabel").text("Excluir solução?");
    }else if(acao == 'u'){
      $("#botid").attr('disabled', false);
      $("#categoriaid").attr('disabled', false);
      $("#questao").attr('disabled', false);
      $("#resolucao").attr('disabled', false);
      $("#cadastrarLabel").text("Editar solução");
    }else{
      $("#botid").attr('disabled', false);
      $("#categoriaid").attr('disabled', false);
      $("#questao").attr('disabled', false);
      $("#resolucao").attr('disabled', false);
      $("#cadastrarLabel").text("Cadastrar nova solução");
    }
    if(acao != 'c'){
      $("#botid").val(response[0].id_bot);
      $("#categoriaid").val(response[0].id_categoria);
      $("#questao").val(response[0].questao);
      $("#resolucao").val(response[0].solucao);
      $("#questaoid").val(response[0].id_questao);
    }else{
      $("#questaoid").val("");
      $("#botid").val("0");
      $("#categoriaid").val("0");
      $("#questao").val("");
      $("#resolucao").val("");
    }
    $("#cadastrar .btnacaoexecutar").attr('type', 'submit').attr('hidden', true);
    $("#btn"+acao).attr('type', 'submit').attr('hidden', false);
}


$(document).on('click','.btnacaoexecutar',function(e) {
  //$("#user_form").serialize();
  //$('#cadastrar').modal('show');
  var acao = $(this).data('acao');
  //console.log('Foi');
  //$("#form1").serialize();
  
$.ajax({
  data: {'questaoid':$("#questaoid").val(),'botid':$("#botid").val(), 'categoriaid':$("#categoriaid").val(),'questao':$("#questao").val(),'resolucao':$("#resolucao").val(),'tipoacao':$("#tipoacao").val()},
  type: "post",
  dataType: 'JSON',
  url: "./questoes_solucoes_crud",
  success: function(response){
    console.log(response);
    //alert(response.solucao);
    document.location.reload(true);
  },
  timeout: 15000,
  error: function(){
    alert('Não é Json');
  }, 
});
  
  $('#cadastrar').modal('hide');
});

</script>



