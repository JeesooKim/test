<?php
    //$dsn = 'mysql:host=localhost;dbname=bookdb';
    $dsn = 'mysql:host=localhost;dbname=mytestdb';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>