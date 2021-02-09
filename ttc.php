<?php
// Récupération des données
$montantHT = $_GET["prix"] ?? 0;

// Validation des données et traitement
if ($montantHT > 0) {
    // Application de la remise
    if ($montantHT > 100) {
        $montantHT *= 0.95;
    }

    // Calcul du montant TTC
    $montantTTC = round($montantHT * 1.2, 1);
} else {
    $erreur = "Vous devez saisir un montant numérique et positif";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul TTC</title>
</head>
<body>

    <?php if (isset($erreur)) {?>
        <div> <?=$erreur?> </div>
    <?php } else {?>
        <p>Le prix TTC est de <?=$montantTTC?>
    <?php } // endif ?>

    <?php if (isset($erreur)): ?>
        <div> <?=$erreur?> </div>
    <?php else: ?>
        <p>Le prix TTC est de <?=$montantTTC?>
    <?php endif?>



</body>
</html>