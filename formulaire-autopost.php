<?php
var_dump($_POST);
// Le formulaire a-t-il été posté ?
$hasPostedData = count($_POST) > 0;
// Tableau de toutes les erreurs de saisie
$errors = [];

// Récupération des données
// seulement si elles ont été postées
if ($hasPostedData) {
    $profession = filter_input(
        INPUT_POST,
        "profession",
        FILTER_SANITIZE_STRING) ?? "inconnu";

    $salary = filter_input(
        INPUT_POST,
        "salaire",
        FILTER_SANITIZE_NUMBER_INT
    );

    $validatedSalary = filter_input(
        INPUT_POST,
        "salaire",
        FILTER_VALIDATE_INT
    );

    // Validation de la saisie
    // Un série de tests qui vont ajouter
    // des lignes au tableau des erreurs
    // si les données ne sont pas valides
    if (empty($profession)) {
        array_push($errors, "Vous devez saisir une profession");
    }
    if (empty($salary)) {
        array_push($errors, "Vous devez saisir un salaire");
    }

    if (!$validatedSalary) {
        array_push($errors, "Votre salaire est invalide");
    }
}

// booléen qui indique si il y a des erreurs
$hasError = !empty($errors); //count($errors) > 0;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <!-- afficher le résultat si les données sont postées et qu'il n'y a pas d'erreur -->
            <?php if ($hasPostedData && !$hasError): ?>
                <h1>Résultat</h1>
                <p>Vous êtes <?=$profession?> vous gagnez <?=$salary?> k€/an</p>
            <?php else: ?>

                <!-- Affichage des erreurs -->
                <?php if ($hasError): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <p> <?=$error?> </p>
                        <?php endforeach?>
                    </div>
                <?php endif?>

                <h1>Formulaire</h1>
                <form method="post">
                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" name="profession" class="form-control" value="<?=$profession ?? ""?>">
                    </div>
                    <div class="form-group">
                        <label>Salaire</label>
                        <input type="text" name="salaire" class="form-control"
                        value="<?=$salary ?? ""?>">
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control"
                        value="">
                    </div>

                    <div class="form-group">
                        <label>type</label>
                        <select name="type" class="form-control">
                            <option value="credit">crédit</option>
                            <option value="debit">débit</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3" name="submit" value="credit"> Envoyer </button>
                    <button type="submit" class="btn btn-primary btn-block mt-3" name="submit" value="debit"> Envoyer </button>
                </form>
            <?php endif?>
        </div>
    </div>

</body>
</html>
