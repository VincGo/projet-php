<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaire = $commentaireManager->readCom($_POST['id']);

$commentaire ->setAuteur($_POST['auteur']);
$commentaire ->setContenuCom($_POST['contents_com']);

$saveIsOk = $commentaireManager->saveCom($commentaire );

if($saveIsOk){
    $message = 'Le commentaire a été mis à jour';
}
else{
    $message = 'Le commentaire n\' a pas été mis à jour';
}

?>

<?php include("message.php"); ?>
