<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des années</title>
</head>

<body>

<?php
$startDate = date("Y");
$numberOfYears = 12;
?>
    <select>
        <?php for ($i = 0; $i <= $numberOfYears; $i++): ?>
            <option> <?=$startDate + $i?> </option>
        <?php endfor?>
    </select>

</body>

</html>