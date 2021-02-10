<?php
$professions = ["Développeur", "Pompier", "Graphiste", "Formateur"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professions</title>
</head>
<body>

    <select>
        <?php foreach ($professions as $item): ?>
            <option> <?=$item?> </option>
        <?php endforeach?>
    </select>

</body>
</html>