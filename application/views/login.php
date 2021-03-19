<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	
<!doctype html>
<html lang="pt_br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.80.0">
		<title>Sistema para base de conhecimento dos bots</title>
		
		<!-- Bootstrap 5 css -->
		<link href="<?php echo base_url('assets/bootstrap-5.0.0-beta2/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

		<!-- CSS customizado tela Login-->
		<link href="<?php echo base_url('assets/style_customizado_sistema_questao_solucao_login.css'); ?>" rel="stylesheet">
  </head>
  <body class="center">
  		<main class="form-signin">
			<form method="post" role="form" action="login">
				<!-- 
					<img class="mb-4" src="<?php echo base_url("assets/imagens/logo.svg"); ?>" alt="" width="72" height="57">
				-->
				<h1 class="h3 mb-3 fw-normal">Sistema de Bots</h1>
				<input type="text" id="login" name="login"  id="login" class="form-control" placeholder="Digite o Login" required autofocus>
				<input type="password" id="password" name="password" class="form-control" placeholder="Digite a Senha" required>
				<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Lembrar da senha
				</label>
				</div>
				<button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
				<p class="mt-5 mb-3 text-muted">&copy; GSDS 2021</p>
			</form>
		</main>
		<br>
	</body>
</html>
