<?php
require_once '../modele/App/Manager/BilletManager.php';
require_once '../modele/App/Entity/Billet.php';

use App\Entity\Billet;
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billet = $billetManager->read($_POST['id']);

$billet->setTitre($_POST['title']);
$billet->setContenu($_POST['contents']);

$saveIsOk = $billetManager->save($billet);

if($saveIsOk){
    $message = 'Le billet a été mis à jour';
}
else{
    $message = 'Le billet n\' a pas été mis à jour';
}

?>

<?php include("message.php"); ?>
