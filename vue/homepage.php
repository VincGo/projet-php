<?php
require_once '../modele/App/Manager/BilletManager.php';
require_once '../modele/App/Entity/Billet.php';


use App\Manager\BilletManager;
use App\Entity\Billet;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" />
        <title>Sommaire</title>
    </head>
    <body>
        <h1>Blog d'écrivain</h1>
        <p>Derniers billets du blog </p>
        <p><a href="form_create_billet.php"> Ajouter un billet </a></p>
        <?php if (empty($billets)): ?>
            <p> Il n'y a pas de contact</p>
        <?php  else: ?>
            <?php if($billets === false):  ?>
                <p> Une erreur est survenue </p>
            <?php  else: ?>
                <?php foreach ($billets as $billet): ?>
                    <div class="news">
                        <h2>
                            <a href="allContents.php?id=<?= $billet->getId(); ?>"><?= $billet->getTitre(); ?></a>
                            <em>le <?php echo $billet->getDate_billet(); ?></em>
                        </h2>
                        <p>
                            <?= $billet->getContenu(); ?> <br>
                            <a href="allContents.php?id=<?= $billet->getId(); ?>">Commentaires</a>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php  endif; ?>
        <?php endif; ?>

    </body>
</html>