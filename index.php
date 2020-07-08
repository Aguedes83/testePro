
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> Login-Teste Pro</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Teste Prático">
		<meta name="author" content="Antonio Guedes">
		
		<link href="css/style.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
<body>


<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://iguedes.com.br/projetos/teste_Pro/img/icon.jpg" id="icon" alt="User Icon"  height="30" width="80"/>
    </div>

    <!-- Login Form -->
    <form action="validacao.php" method="post">
      <input type="text" id="usuario" class="fadeIn second" name="usuario" required="" placeholder="Usuário">
      <input type="text" id="senha" class="fadeIn third" name="senha" required="" placeholder="Senha">
      <input type="submit" class="fadeIn fourth"  value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
     <!--- <a class="underlineHover" href="#">Forgot Password?</a>--->
	 <strong>Acessos: </strong><p>
		Usuário: demo |  senha: demo
		<br>
		Usuário: admin | Senha: admin
    </div>

  </div>
</div>

</body>
</html>

