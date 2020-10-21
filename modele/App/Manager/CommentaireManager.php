<?php
namespace  App\Manager;
use PDO;
use App\Entity\Commentaire;

class CommentaireManager
{

    protected $bdd;
    private $pdoStatement;

    public function __construct()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_php', 'dev', 'qsdfgh456');
        $this->bdd = $bdd;
    }

    public function readCom($id){
        $this->pdoStatement = $this->bdd->prepare('SELECT * FROM commentaire WHERE id = :id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();

        if($executeIsOk){
            $commentaire = $this->pdoStatement->fetchObject('App\Entity\Commentaire');

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

    public function readAllCom()
    {
        $getbillet = $_GET['id'];
        $this->pdoStatement = $this->bdd->query("SELECT id, auteur, contenu_com, DATE_FORMAT(date_com, 'le %d/%m/%Y à %Hh%i') AS date_com, id_billet, signale FROM commentaire WHERE id_billet = '$getbillet' ORDER BY date_com DESC");

        //construction d'un tableau d'objet de type Contact
        $commentaires = [];

        while($commentaire = $this->pdoStatement->fetchObject('App\Entity\Commentaire')){
            $commentaires[] = $commentaire;
        }

        return $commentaires;
    }


    public function adminCom()
    {
        $this->pdoStatement = $this->bdd->query('SELECT id, auteur, contenu_com, DATE_FORMAT(date_com, \'à %Hh%i le %d/%m/%Y\') AS date_com, id_billet, signale FROM commentaire ORDER BY signale DESC');

        //construction d'un tableau d'objet de type Contact
        $commentaires = [];

        while($commentaire = $this->pdoStatement->fetchObject('App\Entity\Commentaire')){
            $commentaires[] = $commentaire;
        }

        return $commentaires;
    }


    public function createCom(Commentaire $commentaire)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO commentaire (auteur, contenu_com, date_com, id_billet) VALUES (:auteur, :contenu_com, NOW(), :id_billet)";
        $req = $bdd->prepare($query);
        $req->execute(
            [
                'auteur' => $commentaire->getAuteur(),
                'contenu_com' => $commentaire->getContenuCom(),
                'id_billet' => $commentaire->getId_Billet(),
            ]
        );
        return $this;
    }

    public function updateCom(Commentaire $commentaire){
        $bdd = $this->bdd;
        $query = "UPDATE commentaire SET auteur = :auteur, contenu_com = :contenu_com, signale = 0 WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->execute(
            [
                'auteur' => $commentaire->getAuteur(),
                'contenu_com' => $commentaire->getContenuCom(),
                'id' => $commentaire->getId(),
            ]
        );
          return $this;
    }

    public function delete($id) {
        $bdd = $this->bdd;
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id = '.$id);
        $req->execute();
    }

    public function deleteAll(){
        $getbillet = $_GET['id'];
        $bdd = $this->bdd;
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id_billet = '.$getbillet);
        $req->execute();
    }

    public function signal($id){
        $bdd = $this->bdd;
        $req = $bdd->prepare('UPDATE commentaire SET signale = 1 WHERE id = '.$id);
        $req->execute();
    }

    public function saveCom(Commentaire &$commentaire)
    {
        if (is_null($commentaire->getId())) {
            return $this->createCom($commentaire);
        } else {
            return $this->updateCom($commentaire);
        }
    }
}


