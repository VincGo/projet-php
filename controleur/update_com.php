<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaire = $commentaireManager->readCom($_POST['id']);

$commentaire ->setAuteur($_POST['auteur']);
$commentaire ->setContenuCom($_POST['contents_com']);

$saveIsOk = $commentaireManager->saveCom($commentaire );

if($saveIsOk){
    header('location: ../vue/prive/table_billet.php');
}
else{
    $message = 'Le commentaire n\' a pas été mis à jour';
}

?>

<?php include("message.php"); ?>
