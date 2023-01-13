<?php
    session_start();
    $host = $_SESSION['host'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    try
    {
        $conn = new PDO("mysql:host=$host", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE sistema";
        $conn->exec($sql);
        echo "Banco de Dados criado com sucesso<br>";
    }
    catch(PDOException $e)
    {
        echo $sql."<br>".$e->getMessage();
    }

    $conn = null;
?>