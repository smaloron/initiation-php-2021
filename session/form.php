<?php
session_start();

$isPosted = filter_has_var(INPUT_POST, "name");

if ($isPosted) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT);

    // régénératin de l'id de session
    session_regenerate_id(true);
    // Enregistrer la saisie dans la session
    $_SESSION["name"] = $name;

    // Transformation du mot de passe avec une fonction de hachage
    $hash = password_hash($pwd, PASSWORD_BCRYPT);
    $_SESSION["password"] = $hash;

    // redirection vers la page index
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>

<form method="post">

    <input type="text" name="name" placeholder="Votre nom">
    <input type="text" name="pwd" placeholder="Votre mot de passe">

    <button type="submit">Valider</button>
</form>

</body>
</html>
