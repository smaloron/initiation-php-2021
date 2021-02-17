<?php

$dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
$user = "root";
$pass = "";

$pdo = new PDO($dsn, $user, $pass);

var_dump($pdo);

$sql = "INSERT INTO livres (titre, auteur, prix)
VALUES ('50 nuances de PDO', 'Martin Fowler', 50)";

$success = $pdo->exec($sql);

var_dump($success);
