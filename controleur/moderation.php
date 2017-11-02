<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> read($_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../vue/style.css" rel="stylesheet" />
        <title>Contenu</title>
    </head>
    <body>
        <h1>Blog d'écrivain</h1>
        <h2>Modifier un billet</h2>
        <p><a href="../vue/prive/table_billet.php"> Retour</a></p>

        <form action="update.php" method="post">
            <p>
                <label for="titre"> Titre </label>
                <input type="text" name="title" id="titre" value=" <?= $billets->getTitre() ?>">
            </p>
            <p>
                <label for="contenu"> Contenu </label>
                <textarea name="contents" id="contenu" rows="20" cols="100" ><?= $billets->getContenu() ?></textarea>
            </p>
            <input type="hidden" name="id" value="<?= $billets->getId(); ?>">
            <p><input type="submit" value="Modifier le billet"></p>
        </form>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </body>
</html>