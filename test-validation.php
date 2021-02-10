<?php
require "fonctions/validations.php";

$age = $_GET["age"] ?? 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>

<?php if (validateAge($age)): ?>
    <p> Vous avez <?=$age?> ans</p>
<?php else: ?>
    <p>Votre saisie est incorrecte</p>
<?php endif?>

</body>
</html>
