<?php
    session_start();
    $host = $_SESSION['host'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    try
    {
        $conn = new PDO("mysql:host=$host;dbname=sistema", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '<script>
                let footer = "<footer><p>Conectado ao banco de dados</p></footer>";
                document.body.insertAdjacentHTML("afterend", footer);
              </script>';
    }
    catch(PDOException $e)
    {
        echo "Falha na conexão: " . $e->getMessage();
    }
?>