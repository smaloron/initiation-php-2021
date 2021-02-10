<?php
$links = [
    ["label" => "Google", "link" => "http://www.google.fr"],
    ["label" => "Mediapart", "link" => "http://www.mediapart.fr"],
    ["label" => "Apple", "link" => "http://www.apple.fr"],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de liens</title>
</head>
<body>

    <ul>

        <?php foreach ($links as $item): ?>
            <li>
                <a href="<?=$item["link"]?>" target="_blank">
                    <?=$item["label"]?>
                </a>
            </li>
        <?php endforeach?>

    </ul>

</body>
</html>