<?php
require_once '../modele/App/Manager/CommentaireManager.php';
require_once '../modele/App/Entity/Commentaire.php';

use App\Entity\Commentaire;
use App\Manager\CommentaireManager;

$commentaire = new Commentaire();

$commentaire->setAuteur($_POST['author'])
    ->setContenuCom($_POST['contentsCom']);

$commentairemanager = new CommentaireManager();

$saveIsOk = $commentairemanager->saveCom($commentaire);

if($saveIsOk){
    $message = 'Le billet a été ajouté';
}
else{
    $message = 'Le billet n\' a pas été ajouté';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'un billet</title>
</head>
<body>
<h1> insertion d'un billet</h1>
<a href="homepage.php">Retour au sommaire</a>

<p><?=  $message ?></p>

</body>
</html>