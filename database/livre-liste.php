<?php
require "pdo.php";

try {
    // Connexio à la BD
    $pdo = getPDO();
    $sql = "SELECT * FROM livres";
    // Exécution de la requête
    $query = $pdo->query($sql);
    $bookList = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    echo $err->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau livre</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Liste des livres</h1>
            <div class="text-right mt-2 mb-3">
                <a href="livre-insert.php" class="btn btn-primary">
                    Ajouter un livre
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Photo</th>
                    <th>titre</th>
                    <th>Auteur</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($bookList as $book): ?>
                    <tr>
                        <td>
                            <img src="couvertures/couverture_<?=$book["id"]?>.jpg" class="img img-responsive">
                        </td>
                        <td> <?=$book["titre"]?></td>
                        <td> <?=$book["auteur"]?></td>
                        <td> <?=$book["prix"]?></td>
                        <td>
                            <a href="livre-delete.php?id=<?=$book["id"]?>"
                            class="btn btn-danger">Supprimer </a>
                        </td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>

</body>
</html>
