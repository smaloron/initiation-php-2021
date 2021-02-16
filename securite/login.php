<?php

// importation des fonctions de sécurité
require "fonctions-securite.php";

$isPosted = filter_has_var(INPUT_POST, "userLogin");

if ($isPosted) {
    $userLogin = filter_input(INPUT_POST, "userLogin", FILTER_SANITIZE_STRING);
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_STRING);

    $user = [
        "login" => $userLogin,
        "password" => $userPassword,
    ];

    if (authenticateUser($user)) {
        header("location:/securite/secret.php");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php if (isset($_SESSION["message"])): ?>
                <div class="alert alert-primary">
                    <?=$_SESSION["message"]?>
                </div>
                <?php unset($_SESSION["message"])?>
            <?php endif?>

            <h1>Connexion</h1>
            <form method="post">
                <div class="form-group">
                    <label>Identifiant de l'utilisateur</label>
                    <input type="text" name="userLogin" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mot de passe de l'utilisateur</label>
                    <input type="password" name="userPassword" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Valider
                </button>
            </form>
        </div>
    </div>
</body>
</html>
