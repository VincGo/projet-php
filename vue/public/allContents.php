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
        <?php include ("include/head_home.php")?>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include ("include/nav_home.php")?>
        <header class="masthead" style="background-image: url('../css/alaska-38.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1><?= $billet->getTitre(); ?></h1>
                            <p class="post-meta">Publié <?= $billet->getDate_billet(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content -->
        <div class="container">
            <article>
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <?= $billet->getContenu(); ?>
                        </div>
                    </div>
            </article>
            <hr>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Laisser un commentaire:</h5>
                <div class="card-body">
                    <form action="../../controleur/createCommentaire.php" method="post">
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" id="auteur" required="required" placeholder="Pseudo">
                        </div>
                        <div class="form-group">
                            <textarea name="contentsCom" id="contenu" required="required" class="form-control" rows="3" placeholder="Entrez votre text ici ..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <input type="hidden" name="id_billet" value="<?=$billet->getId();?>">
                    </form>
                </div>
            </div>
            <!-- Comment -->
            <?php if (empty($commentaires)): ?>
                <p> Il n'y a pas de commentaire</p>
            <?php  else: ?>
                <?php if($commentaires === false):  ?>
                    <p> Une erreur est survenue </p>
                <?php  else: ?>
                    <?php foreach ($commentaires as $commentaire): ?>
                        <div class="media mb-4">
                            <div class="media-body">
                                <p><span><?= $commentaire->getAuteur(); ?></span> <em><?php echo $commentaire->getDateCom(); ?></em></p>
                                <?= $commentaire->getContenuCom(); ?>
                            </div>
                            <em><a href="../../controleur/signaler.php?id=<?= $commentaire->getId(); ?>">Signaler</a></em>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php  endif; ?>
            <?php endif; ?>
        </div>
    </body>
</html>