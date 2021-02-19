<?php

require "fonctions-securite.php";

// Sécurisation de la page
// Il faut être authentifier pour avoir accès
if (!isAuthenticated()) {
    $_SESSION["message"] = "Vous devez être authentifié pour voir la page secret";
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret</title>
</head>
<body>

    <h1> Hello <?=getAuthenticatedUser()["username"]?> </h1>
    <p>Les infos ici sont secrètes</p>

</body>
</html>