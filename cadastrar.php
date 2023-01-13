<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Cadastrar </title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="cadastrar.php"> Cadastrar </a></li>
            <li><a href="menu.php"> Alterar </a></li>
            <li><a href="createDB.php"> Criar Banco de Dados </a></li>
            <li><a href="createTable.php"> Criar Tabela </a></li>
        </ul>
    </nav>
    <?php
        include_once('conexao.php');
    ?>
    <div class="container">
        <main>
            <fieldset>
                <legend> Cadastrar </legend>
                <form action="cadastrar.php" method="POST">
                    <label for="nome"> Nome: </label><br>
                    <input required type="text" name="nome" id="nome"><br>
                    <label for="cpf"> CPF: </label><br>
                    <input required type="number" name="cpf" id="cpf"><br>
                    <label for="cidade"> Cidade: </label><br>
                    <input required type="text" name="cidade" id="cidade"><br>
                    <label for="estado"> Estado: </label><br>
                    <input required type="text" name="estado" id="estado"><br>
                    <label for="tel"> Telefone: </label><br>
                    <input required type="number" name="tel" id="tel"><br>
                    <br>
                    <input type="submit" value="Cadastrar">
                    <button type="button" onclick="window.location.href='menu.php'"> Voltar </button>
                </form>
            </fieldset>
        </main>
    </div>
</body>
</html>

<?php
    if(!empty($_POST))
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $tel = $_POST['tel'];

        try
        {
			$stmt = $conn->prepare("INSERT INTO cliente (nome, cpf, cidade, estado, tel)
									VALUES (:nome, :cpf, :cidade, :estado, :tel)");

			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':cidade', $cidade);
			$stmt->bindParam(':estado', $estado);
			$stmt->bindParam(':tel', $tel);
			
			$stmt->execute();

			echo "<script>alert('Cadastrado com Sucesso');</script>";
		}
        catch(PDOException $e)
		{
			echo "Erro ao cadastrar: ".$e->getMessage();
		}
		$conn = null;
    }
?>