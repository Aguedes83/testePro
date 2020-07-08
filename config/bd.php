<?php
	$db_host = "localhost";
	$db_name = "banco";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$pdo = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>