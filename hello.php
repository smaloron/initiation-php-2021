<?php
$now = date("d/m/Y");
$age = 30.5;

var_dump($age);

//Récupération du paramètre name
$name = $_GET["nom"] ?? "Jane";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <?php include "fragments/nav.html"?>

    <h1>Hello <?=$name?> <?php echo $name ?> </h1>
    <h2>Nous sommes le <?php echo $now; ?></h2>
    <?php echo 2 ** 3 ?>
</body>
</html>