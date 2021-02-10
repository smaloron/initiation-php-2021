<?php
function getCell($rowIndex, $cellIndex)
{
    return "<td>" . ($rowIndex * $cellIndex) . "</td>";
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
    $html = "<table>";

    for ($i = 1; $i <= $size; $i++) {
        $html .= getRow($i, $size);
    }

    $html .= "</table>";

    return $html;
}
