<?php
require_once __DIR__.'../../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaires = $commentaireManager -> adminCom();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modération billet</title>
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <?php include("nav_admin.php"); ?>


    <?php if (empty($commentaires)): ?>
        <p> Il n'y a pas de commentaire</p>
    <?php  else: ?>
        <?php if($commentaires === false):  ?>
            <p> Une erreur est survenue </p>
        <?php  else: ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Contenu</th>
                    <th>Date/heure
                    <th>Signalement</th>
                    <th>Modération</th>
                </tr>
                </thead>
            <?php foreach ($commentaires as $commentaire): ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $commentaire->getAuteur(); ?></th>
                        <td><?= $commentaire->getContenuCom(); ?></td>
                        <td><?= $commentaire->getDateCom(); ?></td>
                        <td><?= $commentaire->getSignale(); ?></td>
                        <td>
                            <a href="../../controleur/delete_com.php?id=<?= $commentaire->getId();?>">Supprimer</a>
                        </td>
                    </tr>
                </tbody>

            <?php endforeach; ?>
        <?php  endif; ?>
    <?php endif; ?>
            </table>
    <?php include("script.php"); ?>
</body>
</html>