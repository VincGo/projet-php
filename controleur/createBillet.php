<?php
require_once __DIR__ . '../../boostrap.php';
use App\Entity\Billet;
use App\Manager\BilletManager;

if(!empty($_POST['title']) && !empty($_POST['contents'])){
    $billet = new Billet();
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $billet->setTitre($post['title'])
        ->setContenu($post['contents']);

    $billetmanager = new BilletManager();

    $saveIsOk = $billetmanager->save($billet);

    if($saveIsOk){
        $message = 'Le billet a été ajouté';
    }
    else{
        $message = 'Le billet n\' a pas été ajouté';
    }
}
else{
    $message = 'Veuillez renseigner tous les champs';
}

include("message.php");
?>
