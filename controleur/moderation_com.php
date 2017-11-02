<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaire = $commentaireManager->readCom($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../vue/style.css" rel="stylesheet" />
    <title>Moderation</title>
</head>
<body>
<h1>Blog d'écrivain</h1>
<h2>Modifier un commmentaire</h2>
<p><a href="../vue/prive/table_billet.php"> Retour</a></p>

<form action="update_com.php" method="post">
    <p>
        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" value=" <?= $commentaire->getAuteur() ?>">
    </p>
    <p>
        <label for="contenu_com">Contenu</label>
        <textarea name="contents_com" id="contenu_com" rows="20" cols="100" ><?= $commentaire->getContenuCom() ?></textarea>
    </p>
    <input type="hidden" name="id" value="<?= $commentaire->getId(); ?>">
    <p><input type="submit" value="Modifier le commentaire"></p>
</form>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>