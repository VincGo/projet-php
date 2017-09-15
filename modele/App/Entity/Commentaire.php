<?php
namespace App\Entity;

Class Commentaire{
    private $id;
    private $idBillet;
    private $auteur;
    private $contenu_com;
    private $date_com;


    public function getId(){
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getIdBillet()
    {
        return $this->idBillet;
    }

    /**
     * @param mixed $id_billet
     * @return Commentaire
    */
    public function setIdBillet($idBillet)
    {
        $this->idBillet = $idBillet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     * @return Commentaire
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenuCom()
    {
        return $this->contenu_com;
    }

    /**
     * @param mixed $contenu_com
     * @return Commentaire
     */
    public function setContenuCom($contenu_com)
    {
        $this->contenu_com = $contenu_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCom()
    {
        return $this->date_com;
    }

    /**
     * @param mixed $date_com
     * @return Commentaire
     */
    public function setDateCom($date_com)
    {
        $this->date_com = $date_com;
        return $this;
    }
}

?>