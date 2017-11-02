<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css"  />
        <title>Sommaire</title>
    </head>
    <body>
        <h1>Blog d'écrivain</h1>
        <p>Derniers billets du blog </p>
        <p><a href="../prive/infoAdmin.php"> Administration </a></p>
        <?php if (empty($billets)): ?>
            <p> Il n'y a pas de billet</p>
        <?php  else: ?>
            <?php if($billets === false):  ?>
                <p> Une erreur est survenue </p>
            <?php  else: ?>
                <?php foreach ($billets as $billet): ?>
                    <div class="news">
                        <h2>
                            <a href="allContents.php?id=<?= $billet->getId(); ?>"><?= $billet->getTitre(); ?></a>
                            <em><?php echo $billet->getDate_billet(); ?></em>
                        </h2>
                        <p>
                            <?php include("billet.php"); ?>
                            <a href="allContents.php?id=<?= $billet->getId(); ?>">Commentaires</a>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php  endif; ?>
        <?php endif; ?>

    </body>
</html>