<?php
	include "config/bd.php";
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }
			
  $usuario = ($_POST['usuario']);
  $senha = ($_POST['senha']);
  
  $query = $pdo->query("SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1");
	$fetch = $query->fetch();
	$total_registros = $query->rowCount();
	//print_r($total_registros);
	

  if ($total_registros != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = $fetch;
	 // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    //echo $_SESSION['UsuarioID'];
      // Redireciona o visitante
      header("Location: home.php"); exit;
	
  }
    
  ?>