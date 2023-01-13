<?php
  session_start();
  $host = $_SESSION['host'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  try
  {
    $conn = new PDO("mysql:host=$host;dbname=sistema", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // criar tabela
    $sql = "create table cliente(codigo int PRIMARY KEY AUTO_INCREMENT,
                                 nome varchar(50) not null,
                                 cpf char(11) not null,
                                 cidade varchar(20) not null,
                                 estado char(2) not null,
                                 tel char(11) not null)";

    $conn->exec($sql);
    echo "Tabela Cliente criado com sucesso";
  }
  catch(PDOException $e)
  {
    echo $sql."<br>".$e->getMessage();
  }

  $conn = null;
?>