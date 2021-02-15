<?php

// Nom du fichier
$fileName = "secret.txt";

// lecture du fichier
$content = file_get_contents($fileName);

var_dump($content);

// Ecrire dans un fichier
$newContent = "Hello";
file_put_contents($fileName, $newContent, FILE_APPEND | LOCK_EX);

$content = file_get_contents($fileName);
var_dump($content);
