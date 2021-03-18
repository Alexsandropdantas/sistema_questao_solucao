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
		<title>Signin Template · Bootstrap v5.0</title>
		
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	html,
	body {
	height: 100%;
	}

	body {
	display: flex;
	align-items: center;
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
	}

	.form-signin {
	width: 100%;
	max-width: 330px;
	padding: 15px;
	margin: auto;
	}
	.form-signin .checkbox {
	font-weight: 400;
	}
	.form-signin .form-control {
	position: relative;
	box-sizing: border-box;
	height: auto;
	padding: 10px;
	font-size: 16px;
	}
	.form-signin .form-control:focus {
	z-index: 2;
	}
	.form-signin input[type="email"] {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	margin-bottom: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	}

    </style>
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
