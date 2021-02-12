<?php

function getCell($rowIndex, $colIndex)
{
    $isRowEven = ($rowIndex % 2 == 0);
    $isColEven = ($colIndex % 2 == 0);
    $className = $isRowEven == $isColEven ? "white-cell" : "black-cell";

    return "<td class='$className'></td>";
}

function getRow($rowIndex, $size)
{
    $html = "<tr>";

    for ($i = 1; $i <= $size; $i++) {
        $html .= getCell($rowIndex, $i);
    }

    $html .= "</tr>";

    return $html;
}

function getTable($size)
{
    $html = "<table class='chessboard'>";
    for ($i = 1; $i <= $size; $i++) {
        $html .= getRow($i, $size);
    }
    $html .= "</table>";

    return $html;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echiquier</title>

    <style>

        .chess-container {
            width: 50%;
            padding-top: 50%;
            position: relative;
        }

        .chessboard {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .chessboard td {
            width: 12.5%;
            height: 12.5%;
        }

        .black-cell {
            background-color: #000;
        }

        .white-cell {
            background-color: #DDD;
        }

    </style>
</head>
<body>
<div class="chess-container">
    <?=getTable(8)?>
</div>

</body>
</html>
