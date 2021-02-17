<?php

require "pdo.php";

try {
    // Connexion à la BD
    $pdo = getPDO();

    // Récupération de l'id à supprimer
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    // La requête SQL
    $sql = "DELETE FROM livres WHERE id = ?";

    // Préparation de la requête
    $statement = $pdo->prepare($sql);

    // Exécution de la requête
    $statement->execute([$id]);

    // redirection
    header("location:livre-liste.php");

} catch (PDOException $err) {
    // Affichage du message d'erreur
    echo $err->getMessage();
}
