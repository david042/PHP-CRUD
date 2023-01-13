<?php
	include_once('conexao.php');

    $cod = $_POST['codigo']; 
	$nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tel = $_POST['tel'];

	try 
	{
		$stmt = $conn->prepare("UPDATE cliente SET nome = :nome,
												   cpf = :cpf,
												   cidade = :cidade,
												   estado = :estado,
												   tel = :tel WHERE codigo = :cod");

		$stmt->execute(array(':cod' => $cod, 
							 ':nome' => $nome,
							 ':cpf' => $cpf,
							 ':cidade' => $cidade,
							 ':estado' => $estado,
							 ':tel' => $tel));
		
		header( "refresh:0;url=menu.php" );

		echo "<script>alert('Cliente Alterado com sucesso');</script>";
	} 

	catch(PDOException $e) 
	{

		echo 'Erro na conexão: '.$e->getMessage();

	}
?>