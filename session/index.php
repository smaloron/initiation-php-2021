<?php
session_start();

session_regenerate_id();
$name = $_SESSION["name"] ?? "inconnu";

var_dump($_SESSION);

if (password_verify("123", $_SESSION["password"])) {
    echo "pass OK";
} else {
    echo "pass KO";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

    <h1>Hello <?=$name?></h1>

    <a href="/session/form.php">Donnez votre nom </a>

</body>
</html>