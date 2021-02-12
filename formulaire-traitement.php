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
$profession = filter_input(
    INPUT_POST,
    "profession",
    FILTER_SANITIZE_STRING) ?? "inconnu";

$salary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_SANITIZE_NUMBER_INT
);

$validatedSalary = filter_input(
    INPUT_POST,
    "salaire",
    FILTER_VALIDATE_INT
);

if ($validatedSalary === false) {
    echo "Votre saisie est invalide";
} else {
    echo "Vous êtes un $profession vous gagnez $salary k€ par an";
}

?>

</body>
</html>