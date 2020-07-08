<?php 
    require '../config/bd.php';
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
    }
	
	if ($id==null ) {
		header("Location: ../index.php");
    }
	
	if (!empty($_POST)) {
		
		$nomeErro = null;
		$usuarioErro = null;
        $senhaErro = null;
        $emailErro = null;

		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		//Validação
		$validacao = true;
		
		if (empty($nome)) {
			$nomeErro = 'Por favor digite o Nome!';
			$validacao = false;
        }
		
		if (empty($usuario)) {
			$usuarioErro = 'Por favor digite o Usuário!';
			$validacao = false;
		} 
		
		if (empty($email)) {
			$emailErro = 'Por favor digite o E-mail!';
			$validacao = false;
		} 
		
		if (empty($senha)) {
			$senhaErro = 'Por favor digite a Senha!';
			$validacao = false;
		} 
		
		// update data
		if ($validacao) {
			
            $stmt = $pdo->prepare('UPDATE usuarios SET nome = :nome,usuario = :usuario,email = :email,senha = :senha WHERE id = :id');
			$stmt->execute(array(
				':id' => $id,
				':nome' => $nome,
				':usuario' => $usuario,
				':senha' => $senha,
				':email' => $email));

			echo "<script>location.href='../home.php?update=true';</script>";
		}
		
	} else {

		$sql = "select * from usuarios where id='$id'";
		$result = $pdo->query( $sql );
		$rows = $result->fetch(PDO::FETCH_ASSOC);
		
		$nome = $rows['nome'];
		$usuario = $rows['usuario'];
		$senha = $rows['senha'];
		$email = $rows['email'];
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Teste Prático">
		<meta name="author" content="Antonio Guedes">
		
		<title>Alterar Usuários</title> 
		<link   href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/cpfcnpj.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>
 
<body>
<h1>Dashboard > Alterar</h1> 
							
	<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>! 
		<a href="logout.php" class="btn btn-info btn-sm">
			<span class="glyphicon glyphicon-log-out"></span> Sair
		</a>
	</p>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="well" style="background-color:#ffdfba;"> Atualizar Usuários </h3>
                    </div>
             
                    <form action="update.php?id=<?php echo $id?>" method="post">
					  
					  <div class="form-row">
						
							<div class="form-group col-md-6" <?php echo !empty($nomeErro)?'error ' : '';?>>
								<label for="nome">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
								  <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
							
							</div>
							<div class="form-group col-md-6" <?php echo !empty($emailErro)?'error ' : '';?>>
								<label for="email">E-mail</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
								  <?php if(!empty($emailErro)): ?>
                                    <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
							
							</div>
							
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6" <?php echo !empty($usuarioErro)?'error ' : '';?>>
								<label for="usuario">Usuário</label>
								<input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="Usuário" value="<?php echo !empty($usuario)?$usuario: '';?>">
								<?php if(!empty($usuarioErro)): ?>
                                    <span class="help-inline"><?php echo $usuarioErro;?></span>
                                <?php endif;?>
							</div>
							<div class="form-group col-md-6" <?php echo !empty($senhaErro)?'error ' : '';?>>
								<label for="senha">Senha</label>
								<input type="password" class="form-control" id="senha" name="senha" placeholder="senha" value="<?php echo !empty($senha)?$senha: '';?>">
								<?php if(!empty($senhaErro)): ?>
                                    <span class="help-inline"><?php echo $senhaErro;?></span>
                                <?php endif;?>
							</div>
						</div>
						
					
                        <br/>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a href="../home.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>                 
    </div> 
	</br>
  </body>
</html>

