<?php

namespace models;

use Cassandra\Date;

class Mission
{
    private int $id;
    private string $titre;
    private string $description;
    private string $nom_code;
    private string $pays;
    private string $type_mission;
    private string $statut;
    private int $specialite_requise;
    private Date $date_debut;
    private Date $date_fin;
    private int $agent_id;
    private int $contact_id;
    private int $cible_id;
    private int $planque_id;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNomCode(): string
    {
        return $this->nom_code;
    }

    /**
     * @param string $nom_code
     */
    public function setNomCode(string $nom_code): void
    {
        $this->nom_code = $nom_code;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays(string $pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return string
     */
    public function getTypeMission(): string
    {
        return $this->type_mission;
    }

    /**
     * @param string $type_mission
     */
    public function setTypeMission(string $type_mission): void
    {
        $this->type_mission = $type_mission;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return Specialite
     */
    public function getSpecialiteRequise(): Specialite
    {
        return Specialite::findById($this->specialite_requise);
    }

    /**
     * @param Specialite $specialite
     * @return Mission
     */
    public function setSpecialiteRequise(Specialite $specialite): self
    {
        $this->specialite_requise = $specialite->getId();
        return $this;
    }

    /**
     * @return Date
     */
    public function getDateDebut(): Date
    {
        return $this->date_debut;
    }

    /**
     * @param Date $date_debut
     */
    public function setDateDebut(Date $date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return Date
     */
    public function getDateFin(): Date
    {
        return $this->date_fin;
    }

    /**
     * @param Date $date_fin
     */
    public function setDateFin(Date $date_fin): void
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return int
     */
    public function getAgentId(): int
    {
        return $this->agent_id;
    }

    /**
     * @param int $agent_id
     */
    public function setAgentId(int $agent_id): void
    {
        $this->agent_id = $agent_id;
    }

    /**
     * @return int
     */
    public function getContactId(): int
    {
        return $this->contact_id;
    }

    /**
     * @param int $contact_id
     */
    public function setContactId(int $contact_id): void
    {
        $this->contact_id = $contact_id;
    }

    /**
     * @return int
     */
    public function getCibleId(): int
    {
        return $this->cible_id;
    }

    /**
     * @param int $cible_id
     */
    public function setCibleId(int $cible_id): void
    {
        $this->cible_id = $cible_id;
    }

    /**
     * @return int
     */
    public function getPlanqueId(): int
    {
        return $this->planque_id;
    }

    /**
     * @param int $planque_id
     */
    public function setPlanqueId(int $planque_id): void
    {
        $this->planque_id = $planque_id;
    }



    public static function findAll()
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM missions");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->execute();
        $missions = $req->fetchAll();
        return $missions;
    }

    public static function findById(int $id) : Mission
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM missions WHERE id = :id");
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Mission::class);
        $req->bindParam(":id", $id);
        $req->execute();
        $mission = $req->fetch();
        return $mission;
    }

    public static function add(Mission $mission) : int
    {
        $req = \MonPdo::getInstance()->prepare("INSERT INTO missions (titre, description, nom_code, pays, type_mission, statut, specialite_requise, date_debut, date_fin, agent_id, contact_id, cible_id, planque_id) VALUES (:titre, :description, :nom_code, :pays, :type_mission, :statut, :specialite_requise, :date_debut, :date_fin, :agent_id, :contact_id, :cible_id, :planque_id)");
        $req->bindParam(":titre", $mission->getTitre());
        $req->bindParam(":description", $mission->getDescription());
        $req->bindParam(":nom_code", $mission->getNomCode());
        $req->bindParam(":pays", $mission->getPays());
        $req->bindParam(":type_mission", $mission->getTypeMission());
        $req->bindParam(":statut", $mission->getStatut());
        $req->bindParam(":specialite_requise", $mission->getSpecialiteRequise());
        $req->bindParam(":date_debut", $mission->getDateDebut());
        $req->bindParam(":date_fin", $mission->getDateFin());
        $req->bindParam(":agent_id", $mission->getAgentId());
        $req->bindParam(":contact_id", $mission->getContactId());
        $req->bindParam(":cible_id", $mission->getCibleId());
        $req->bindParam(":planque_id", $mission->getPlanqueId());
        $req->execute();
        $id = \MonPdo::getInstance()->lastInsertId();
        return $id;
    }

    public static function update(Mission $mission) : int
    {
        $req = \MonPdo::getInstance()->prepare("UPDATE missions SET titre = :titre, description = :description, nom_code = :nom_code, pays = :pays, type_mission = :type_mission, statut = :statut, specialite_requise = :specialite_requise, date_debut = :date_debut, date_fin = :date_fin, agent_id = :agent_id, contact_id = :contact_id, cible_id = :cible_id, planque_id = :planque_id WHERE id = :id");
        $req->bindParam(":id", $mission->getId());
        $req->bindParam(":titre", $mission->getTitre());
        $req->bindParam(":description", $mission->getDescription());
        $req->bindParam(":nom_code", $mission->getNomCode());
        $req->bindParam(":pays", $mission->getPays());
        $req->bindParam(":type_mission", $mission->getTypeMission());
        $req->bindParam(":statut", $mission->getStatut());
        $req->bindParam(":specialite_requise", $mission->getSpecialiteRequise());
        $req->bindParam(":date_debut", $mission->getDateDebut());
        $req->bindParam(":date_fin", $mission->getDateFin());
        $req->bindParam(":agent_id", $mission->getAgentId());
        $req->bindParam(":contact_id", $mission->getContactId());
        $req->bindParam(":cible_id", $mission->getCibleId());
        $req->bindParam(":planque_id", $mission->getPlanqueId());
        $nb = $req->execute();
        return $nb;
    }

    public static function delete(Mission $mission) : int
    {
        $req = \MonPdo::getInstance()->prepare("DELETE FROM missions WHERE id = :id");
        $req->bindParam(":id", $mission->getId());
        $nb = $req->execute();
        return $nb;
    }
}