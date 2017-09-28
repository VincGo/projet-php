<?php
namespace  App\Manager;
use PDO;
use App\Entity\Commentaire;

class CommentaireManager{

    protected $bdd;
    private $pdo;
    private $pdoStatement;

    public function __construct(){
        $bdd = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
        $this->bdd = $bdd;
    }


    public function readCom($id) {
        $bdd = $this->bdd;
        $query = 'SELECT * FROM commentaire WHERE id = '.$id;
        $req = $bdd->prepare($query);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $commentaire = new Commentaire();
        $commentaire->hydrate($row);

        return $commentaire;
    }

    public function readAllCom(){
        $getbillet = $_GET['id'];
        $bdd = $this->bdd;
        $query = "SELECT auteur, contenu_com, DATE_FORMAT(date_com, '%Hh%imin%ss le %d/%m/%Y') AS date_com, id_billet FROM commentaire WHERE id_billet = '$getbillet'";
        $req = $bdd->prepare($query);
        $req->execute();
        $commentaires = [];

        while( $row = $req->fetch(PDO::FETCH_ASSOC)) {

            $commentaire = new Commentaire();

            $commentaire->setAuteur($row['auteur']);
            $commentaire->setContenuCom($row['contenu_com']);
            $commentaire->setDateCom($row['date_com']);
            $commentaire->setId_Billet($row['id_billet']);

            $commentaires [] = $commentaire;
        }
        return $commentaires;
    }



    
    public function createCom(Commentaire $commentaire){
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

    public function saveCom(Commentaire &$commentaire){
        if(is_null($commentaire->getId())){
            return $this->createCom($commentaire);
        }
        else{
            echo 'pas de maj encore';
            //return $this->updateCom($commentaire);
        }
    }

    public function deleteCom($id) {
        $bdd = $this->bdd;
        $req = $bdd->prepare('DELETE FROM book WHERE id = '.$id);
        $req->execute();
    }
}