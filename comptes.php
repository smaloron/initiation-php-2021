<?php

/*
$accountMoves = [
["label" => "Salaire", "date" => "2021-01-01", "amount" => 2500, "type" => "credit"],
["label" => "Loyer", "date" => "2021-01-05", "amount" => 800, "type" => "debit"],
["label" => "Restau", "date" => "2021-01-08", "amount" => 30, "type" => "debit"],
["label" => "Essence", "date" => "2021-01-09", "amount" => 50, "type" => "debit"],
["label" => "ebay", "date" => "2021-01-05", "amount" => 120, "type" => "credit"],
];*/

// Définition du chemin vers le fichier
define("DATA_PATH", "data/account.json");

// Lecture des données
function getData()
{
    $accountMoves = [];
    // Si le fichier existe on le lit
    if (file_exists(DATA_PATH)) {
        // Lecture du fichier json
        $data = file_get_contents(DATA_PATH);
        // conversion du json en tableau (déssérialisation)
        $accountMoves = json_decode($data, true) ?? [];
    }
    return $accountMoves;
}

// sauvegarde des données
function saveData($data)
{
    // conversion de $data en chaîne de caractère (sérialisation)
    $json = json_encode($data);
    // Enregistrement dans le fichier
    file_put_contents(DATA_PATH, $json);
}

// Appel de la fonction de lectures
$accountMoves = getData();

$totalCredit = 0;
$totalDebit = 0;

// Traitement du formulaire

// Les données ont-elles été postées
// alernative count($_POST) > 0
$isPosted = filter_has_var(INPUT_POST, "amount");
$errors = [];

// Si les données ont été postées on les récupère
if ($isPosted) {
    // Récupération des données
    $label = filter_input(INPUT_POST, "label", FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_INT);
    $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);

    // Validation

    if (empty($label)) {
        array_push($errors, "Le libélllé ne peut être vide");
    }

    if (empty($amount) || $amount < 1) {
        array_push($errors, "Le montant ne peut être vide et doit êre supérieur à zéro");
    }

    $testedDate = new DateTime($date);
    $now = new DateTime();
    if ($testedDate > $now) {
        array_push($errors, "La date ne peut être définie dans l'avenir");
    }

    // Si les données sont valides alors
    // on ajoute une entrée au tableau des movements
    $hasErrors = count($errors) > 0;
    if (!$hasErrors) {
        // Création d'un mouvement sur le compte
        $newData = [
            "label" => $label,
            "date" => $date,
            "amount" => $amount,
            "type" => $type,
        ];
        // Ajout de cette nouvelle ligne au tableau
        array_push($accountMoves, $newData);

        //Sauvegarde dans le fichier
        saveData($accountMoves);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptes</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

<div class="mt-3 mb-3 row justify-content-center">
    <div class="col-md-4">

        <!-- Affichage des messages d'erreur -->
        <?php if ($isPosted && $hasErrors): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $item): ?>
                    <p> <?=$item?> </p>
                <?php endforeach?>
            </div>
        <?php endif?>

        <form method="post">
        <div class="form-group">
            <label>Libéllé</label>
            <input type="text" name="label" class="form-control">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <label>Montant</label>
            <input type="number" name="amount" class="form-control">
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="type" value="credit" class="form-check-input">
            <label class="form-check-label">Crédit</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="type" value="debit" class="form-check-input">
            <label class="form-check-label">Débit</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-2">
            Valider
        </button>
    </form></div>
</div>

<table class="table table-bordered table-striped">

<tr>
    <td>Libéllé</td>
    <td>date</td>
    <td>crédit</td>
    <td>débit</td>
</tr>
<?php foreach ($accountMoves as $item): ?>
    <tr>
        <td> <?=$item["label"]?> </td>
        <td> <?=$item["date"]?> </td>
        <td> <?=$item["type"] == "credit" ? $item["amount"] : ""?> </td>
        <td> <?=$item["type"] == "debit" ? $item["amount"] : ""?> </td>
    </tr>
<?php
$totalCredit += $item["type"] == "credit" ? $item["amount"] : 0;
$totalDebit += $item["type"] == "debit" ? $item["amount"] : 0;
?>
<?php endforeach?>

<tfoot>
    <tr>
        <td colspan="2"></td>
        <td><?=$totalCredit?></td>
        <td><?=$totalDebit?></td>
    </tr>
    <tr>
        <?php $solde = $totalCredit - $totalDebit;?>
        <td colspan="2">Solde</td>
        <td><?=$totalCredit > $totalDebit ? $solde : ""?></td>
        <td><?=$totalCredit <= $totalDebit ? $solde : ""?></td>
    </tr>
<tfoot>

</table>

</body>
</html>
