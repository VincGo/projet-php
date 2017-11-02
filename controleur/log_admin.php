<?php
    $bdd = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');

    $pass = sha1($_POST['mdp']);
    $pseudo = $_POST['pseudo'];

    $req = $bdd->prepare('SELECT id FROM admin WHERE pseudo = :pseudo AND mdp = :mdp');
    $req->execute(
        array
        (
            'pseudo' => $pseudo,
            'mdp' => $pass,
        )
    );

    $resultat = $req->fetch();

    if (!$resultat)
    {
        echo "<p>Mauvais identifiant ou mot de passe ! <a href='../vue/public/homepage.php'>retour</a></p>";
        echo "<a href='../vue/prive/infoAdmin.php'>Réessayer</a></p>";

    }
    else
    {
        echo "<p><a href='../vue/prive/table_billet.php'>Accès administration</a></p>";
    }
?>





