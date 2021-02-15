<?php

// Lecture des données du fichier json
$filePath = "data/livres.json";
// $jsonContent est une chaîne de caractère
$jsonContent = file_get_contents($filePath);
// Conversion de la chaîne de caractère en tableau ordinal de tableau associatif
$bookList = json_decode($jsonContent, true);

// traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "title");

if ($isPosted) {
    // Récupération de la saisie
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING);

    // Ajout à $bookList seulement si la saisie n'est pas vide
    if (!empty($title) && !empty($author)) {
        array_push($bookList, ["title" => $title, "author" => $author]);
        // Sauvegarde de la liste des livres dans un fichier
        // Conversion du tableau en chaîne de caractère
        $jsonBooks = json_encode($bookList);
        // Enregistrement de la chaîne de caractère dans un fichier
        file_put_contents($filePath, $jsonBooks);
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de livres</title>
</head>
<body>

    <div>
        <form method="post">
            <input type="text" name="title" placeholder="Le titre du livre">
            <input type="text" name="author" placeholder="L'auteur du livre">
            <button type="submit">Valider </button>
        </form>
    <div>

    <ul>
        <?php foreach ($bookList as $book): ?>
            <li> <?=$book["title"]?> - <?=$book["author"]?> </li>
        <?php endforeach?>
    </ul>

</body>
</html>
