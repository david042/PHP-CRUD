<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Alterar </title>
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
        $cod = $_GET['id'];
        
        include_once('conexao.php');
            
        $select = $conn->prepare("SELECT * FROM cliente where codigo=$cod");
        $select->execute();

        $row = $select->fetch();
	?>
    <main>
        <fieldset>
            <legend> Alterar </legend>
            <form action="confirmaAlterar.php" method="POST">
                <label for="codigo"> Código: </label><br>
                <input readonly type="number" name="codigo" id="codigo" value="<?php echo $row['codigo'];?>"><br>
                <label for="nome"> Nome: </label><br>
                <input required type="text" name="nome" id="nome" value="<?php echo $row['nome'];?>"><br>
                <label for="cpf"> CPF: </label><br>
                <input required type="number" name="cpf" id="cpf" value="<?php echo $row['cpf'];?>"><br>
                <label for="cidade"> Cidade: </label><br>
                <input required type="text" name="cidade" id="cidade" value="<?php echo $row['cidade'];?>"><br>
                <label for="estado"> Estado: </label><br>
                <input required type="text" name="estado" id="estado" value="<?php echo $row['estado'];?>"><br>
                <label for="tel"> Telefone: </label><br>
                <input required type="number" name="tel" id="tel" value="<?php echo $row['tel'];?>"><br>
                <br>
                <input type="submit" value="Alterar">
                <button type="button" onclick="window.location.href='menu.php'"> Voltar </button>
            </form>
        </fieldset>
    </main>
</body>
</html>