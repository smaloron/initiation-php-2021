<?php
// un commentaire monoligne
$name = "Seb";
$age = 50;
$fruit = "pomme";

/*
Commentaire
sur deux lignes
 */

print "Hello";

echo " world";
?>
<!-- commentaire html -->
<h1>
<?php echo "Bonjour $name vous avez $age ans"; ?>
</h1>

<p>
<?php echo "Vous aimez les {$fruit}s" ?>
</p>

<p>
<?php echo "Les $fruit" . "s c'est super !" ?>
</p>

<p>
<?php echo date("d/m/Y"); ?>
</p>
<ul>
    <li>
        <a href="hello.php?nom=Pascal">Hello Pascal</a>
    </li>
    <li>
        <a href="hello.php?nom=Odile">Hello Odile</a>
    </li>
</ul>