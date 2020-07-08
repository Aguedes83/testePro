<?php
    require '../config/bd.php';
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
    $id = null;
    if(!empty($_GET['id'])){
        $id = $_REQUEST['id'];
    }
    
    if($id==null){
        header("Location: ../index.php");
    }
    else {
		$sql = "select * from usuarios where id='$id'";
		$result = $pdo->query( $sql );
		//$rows = $result->fetchAll( PDO::FETCH_ASSOC );
		$rows = $result->fetch(PDO::FETCH_ASSOC);
		//echo $result['nome'].'<br />';
    }
	
	function data($data){
		return date("d/m/Y", strtotime($data));
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
		
		<title>Listar Usuários</title> 
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
	<h1>Dashboard > Listar</h1> 
							
	<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>! 
		<a href="logout.php" class="btn btn-info btn-sm">
			<span class="glyphicon glyphicon-log-out"></span> Sair
		</a>
	</p>
		
        <div class="container">           
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well" style="background-color:#bae1ff;"> Listar Usuários </h3>
                </div>
					<div class="form-row">
					
						<div class="form-group col-md-12">
							<label class="control-label">Nome: </label>
							<div class="controls">
								<label class="carousel-inner">
									<?php echo !empty($rows['nome'])?$rows['nome']: 'Null';?>
								</label>
							</div>
						</div>
						
					
					
					</div>
					<div class="form-row">
					
							<div class="form-group col-md-12">
							<label class="control-label">Usuário: </label>
							<div class="controls">
								<label class="carousel-inner">
									<?php echo !empty($rows['usuario'])?$rows['usuario']: 'Null';?>
								</label>
							</div>
						</div>
						
					
					
					</div>
		
					<div class="form-row">
                    
						<div class="form-group col-md-12">
							<label class="control-label">email: </label>
							<div class="controls">
								<label class="carousel-inner">
									<?php echo !empty($rows['email'])?$rows['email']: 'Null';?>
								</label>
							</div>
						</div>
						
                    </div>
					
				
			
                    <br/>
					<div class="form-actions">
						<a href="../home.php" type="btn" class="btn btn-warning">Voltar</a>
					</div>   
            </div>
			</br>
        </div>
			
    </body>
</html>

