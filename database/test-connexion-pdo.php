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

    $sql = "SELECT * FROM livres WHERE id=" . $_GET["id"];
    $query = $pdo->query($sql);
    // Récupération des données avec un curseur
    // (récupération ligne à ligne)
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo $row["id"] . "<br>";
    }

    // Récupération de toutes les données d'un seul coup
    // Rééxécution de la requête pour remettre le curseur au début
    $query = $pdo->query($sql);
    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($bookList);

    $query = $pdo->query($sql);
    while ($col = $query->fetchColumn(0)) {
        var_dump($col);
    }

} catch (PDOException $err) {
    echo $err->getMessage();
}
