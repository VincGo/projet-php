<?php
namespace  App\Manager;
use PDO;
use App\Entity\Commentaire;

class CommentaireManager{

    private $pdo;
    private $pdoStatement;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
    }

    public function readCom($id){
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM commentaire WHERE id= :id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();

        if($executeIsOk){
            $commentaire = $this->pdoStatement->fetchObject('App\Entity\Commmentaire');

            if($commentaire === false){
                return null;
            }
            else{
                return $commentaire;
            }
        }
        else{
            return false;
        }
    }

    public function readAllCom(){
        $this->pdoStatement = $this->pdo->query('SELECT * FROM commentaire ORDER BY id DESC');


        $commentaires = [];

        while($commentaire = $this->pdoStatement->fetchObject('App\Entity\Commentaire')){
            $commentaires [] = $commentaire;
        }

        return $commentaires;
    }

    private function createCom(Commentaire &$commentaire){
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO commentaire VALUES (NULL, :auteur, :contenu_com, NOW() /*:id_billet*/)');

        //liaison des
        $this->pdoStatement->bindValue(':auteur', $commentaire->getAuteur(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':contenu_com', $commentaire->getContenuCom(), PDO::PARAM_STR);
       // $this->pdoStatement->bindValue(':id_billet', $commentaire->getId(), PDO::PARAM_INT);

        //exécution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){
            echo "erreur";
            return false;
        }
        else{
            $id = $this->pdo->lastInsertId();
            $commentaire = $this->readAllCom();

            return true;
        }
    }

    //maj d'un objet en bdd
    private function updateCom(Commentaire $commentaire){
        $this->pdoStatement = $this->pdo->prepare('UPDATE commentaire set auteur = :auteur, contenuCom = :contenu_com WHERE id=:id LIMIT 1');

        //lier chaque paramètre à une valeur
        $this->pdoStatement->bindValue(':auteur', $commentaire->getAuteur(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':contenu', $commentaire->ContenuCOm(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $commentaire->getId(), PDO::PARAM_INT);

        //exécution de la requête
        return $this->pdoStatement->execute();
    }

    //supprime un objet de la bdd
    public function deleteCom(Commentaire $commentaire){
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM commentaire WHERE id = :id LIMIT 1');

        $this->pdoStatement->bindValue(':id', $commentaire->getId(), PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function saveCom(Commentaire &$commentaire){
        if(is_null($commentaire->getId())){
            return $this->createCom($commentaire);
        }
        else{
            return $this->updateCom($commentaire);
        }
    }
}