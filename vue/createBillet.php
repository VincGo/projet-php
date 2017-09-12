<?php
require_once '../modele/App/Manager/BilletManager.php';
require_once '../modele/App/Entity/Billet.php';

use App\Entity\Billet;
use App\Manager\BilletManager;

$billet = new Billet();

$billet->setTitre($_POST['title'])
	->setContenu($_POST['contents']);

$billetmanager = new BilletManager();

$saveIsOk = $billetmanager->save($billet);

if($saveIsOk){
	$message = 'Le billet a été ajouté';
}
else{
	$message = 'Le billet n\' a pas été ajouté';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout d'un billet</title>
</head>
<body>
	<h1> insertion d'un billet</h1>
    <a href="homepage.php">Retour au sommaire</a>

	<p><?=  $message ?></p>

</body>
</html>