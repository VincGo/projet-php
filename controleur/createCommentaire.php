<?php
require_once __DIR__.'../../../boostrap.php';
use App\Entity\Commentaire;
use App\Manager\CommentaireManager;

if(!empty($_POST['author']) && !empty($_POST['contentsCom'])){
    $commentaire = new Commentaire();
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $commentaire->setAuteur($post['author'])
        ->setContenuCom($post['contentsCom'])
        ->setId_Billet($post['id_billet']);

    $commentairemanager = new CommentaireManager();

    $saveIsOk = $commentairemanager->saveCom($commentaire);

    if($saveIsOk){
        $message = 'Le commentaire a été ajouté';
    }
    else{
        $message = 'Le commentaire n\' a pas été ajouté';
    }
}
else{
    $message = 'Veuillez renseigner tous les champs ';
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ajout d'un commentaire</title>
    </head>
    <body>
        <a href="../vue/public/homepage.php">Retour au sommaire</a>
        <p><?=$message?></p>
    </body>
</html>