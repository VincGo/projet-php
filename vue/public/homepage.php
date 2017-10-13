<?php
require_once __DIR__.'../../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../style2.css"  />
        <title>Sommaire</title>
    </head>
    <body>
        <h1>Blog d'écrivain</h1>
        <p>Derniers billets du blog </p>
        <p><a href="../prive/table_billet.php"> Administration </a></p>
        <?php if (empty($billets)): ?>
            <p> Il n'y a pas de billet</p>
        <?php  else: ?>
            <?php if($billets === false):  ?>
                <p> Une erreur est survenue </p>
            <?php  else: ?>
                <?php foreach ($billets as $billet): ?>
                    <?php include ("billet.php"); ?>
                <?php endforeach; ?>
            <?php  endif; ?>
        <?php endif; ?>

    </body>
</html>