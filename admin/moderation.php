<?php
require_once '../modele/App/Manager/BilletManager.php';
require_once '../modele/App/Entity/Billet.php';
require_once '../modele/App/Manager/CommentaireManager.php';
require_once '../modele/App/Entity/Commentaire.php';

use App\Entity\Billet;
use App\Manager\BilletManager;
use App\Entity\Commentaire;
use App\Manager\CommentaireManager;

$billetManager = new BilletManager();
$billets = $billetManager-> read($_GET['id']);

$commentaireManager = new CommentaireManager();
$commentaires = $commentaireManager -> readAllCom();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../vue/style.css" rel="stylesheet" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title>Contenu</title>
</head>
<body>
<h1>Blog d'écrivain</h1>
<p><a href="admin_accueil.php">Retour</a></p>
<h1> Ajouter un billet</h1>
<p><a href="admin_accueil.php"> Retourn au sommaire </a></p>

<form action="update.php" method="post">
    <p>
        <label for="titre"> Titre </label>
        <input type="text" name="title" id="titre" value=" <?= $billets->getTitre() ?>">
    </p>
    <p>
        <label for="contenu"> Contenu </label>
        <textarea name="contents" id="contenu" rows="20" cols="100" ></textarea>
    </p>
    <input type="hidden" name="id" value="<?= $billets->getId(); ?>">
    <p><input type="submit" value="Modifier le billet"></p>
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
                <a href="delete.php?id=<?= $billet->getId(); ?>">supprimer</a>
            </div>
        <?php endforeach; ?>
    <?php  endif; ?>
<?php endif; ?>

</body>
</html>