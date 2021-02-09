<?php

function hello($age, $name = "toto")
{
    echo "Hello $name vous avez $age ans";
}

hello(10);

function add($n)
{
    return $n + 1;
}

echo "<br>";
$a = 1;
echo add($a);

echo "<br>";
echo $a;
