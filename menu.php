<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Menu </title>
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
    <main>
        <table>
            <tr>
                <th> Código </th>
                <th> Nome </th>
                <th> CPF </th>
                <th> Cidade </th>
                <th> Estado </th>
                <th> Tel </th>
                <th></th>
            </tr>
            <?php
                include_once('conexao.php');
                try
                {
                    $select = $conn->prepare('SELECT * FROM cliente');
                    $select->execute();
                    while($row = $select->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'.$row['codigo'].'</td>';
                        echo '<td>'.$row['nome'].'</td>';
                        echo '<td>'.$row['cpf'].'</td>';
                        echo '<td>'.$row['cidade'].'</td>';
                        echo '<td>'.$row['estado'].'</td>';
                        echo '<td>'.$row['tel'].'</td>';
                        echo '<td>';
                        ?>
                        <button onclick="window.location.href='alterar.php?id=<?php echo $row['codigo'];?>'">
                            Alterar
                        </button>
                        <button onclick="window.location.href='excluir.php?id=<?php echo $row['codigo'];?>'">
                            Excluir
                        </button>
                        <?php
                        echo '</tr>';
                    }
                }
                catch(PDOException $e) 
                {
                    echo "Erro na conexão: ".$e->getMessage();
                }
            ?>
        </table>
    </main>
</body>
</html>