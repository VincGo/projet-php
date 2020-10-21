<?php

use App\Entity\Commentaire;
use App\Manager\CommentaireManager;

if(isset($_POST['submitCom'])){
    $commentaire = new Commentaire();
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $commentaire->setAuteur($post['author'])
        ->setContenuCom($post['contentsCom'])
        ->setId_Billet($post['id_billet']);

    $commentairemanager = new CommentaireManager();

    $saveIsOk = $commentairemanager->saveCom($commentaire);
}
