<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaireManager->delete($_GET['id']);

if($commentaireManager){
    header('location: ../vue/prive/table_commentaire.php');
}
else{
    $message = 'Le commentaire n\' a pas été supprimé';
}
?>
<?php include("message.php"); ?>