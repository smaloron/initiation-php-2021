<?php

$java = [
    "name" => "Java",
    "frontend" => false,
    "backend" => true,
    "compiled" => true,
];

foreach ($java as $key => $val) {
    if (is_bool($val)) {
        $val = $val ? "oui" : "non";
    }
    echo "$key =$val <br>";
}

$languages = [
    [
        "name" => "Java",
        "frontend" => false,
        "backend" => true,
        "compiled" => true,
    ],
    [
        "name" => "PHP",
        "frontend" => false,
        "backend" => true,
        "compiled" => false,
    ],
    [
        "name" => "Python",
        "frontend" => true,
        "backend" => true,
        "compiled" => false,
    ],
    [
        "name" => "Javascript",
        "frontend" => true,
        "backend" => true,
        "compiled" => false,
    ],
];

$sentence = "Que j'aime à faire apprendre un nombre utile aux sages";
// conversion de la phrase en tableau
$words = explode(" ", $sentence);
shuffle($words);
// conversion du tableau en chaîne
echo implode(" ", $words);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
    <tr>
        <th>Nom</th>
        <th>Frontend</th>
        <th>Backend</th>
        <th>Compilé</th>
    </tr>
    <?php foreach ($languages as $item): ?>
        <tr>
            <td> <?=$item["name"]?> </td>
            <td> <?=$item["frontend"] ? "oui" : "non"?> </td>
            <td> <?=$item["backend"] ? "oui" : "non"?> </td>
            <td> <?=$item["compiled"] ? "oui" : "non"?> </td>
        </tr>
    <?php endforeach?>
</table>


</body>
</html>
