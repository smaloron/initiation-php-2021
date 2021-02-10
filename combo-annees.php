<?php
function getNextYearsList($numberOfYears)
{
    $startDate = date("Y");
    $html = "<select>";
    for ($i = 0; $i < $numberOfYears; $i++) {
        $html .= "<option>" . ($startDate + $i) . "</option>";
    }
    $html .= "</select>";
    return $html;
}
?>
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
echo getNextYearsList(15);
?>


</body>

</html>