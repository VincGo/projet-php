<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editer un billet</title>
	</head>
	<body>
		<h1> Ajouter un billet</h1>
		<p><a href="homepage.php"> Retourn au sommaire </a></p>

		<form action="createBillet.php" method="post">
			<p>
				<label for="titre"> Titre </label>
				<input type="text" name="title" id="titre">
			</p>
			<p>
				<label for="contenu"> Contenu </label>
                <textarea type="text" name="contents" id="contenu" rows="20" cols="100"></textarea>
			</p>

			<p><input type="submit" value="Ajouter le billet"></p>
		</form>
	</body>
</html>