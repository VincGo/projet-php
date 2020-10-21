<?php
require_once __DIR__.'../../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> read($_GET['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <title>Editer un billet</title>
    </head>
    <body>
    <?php include("nav_admin.php"); ?>
    <h5 class="card-header">Modifier un billet:</h5>
    <div class="card-body">
        <form action="../../controleur/update.php" method="post">
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="titre" required="required" value=" <?= $billets->getTitre() ?>">
            </div>
            <div class="form-group">
                <textarea name="contents" id="contenu" rows="20" required="required" class="form-control"><?= $billets->getContenu() ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $billets->getId(); ?>">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</html>

