<?php
    session_start();
    $_SESSION['host'] = $_POST['host'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: menu.php');
    die();
?>