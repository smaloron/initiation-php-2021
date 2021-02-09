<?php
$n1 = $_GET["n1"] ?? 1;
$n2 = $_GET["n2"] ?? 1;
$result = $n1 * $n2;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>
<body>

    <h3>
        <?=" $n1 fois $n2 égal $result"?>
    </h3>

</body>
</html>