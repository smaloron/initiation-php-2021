<?php
$fruitList = ["Pommes", "Poires", "Oranges"];

$animalList = ["Pangolin", "Hamster", "Chien", "Pigeon", "Baleine"];
$adjectiveList = ["fidèle", "furieux", "rapide", "intrépide", "malicieux"];

$name = $animalList[array_rand($animalList)] . " "
    . $adjectiveList[array_rand($adjectiveList)];

$fruitList[0] = "Grenades";
$fruitList[count($fruitList)] = "Pommes";
array_push($fruitList, "Abricots");

// suppression dans un tableau
// supprimer les poires
$deleteIndex = array_search("Poires", $fruitList);
array_splice($fruitList, $deleteIndex, 1);
// nombre aléatoire PHP entre 3 et 8
$alea = mt_rand(3, 8);

rsort($fruitList);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fruits</title>
</head>
<body>

<script>
    // choix aléatoire dans un tableau en Javascript
    let tab = [2,8,9,0,5];
    let pos = tab.length;
    while(pos == tab.length){
        pos = Math.floor(Math.random()* tab.length);
    }
    console.log (tab[pos]);

</script>

<ul>
    <?php foreach ($fruitList as $item): ?>
        <li> <?=$item?> </li>
     <?php endforeach?>
</ul>

<h3><?=$name?></h3>

</body>
</html>