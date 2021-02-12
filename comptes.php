<?php

$accountMoves = [
    ["label" => "Salaire", "date" => "2021-01-01", "amount" => 2500, "type" => "credit"],
    ["label" => "Loyer", "date" => "2021-01-05", "amount" => 800, "type" => "debit"],
    ["label" => "Restau", "date" => "2021-01-08", "amount" => 30, "type" => "debit"],
    ["label" => "Essence", "date" => "2021-01-09", "amount" => 50, "type" => "debit"],
    ["label" => "ebay", "date" => "2021-01-05", "amount" => 120, "type" => "credit"],
];

$totalCredit = 0;
$totalDebit = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptes</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<table class="table table-bordered table-striped">

<tr>
    <td>Libéllé</td>
    <td>date</td>
    <td>crédit</td>
    <td>débit</td>
</tr>
<?php foreach ($accountMoves as $item): ?>
    <tr>
        <td> <?=$item["label"]?> </td>
        <td> <?=$item["date"]?> </td>
        <td> <?=$item["type"] == "credit" ? $item["amount"] : ""?> </td>
        <td> <?=$item["type"] == "debit" ? $item["amount"] : ""?> </td>
    </tr>
<?php
$totalCredit += $item["type"] == "credit" ? $item["amount"] : 0;
$totalDebit += $item["type"] == "debit" ? $item["amount"] : 0;
?>
<?php endforeach?>

<tfoot>
    <tr>
        <td colspan="2"></td>
        <td><?=$totalCredit?></td>
        <td><?=$totalDebit?></td>
    </tr>
    <tr>
        <td colspan="3">Solde</td>
        <td><?=$totalCredit - $totalDebit?></td>
    </tr>
<tfoot>

</table>

</body>
</html>
