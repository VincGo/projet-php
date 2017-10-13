<div class="news">
    <h2>
        <a href="allContents.php?id=<?= $billet->getId(); ?>"><?= $billet->getTitre(); ?></a>
        <em>le <?php echo $billet->getDate_billet(); ?></em>
    </h2>
    <p>
        <?= $billet->getContenu(); ?><br>
        <a href="allContents.php?id=<?= $billet->getId(); ?>">Commentaires</a>
    </p>
</div>