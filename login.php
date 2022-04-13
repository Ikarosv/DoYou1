<?php
require_once "db/verificar_login.php";

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="sie-edge" />
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	
    <link rel="stylesheet" href="assets/css/style_login.css">
	<link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Login</title>
	
</head>
<body>

	<div class="container">
		<div class="forms-container">
			<div class="cadastro-usuario">
			
			<form method="POST" class="cadastro-form">
            	<?php 
                    if (isset($_REQUEST['erro'])) {
                        if($_REQUEST['erro']=='l1'){
                            echo '<center><div class="alert alert-danger">Email ou senha incorretos.</div></center>';
                        
                        }
                    }
                ?>
         
			<div class="mt-5 mx-auto text-center">
				<a href="index.php" style="text-decoration: none">
				<span class="d-inline-flex align-bottom"><img src="assets/img/favicon.ico"></span>
				<span class="d-inline-flex px-2"><h4 class="DoYou" style="color: #444; float:right; padding: 10px 5px;">DoYou</h4></span>
            	</a>
       		</div>
			<h2 class="title">Login</h2>
		
			<div class="input-field">
				<i class="bi bi-envelope-fill"></i>
			<input type="email" name="email" placeholder="Email" />
			</div>
			<div class="input-field">
				<i class="bi bi-lock-fill"></i>
			<input type="password" name="senha" placeholder="Senha" />
			</div>
			<input class="btn mb-10" type="submit" name="logar" value="Entrar"/>

			<div class="links">
        	<p class="text-center mb-1">Ainda não possui conta? <a class="txt-brand" href="cadastro.php">Faça seu cadastro</a></p>
    		</div>
		</form>
		</div>
		<div class="panels-container">
			<div class="panel left-panel">
			<img src="assets/img/business.svg" class="image" alt="" />
			</div>
		</div>
	</div>
		
  </div>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script type="text/javascript" src="assets/js/cadastro.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Exibe alerts por tempo determinado  -->
    <script>
    
      $(document).ready(function(){
          setTimeout(function() {
          $(".alert").fadeOut("slow", function() {
            $(this).alert('close');
          });
          }, 4000);
        })

    </script>
</body>
</html>