<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    </head>
    <body>
        <h1>Connexion à l'administration</h1>
        <form action="../../controleur/log_admin.php" method="post" id="connexion">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="mdp">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
        </form>
        <?php include("script.php"); ?>
</html>
