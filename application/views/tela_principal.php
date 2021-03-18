<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div>
            <h2>Levantamento de tempo real</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tags mais marcadas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Workspace</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 15%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">15%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Maven</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 18%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">18%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Parametro.propersties</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 22%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">22%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Inicializar aplicação</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 45%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">45%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Temas mais perguntados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Configurar workspace</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 12%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">12%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Dependências no Maven</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 15%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">15%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Aplicação não sobe</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 20%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">20%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Karol com K</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 57%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">57%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
<br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top respostas mais apontadas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Bot</th>
                      <th>Date</th>
                      <th>Solução</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>bot_GSDS</td>
                      <td>10/03/2021</td>
                      <td>Karol com K.</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>bot_GSDS</td>
                      <td>10/03/2021</td>
                      <td>Configurar parametro.properties.</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>bot_GSDS</td>
                      <td>10/03/2021</td>
                      <td>Atualizar pom.xml na versão do framework.</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>bot_GSDS</td>
                      <td>10/03/2021</td>
                      <td>Desativar SCA.</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>bot_GSDS</td>
                      <td>10/03/2021</td>
                      <td>Criar datasource.</td>
                    </tr>
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


