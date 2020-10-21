<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');

    $pass = sha1($_POST['mdp']);
    $pseudo = $_POST['pseudo'];

    if(isset($_POST['submit']))
    {
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
            echo "<a href='infoAdmin.php'>Réessayer</a></p>";
        }
        else
        {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $pass;
            header('location: ../vue/prive/table_billet.php');
        }
    }
    else
    {
        echo 'veuillez renseigner les champs';
    }
?>





