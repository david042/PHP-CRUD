<?php
	$cod = $_GET['id'];
	
	include_once('conexao.php');
	 
		$select = $conn->prepare("SELECT * FROM cliente where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
            echo '<script>
                    let excluir = "Codigo: '.$row['codigo'].'\n'.
                    'Nome: '.$row['nome'].'\n'.
                    'CPF: '.$row['cpf'].'\n'.
                    'Cidade: '.$row['cidade'].'\n'.
                    'Estado: '.$row['estado'].'\n'.
                    'Telefone: '.$row['tel'].'\n"
                    if(confirm("Excluir dados?\n"+excluir) == true){
                        window.location.href="confirmaExcluir.php?id='.$row['codigo'].'";
                    }else{
                        window.location.href="menu.php";
                    }
                  </script>';
		}
?>