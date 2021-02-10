<?php
require "fonctions/fonctions-table-multiplication.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de multiplication</title>
</head>
<body>
    <?php include "fragments/nav.html"?>


<?=getTable(10)?>

</body>
</html>
