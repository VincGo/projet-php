<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$signalManager = new CommentaireManager();
$signal = $signalManager->signal($_GET['id']);


if($signal){
    $message = 'Le signalement a été fait';
}
else{
    $message = 'Le signalement n\' a pas été fait';
}
?>

<?php include("message.php"); ?>