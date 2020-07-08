<?php
    require '../config/bd.php';
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();

	$id = 0;

	if(!empty($_GET['id'])){
		$id = $_REQUEST['id'];
	}

	if(!empty($_POST)){
		$id = $_POST['id'];

		//Delete do banco:
		$stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
		$stmt->bindParam(':id', $id); 
		$stmt->execute();
		
		echo "<script>location.href='../home.php?delete=true';</script>";
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
		
		<title>Deletar Usuários</title> 
		<link   href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/cpfcnpj.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
		
<h1>Dashboard > Excluir</h1> 				
	<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!  
		<a href="../logout.php" class="btn btn-info btn-sm">
			<span class="glyphicon glyphicon-log-out"></span> Sair
		</a>
	</p>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" style="background-color:#DB9D9D;">Excluir Usuários</h3>
                </div>
                <form class="form-horizontal" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <div class="alert alert-danger"> Deseja excluir o Usuário?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="../home.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>           
        </div>
    </body>    
</html>

