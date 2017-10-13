<?php
namespace vue\allContent;
require_once __DIR__.'../../../boostrap.php';
use App\Manager\BilletManager;
use App\Manager\CommentaireManager;

$billetManager = new BilletManager();
$billet = $billetManager-> read($_GET['id']);

$commentaireManager = new CommentaireManager();
$commentaires = $commentaireManager -> readAllCom();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../style.css" rel="stylesheet" />
        <title>Contenu</title>
    </head>
    <body>
    <h1>Blog d'écrivain</h1>
    <p><a href="homepage.php">Retour</a></p>
    <?php if (empty($billet)): ?>
        <p> Il n'y a pas de contact</p>
    <?php  else: ?>
        <?php if($billet === false):  ?>
            <p> Une erreur est survenue </p>
        <?php  else: ?>
            <?php include ("billet.php"); ?>
        <?php  endif; ?>
    <?php endif; ?>

    <form action="../../controleur/createCommentaire.php" method="post">
        <p>
            <label for="auteur"> Auteur </label>
            <input type="text" name="author" id="auteur">
        </p>
        <p>
            <label for="contenu"> Contenu </label>
            <textarea name="contentsCom" id="contenu" rows="10" cols="50"></textarea>
        </p>

        <p><input type="submit" value="Ajouter le commentaire"></p>
        <input type="hidden" name="id_billet" value="<?=$billet->getId();?>">
    </form>

    <?php if (empty($commentaires)): ?>
        <p> Il n'y a pas de commentaire</p>
    <?php  else: ?>
        <?php if($commentaires === false):  ?>
            <p> Une erreur est survenue </p>
        <?php  else: ?>
            <?php foreach ($commentaires as $commentaire): ?>
                <div class="news">
                    <h3>
                        <?= $commentaire->getAuteur(); ?>
                        <em>à <?php echo $commentaire->getDateCom(); ?></em>
                    </h3>
                    <p>
                        <?= $commentaire->getContenuCom(); ?>
                    </p>
                    <a href="../../controleur/signaler.php?id=<?= $commentaire->getId(); ?>">Signaler</a>
                </div>
            <?php endforeach; ?>
        <?php  endif; ?>
    <?php endif; ?>

    </body>
</html>