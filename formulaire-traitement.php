<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profession</title>
</head>
<body>

    <?php
$profession = $_POST["profession"] ?? "inconnu";
echo "Vous êtes un $profession";
?>

</body>
</html>