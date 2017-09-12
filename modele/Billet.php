<?php
namespace App\Entity;

class Billet{
	private $id;
	private $titre;
	private $contenu;

	//setter
	public function setTitre($titre){
		$this->titre = $titre;
		return $this;
	}

	public function setContenu($contenu){
		$this->contenu = $contenu;
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
}
