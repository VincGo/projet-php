<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$commentaireManager = new CommentaireManager();
$commentaireManager->delete($_GET['id']);

if($commentaireManager){
    $message = 'Le commentaire a été supprimé';
}
else{
    $message = 'Le commentaire n\' a pas été supprimé';
}
?>
<?php include("message.php"); ?>