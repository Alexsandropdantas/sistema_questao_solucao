<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sistema para base de conhecimento dos bots">
  <meta name="author" content="GSDS">
  <link rel="shortcut icon" href="<?php echo base_url('assets/icons/bot.ico'); ?>" />
  <title>Sistema para base de conhecimento dos bots</title>

  <!-- Bootstrap 5 css -->
  <link href="<?php echo base_url('assets/bootstrap-5.0.0-beta2/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- CSS customizado -->
  <link href="<?php echo base_url('assets/style_customizado_sistema_questao_solucao.css'); ?>" rel="stylesheet">

  <!-- Carregar c3.css para gráficos opensource -->
  <link href="<?php echo base_url('assets/c3-0.7.20/c3.css'); ?>" rel="stylesheet">

  <!-- Carregar d3.js e c3.js para gráficos opensource -->
  <script src="<?php echo base_url('assets/d3-v5/d3.min.js'); ?>" charset="utf-8"></script>
  <script src="<?php echo base_url('assets/c3-0.7.20/c3.min.js'); ?>" charset="utf-8"></script>

  <!-- JQuery 3.6.0 e Ajax 3.5.1 -->
  <script src="<?php echo base_url('assets/jquery/js/jquery-3.6.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/jquery/js/jquery.ajax-3.5.1.min.js'); ?>"></script>

  <!-- Bootstrap 5 js -->
  <script src="<?php echo base_url('assets/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.min.js'); ?>"></script>

</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url('controlador_principal'); ?>">GSDS</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('controlador_principal/bots'); ?>">Bots</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('controlador_principal/relatorios'); ?>">Relatórios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('controlador_principal/usuario'); ?>">Usuário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('controlador_principal/categorias'); ?>">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo site_url('controlador_principal/questoes_solucoes'); ?>">Cadastro de Soluções</a>
          </li>
        <form class="d-flex" method="post" id="formbuscar" action="<?php echo site_url('controlador_principal/buscar_questao'); ?>">
          <input class="form-control me-2" id="input_busca" name="input_busca" type="search" placeholder="buscar...">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        </ul>
        <form class="d-flex" action="login/logout">
          <button class="btn btn-outline-success" type="submit">Sair</button>
        </form>
      </div>
    </div>
  </nav>


