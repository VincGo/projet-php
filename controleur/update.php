<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billet = $billetManager->read($_POST['id']);

$billet->setTitre($_POST['title']);
$billet->setContenu($_POST['contents']);

$saveIsOk = $billetManager->save($billet);

if($saveIsOk){
    header('location: ../vue/prive/table_billet.php');
}
else{
    $message = 'Le billet n\' a pas été mis à jour';
}

?>

<?php include("message.php"); ?>
