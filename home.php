<?php
  	include 'config/bd.php';
 // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();
    
  $nivel_necessario = 1;
    
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: index.php"); exit;
  }
    
	$create = $_GET['create'];
	//echo $create;
	if($create == "true"){
        $msg = "Inserido com sucesso!";
    }else{
        $msg = "";
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
		
		<title> Teste Pro</title> 
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
    </head>
    
    <body>
		<h1>Dashboard</h1> 
		<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>! 
			<a href="logout.php" class="btn btn-info btn-sm">
				<span class="glyphicon glyphicon-log-out"></span> Sair
			</a>
		</p>
				
       <!-- <div class="jumbotron">--->
        <div class="container">

            <div class="row">
				     <h3 class="well" style="background-color:#b0dbde;"> <strong> Teste Prático - </strong>Gerenciador de Usuários</h3>
            </div>
            </br>
            <div class="row">
                <p>
                    <a href="usuarios/create.php" class="btn btn-success">Incluir Usuários</a>
					<?php echo $msg;?>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
							<th>Id</th>
                            <th>Nome</th>
                            <th>e-mail</th>
                            <th>Data Cadastro</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						
							$query = $pdo->query="select * from usuarios ORDER BY id DESC";
							$stmt = $pdo->prepare($query);
							$stmt->execute(array());
							//$fetch = $query->fetch();
			
							while ($row = $stmt->fetch()){
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'. utf8_encode($row['nome']). '</td>';
								echo '<td>'. $row['email']. '</td>';
								echo '<td>'. data($row['cadastro']). '</td>';
								echo '<td width=250>';
								echo '<a class="btn btn-primary" href="usuarios/read.php?id='.$row['id'].'">Listar</a>';
								echo ' ';
								echo '<a class="btn btn-warning" href="usuarios/update.php?id='.$row['id'].'">Atualizar</a>';
								echo ' ';
								echo '<a class="btn btn-danger" href="usuarios/delete.php?id='.$row['id'].'">Excluir</a>';
								echo '</td>';
								echo '<tr>';		
							}
                        ?>
                    </tbody>                   
                </table>    		
            </div>
        </div>
        <!---</div>--->
		  
    </body>
</html>
