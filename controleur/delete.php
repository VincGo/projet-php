<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\BilletManager;
use App\Manager\CommentaireManager;

$billetManager = new BilletManager();
$billet = $billetManager->read($_GET['id']);
$deleteIsOk = $billetManager->delete($billet);

$commentaireManager = new CommentaireManager();
$commentaireManager -> deleteAll();

if($deleteIsOk){
    header('location: ../vue/prive/table_billet.php');
}
else{
    $message = 'Le billet n\' a pas été supprimé';
}

if($commentaireManager){
    $message = 'Le commentaire a été supprimé';
}
else{
    $message = 'Le commentaire n\' a pas été supprimé';
}
?>

<?php include("message.php"); ?>