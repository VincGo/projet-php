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
    <link href="../vue/style.css" rel="stylesheet" />
    <title>Sommaire</title>
</head>
<body>
<h1>Blog d'écrivain</h1>
<p>Derniers billets du blog </p>
<p><a href="../vue/homepage.php">Page d'accueil</a></p>
<p><a href="../modele/App/Manager/form_create_billet.php"> Ajouter un billet </a></p>
<?php if (empty($billets)): ?>
    <p> Il n'y a pas de contact</p>
<?php  else: ?>
    <?php if($billets === false):  ?>
        <p> Une erreur est survenue </p>
    <?php  else: ?>
        <?php foreach ($billets as $billet): ?>
            <div class="news">
                <h2>
                    <a href="moderation.php?id=<?= $billet->getId(); ?>"><?= $billet->getTitre(); ?></a>
                    <em>le <?php echo $billet->getDate_billet(); ?></em>
                </h2>
                <p>
                    <?= $billet->getContenu(); ?> <br>
                </p>
                <a href="moderation.php?id=<?= $billet->getId(); ?>">modifier</a>
                <a href="delete.php?id=<?= $billet->getId(); ?>">supprimer</a>

            </div>
        <?php endforeach; ?>
    <?php  endif; ?>
<?php endif; ?>

</body>
</html>