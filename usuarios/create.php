<?php
    require '../config/bd.php';
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
  
    if(!empty($_POST)){	
        //Acompanha os erros de validação
        $nomeErro = null;
        $usuarioErro = null;
        $senhaErro = null;
        $emailErro = null;
        
    	$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];
	
        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o Nome!';
            $validacao = false;
        }
		if(empty($usuario)){
            $usuarioErro = 'Por favor digite o Usuário!';
            $validacao = false;
        }
		
        if($validacao){
			$stmt = $pdo->prepare('INSERT INTO usuarios (nome,usuario,senha,email,nivel,ativo,cadastro) VALUES(:nome,:usuario,:senha,:email,:nivel,:ativo,NOW())');
			$stmt->execute(array(
				':nome' => $nome,
				':usuario' => $usuario,
				':senha' => $senha,
				':email' => $email,
				':nivel' => 1,
				':ativo' => 1,

			  ));
			  //echo $stmt->rowCount(); 
			echo "<script>location.href='../home.php?create=true';</script>";
        }
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
		
		<title>Incluir Usuários</title> 
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/cpfcnpj.js"></script>
		<!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
    </head>
    
    <body>
		<h1>Dashboard > Incluir</h1> 						
		<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>! 
			<a href="logout.php" class="btn btn-info btn-sm">
				<span class="glyphicon glyphicon-log-out"></span> Sair
			</a>
		</p>
		
        <div class="container" >
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" style="background-color:#B0C4DE;"> Incluir Usuários </h3>
					<!--- FORMULÁRIO //--START --->
					<form action="create.php" method="post">
					
	
						<div class="form-row">
						
							<div class="form-group col-md-6" <?php echo !empty($nomeErro)?'error ' : '';?>>
								<label for="nome">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>" autofocus>
								  <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
							
							</div>
							<div class="form-group col-md-6" <?php echo !empty($emailErro)?'error ' : '';?>>
								<label for="email">e-mail</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required="" value="<?php echo !empty($email)?$email: '';?>">
								  <?php if(!empty($emailErro)): ?>
                                    <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
						
							
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6" <?php echo !empty($usuarioErro)?'error ' : '';?>>
								<label for="usuario">Usuário</label>
								<input type="text" class="form-control"  id="usuario" name="usuario" placeholder="usuario"  required="" value="<?php echo !empty($usuario)?$usuario: '';?>">
								  <?php if(!empty($usuarioErro)): ?>
                                    <span class="help-inline"><?php echo $usuarioErro;?></span>
                                <?php endif;?>
							
							</div>
							<div class="form-group col-md-6" <?php echo !empty($senhaErro)?'error ' : '';?>>
								<label for="senha">Senha</label>
								<input type="password" class="form-control" id="senha" name="senha" placeholder="senha" value="<?php echo !empty($senha)?$senha: '';?>">

							</div>
						</div>
				
				
					  	<div class="form-row">
						  <div class="form-actions">
								<br/>
					
								<button type="submit" class="btn btn-success">Adicionar</button>
								<a href="../home.php" type="btn" class="btn btn-default"> <b><</b> Voltar</a>
							
							</div>
                        </div>
					</form>
					<!--- FORMULÁRIO //--END --->
				
                </div>
					
			</div>	
        </div>
		</br>
		
    </body>
</html>


