<?php
namespace App\Manager;
use PDO;
use App\Entity\Billet;

class BilletManager{
	private $pdo;
	private $pdoStatement;

	public function __construct(){
		$this->pdo = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
	}

	public function read($id){
		$this->pdoStatement = $this->pdo->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_billet, \'à %Hh%i le %d/%m/%Y\') AS date_billet FROM billet WHERE id = :id');

		$this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

		$executeIsOk = $this->pdoStatement->execute();

		if($executeIsOk){
			$billet = $this->pdoStatement->fetchObject('App\Entity\Billet');

			if($billet === false){
				return null;
			}
			else{
				return $billet;
			}
		}
		else{
			return false;
		}
	}

    public function readAll(){
        $this->pdoStatement = $this->pdo->query("SELECT id, titre, contenu, DATE_FORMAT(date_billet, 'le %d/%m/%Y à %Hh%i') AS date_billet FROM billet ORDER BY date_billet DESC");

        //construction d'un tableau d'objet de type Contact
        $billets = [];

        while($billet = $this->pdoStatement->fetchObject('App\Entity\Billet')){
            $billets[] = $billet;
        }

        return $billets;
    }

	private function create(Billet &$billet){
		$this->pdoStatement = $this->pdo->prepare('INSERT INTO billet VALUES (NULL, :titre, :contenu, NOW())');

		//liaison des paramètres
		$this->pdoStatement->bindValue(':titre', $billet->getTitre(), PDO::PARAM_STR);
		$this->pdoStatement->bindValue(':contenu', $billet->getContenu(), PDO::PARAM_STR);

		//exécution de la requête
		$executeIsOk = $this->pdoStatement->execute();

		if(!$executeIsOk){
		    echo "erreur";
			return false;
		}
		else{
			$id = $this->pdo->lastInsertId();
			$billet = $this->read($id);

			return true;
		}
	}


		//maj d'un objet en bdd
	private function update(Billet $billet){
		$this->pdoStatement = $this->pdo->prepare('UPDATE billet set titre = :titre, contenu = :contenu WHERE id=:id LIMIT 1');

		//lier chaque paramètre à une valeur
		$this->pdoStatement->bindValue(':titre', $billet->getTitre(), PDO::PARAM_STR);
		$this->pdoStatement->bindValue(':contenu', $billet->getContenu(), PDO::PARAM_STR);
		$this->pdoStatement->bindValue(':id', $billet->getId(), PDO::PARAM_INT);

		//exécution de la requête 
		return $this->pdoStatement->execute();
	}

		//supprime un objet de la bdd
	public function delete(Billet $billet){
		$this->pdoStatement = $this->pdo->prepare('DELETE FROM billet WHERE id = :id LIMIT 1');

		$this->pdoStatement->bindValue(':id', $billet->getId(), PDO::PARAM_INT);

		return $this->pdoStatement->execute();
	}

	public function save(Billet &$billet){
		if(is_null($billet->getId())){
			return $this->create($billet);
		}
		else{
			return $this->update($billet);
		}
	}
}

