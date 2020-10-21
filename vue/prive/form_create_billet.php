<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<title>Editer un billet</title>
	</head>
	<body>
        <?php include("nav_admin.php"); ?>
            <h5 class="card-header">Ajouter un billet:</h5>
            <div class="card-body">
                <form action="../../controleur/createBillet.php" method="post" >
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="titre" required="required" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <textarea name="contents" id="contenu" rows="20" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bbv13m6hc1f23tbu2cwfob2jhn4hx2d3vkrzpsgv2p5wky4y"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
	</body>
</html>

