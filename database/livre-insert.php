<?php
require "pdo.php";
$isPosted = filter_has_var(INPUT_POST, "titre");
$isValid = true;

// Chemin des fichiers reçus par upload
$uploadedPath = getcwd() . "/couvertures";
// L'utilisateur a-t-il envoyé un fichier avec le formulaire
$hasUploadedFile = count($_FILES) > 0;

if ($isPosted) {
    // Règles de récupération
    $inputFilters = [
        "titre" => FILTER_SANITIZE_STRING,
        "auteur" => FILTER_SANITIZE_STRING,
        "prix" => [
            "filter" => FILTER_VALIDATE_INT,
            "options" => ["min_range" => 1, "max_range" => 180],
        ],
    ];
    // Récupération de toutes les données dans un tableau
    $data = filter_input_array(INPUT_POST, $inputFilters);

    // Validation de la saisie
    $isValid = $data["prix"]
    && !empty($data["titre"])
    && !empty($data["auteur"]);

    if ($isValid) {
        try {
            // La requête SQL
            $sql = "INSERT INTO livres (titre, auteur, prix)
                    VALUES (:titre, :auteur, :prix)";
            // La connexion à la BD
            $pdo = getPDO();
            // Préparation de la requête
            $statement = $pdo->prepare($sql);
            // Exécution de la requête préparée
            $statement->execute($data);

            // Récupération de l'id du livre ajouté
            $bookId = $pdo->lastInsertId();

            // Redirection vers la liste des livres
            header("location:livre-liste.php");
        } catch (PDOException $err) {
            echo $err->getMessage();
        }

        // Traitement de l'upload
        if ($hasUploadedFile && isset($bookId)) {
            $upload = $_FILES["couverture"];
            // Récupération de l'extension du fichier

            // Les extensions possibles
            $allowedTypes = [
                "image/jpeg" => "jpg",
                "image/png" => "png",
            ];
            // Test de l'extension
            if (array_key_exists($upload["type"], $allowedTypes)) {
                $ext = $allowedTypes[$upload["type"]];
            } else {
                $upload["error"] = 1;
            }

            // Définition du nom du fichier
            $filePath = $uploadedPath . "/couverture_$bookId.$ext";
            // Si aucune erreur alors on déplace le fichier temporaire
            // vers sa destination finale
            if ($upload["error"] == 0) {
                move_uploaded_file($upload["tmp_name"], $filePath);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau livre</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Insertion de livre</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control">
                </div>
                <div class="form-group">
                    <label>Auteur</label>
                    <input type="text" name="auteur" class="form-control">
                </div>
                <div class="form-group">
                    <label>Prix</label>
                    <input type="number" name="prix" class="form-control">
                </div>

                <div class="custom-file mb-4">
                    <label class="custom-file-label">Couverture</label>
                    <input type="file" class="custom-file-input" name="couverture">
                </div>


                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </form>
        </div>
    </div>

</body>
</html>
