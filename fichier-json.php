<?php

function saveBook($bookList, $filePath)
{
    // Sauvegarde de la liste des livres dans un fichier
    // Conversion du tableau en chaîne de caractère
    $jsonBooks = json_encode($bookList);
    // Enregistrement de la chaîne de caractère dans un fichier
    file_put_contents($filePath, $jsonBooks);

}

// Lecture des données du fichier json
$filePath = "data/livres.json";
// $jsonContent est une chaîne de caractère
$jsonContent = file_get_contents($filePath);
// Conversion de la chaîne de caractère en tableau ordinal de tableau associatif
$bookList = json_decode($jsonContent, true);

// traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "title");
// Le lien supprimer a-t-il été cliqué
$deleteLinkClicked = filter_has_var(INPUT_GET, "toDelete");

if ($isPosted) {
    // Récupération de la saisie
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, "author", FILTER_SANITIZE_STRING);

    // Ajout à $bookList seulement si la saisie n'est pas vide
    if (!empty($title) && !empty($author)) {
        array_push($bookList, ["title" => $title, "author" => $author]);
        saveBook($bookList, $filePath);
    }
} else if ($deleteLinkClicked) {
    // Récupération de l'index à supprimer
    $index = filter_input(INPUT_GET, "toDelete", FILTER_SANITIZE_NUMBER_INT);
    // Suppression dans $bookList
    array_splice($bookList, $index, 1);
    saveBook($bookList, $filePath);
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
        <?php
$index = 0;
foreach ($bookList as $book):
?>
            <li>
                <?=$book["title"]?> - <?=$book["author"]?>
                <a href="fichier-json.php?toDelete=<?=$index?>">supprimer </a>
            </li>
            <?php $index++;?>

        <?php endforeach?>
    </ul>

</body>
</html>
