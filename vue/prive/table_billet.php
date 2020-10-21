<?php
require_once __DIR__ . '../../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modération billet</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
    <?php include("nav_admin.php"); ?>


    <?php if (empty($billets)): ?>
        <p> Il n'y a pas de billet</p>
    <?php  else: ?>
        <?php if($billets === false):  ?>
            <p> Une erreur est survenue </p>
        <?php  else: ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date/heure</th>
            <th>Modération</th>
        </tr>
        </thead>
            <?php foreach ($billets as $billet): ?>
                <tbody>
                <tr>
                    <th scope="row"><?= $billet->getTitre(); ?></th>
                    <td><?php include("../public/include/billet.php"); ?></td>
                    <td><?php echo $billet->getDate_billet(); ?></td>
                    <td>
                        <a href="moderation.php?id=<?= $billet->getId(); ?>">modifier</a>
                        <a href="../../controleur/delete.php?id=<?= $billet->getId(); ?>">supprimer</a>
                    </td>
                </tr>
                </tbody>
            <?php endforeach; ?>
        <?php  endif; ?>
    <?php endif; ?>
    </table>
    </body>
</html>