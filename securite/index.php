<?php
require "fonctions-securite.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>

    <nav>
        <ul class="nav">
            <?php if (isAuthenticated()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">
                        Déconnexion
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">
                        Inscription
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        Connexion
                    </a>
                </li>

            <?php endif?>
        </ul>

    </nav>

</body>
</html>
