<?php
try {
    $dsn = "mysql:host=localhost;dbname=auth_php";
    $pdo = new PDO($dsn , "root" , "");
}catch (PDOException $e) {
    echo "Error " . $e->getMessage();
    die(); // Stop the executing of code
}
