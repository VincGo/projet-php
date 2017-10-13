<?php
namespace App\Entity;

class Billet{
	private $id;
	private $titre;
	private $contenu;
	private $date_billet;

    //setter
	public function setTitre($titre){
		$this->titre = $titre;
		return $this;
	}

	public function setContenu($contenu){
		$this->contenu = $contenu;
		return $this; 
	}

    public function setDate_billet($date_billet){
        $this->date_billet = $date_billet;
        return $this;
    }

	//getter

	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function getContenu(){
		return $this->contenu;
	}

	public function getDate_billet(){
	    return $this->date_billet;
    }
}
?>