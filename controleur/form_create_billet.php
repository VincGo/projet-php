<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
		<title>Editer un billet</title>
	</head>
	<body>
		<h1> Ajouter un billet</h1>
		<p><a href="../vue/prive/table_billet.php"> Retour au sommaire </a></p>

		<form action="createBillet.php" method="post">
			<p>
				<label for="titre"> Titre </label>
				<input type="text" name="title" id="titre">
			</p>
			<p>
				<label for="contenu"> Contenu </label>
                <textarea name="contents" id="contenu" rows="20" cols="100"></textarea>
			</p>

			<p><input type="submit" value="Ajouter le billet"></p>
		</form>
	</body>
</html>