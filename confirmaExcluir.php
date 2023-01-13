<?php
    $cod = $_GET['id'];

    include_once('conexao.php');
	try 
	{   
		$delete = $conn->prepare("DELETE FROM cliente WHERE codigo=$cod");
		$delete->execute();
		echo "<h2>Cliente excluido com sucesso</h2>";
	} 
	catch(PDOException $e) 
	{
		echo 'Erro na conexão: '.$e->getMessage();
	}
?>
<button onclick="window.location.href='menu.php'"> Voltar </button>