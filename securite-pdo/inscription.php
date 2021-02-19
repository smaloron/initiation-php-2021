<?php

// importation des fonctions de sécurité
require "fonctions-securite.php";

$isPosted = filter_has_var(INPUT_POST, "userName");

if ($isPosted) {
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_STRING);
    $userLogin = filter_input(INPUT_POST, "userLogin", FILTER_SANITIZE_STRING);
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_STRING);

    $user = [
        "username" => $userName,
        "user_login" => $userLogin,
        "user_password" => $userPassword,
    ];

    // Sauvegarde du nouvel utilisateur
    if (saveUser($user)) {
        // redirection vers le login
        //header("location:/securite-pdo/login.php");
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
            <h1>Inscription</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputUserName">Nom de l'utilisateur</label>
                    <input type="text" name="userName" class="form-control" id="inputUserName">
                </div>
                <div class="form-group">
                    <label>Identifiant de l'utilisateur</label>
                    <input type="text" name="userLogin" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mot de passe de l'utilisateur</label>
                    <input type="password" name="userPassword" class="form-control">
                </div>

                <div class="custom-file mb-4">
                    <label class="custom-file-label">Votre avatar</label>
                    <input class="custom-file-input" type="file" name="avatar">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Valider
                </button>
            </form>
        </div>
    </div>
</body>
</html>
