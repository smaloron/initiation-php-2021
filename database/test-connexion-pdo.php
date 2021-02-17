<?php

$dsn = "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    /*
    $sql = "INSERT INTO livres (titre, auteur, prix)
    VALUES ('50 nuances de PDO', 'Martin Fowler', 50)";

    $success = $pdo->exec($sql);

    echo "Ajout OK";
     */

    $sql = "SELECT * FROM livres";
    $query = $pdo->query($sql);

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row["id"] . "<br>";
    }

} catch (PDOException $err) {
    echo $err->getMessage();
}
