<?php 
require_once '../modele/App/Manager/BilletManager.php';
require_once '../modele/App/Entity/Billet.php';

use App\Entity\Billet;
use App\Manager\BilletManager;

$billetManager = new BilletManager();
$billets = $billetManager-> readAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" />
	<title>Sommaire</title>
</head>
<body>
	<h1>Blog d'écrivain</h1>
    <p>Derniers billets du blog :
    <p><a href="form_create_billet.php"> Ajouter un billet </a></p>
	<?php if (empty($billets)): ?>
		<p> Il n'y a pas de contact</p>
	<?php  else: ?>
		<?php if($billets === false):  ?>
			<p> Une erreur est survenue </p>
		<?php  else: ?>
				<?php foreach ($billets as $billets): ?>
                <div class="news">
                    <h3><?= $billets->getTitre() ?></h3>
                    <p><?= $billets->getContenu(); ?></p>
                </div>
				<?php endforeach; ?>
		<?php  endif; ?>
	<?php endif; ?>
						
</body>
</html>