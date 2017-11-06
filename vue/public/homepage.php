<?php
require_once __DIR__.'../../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>
<!DOCTYPE html>
    <html>
    <head>
        <?php include ("include/head_home.php"); ?>
    </head>
    <body>
    <!-- Navigation -->
        <?php include ("include/nav_home.php"); ?>
    <!-- Page Header -->
        <header class="masthead" style="background-image: url('../css/alaska-38.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>Billet simple pour l'Alaska</h1>
                            <span class="subheading">Par Jean Forteroche</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <?php if (empty($billets)): ?>
            <p> Il n'y a pas de billet</p>
        <?php  else: ?>
            <?php if($billets === false):  ?>
                <p> Une erreur est survenue </p>
            <?php  else: ?>
                <?php foreach ($billets as $billet): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10 mx-auto">
                                <div class="post-preview">
                                    <a href="allContents.php?id=<?= $billet->getId(); ?>">
                                        <h2 class="post-title">
                                           <?= $billet->getTitre(); ?>
                                        </h2>
                                        <h3 class="post-subtitle">
                                            <?php include("include/billet.php"); ?>
                                        </h3>
                                    </a>
                                    <p class="post-meta">Publié <?= $billet->getDate_billet(); ?></p>
                                    <a href="allContents.php?id=<?= $billet->getId(); ?>">Commentaire</a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php  endif; ?>
        <?php endif; ?>
    </body>
</html>