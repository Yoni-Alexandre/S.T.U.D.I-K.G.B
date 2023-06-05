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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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

    public static function add(Mission $mission): int
    {
        $req = \MonPdo::getInstance()->prepare("INSERT INTO missions (titre, description, nom_code, pays, type_mission, statut, specialite_requise, date_debut, date_fin, agent_id, contact_id, cible_id, planque_id) VALUES (:titre, :description, :nom_code, :pays, :type_mission, :statut, :specialite_requise, :date_debut, :date_fin, :agent_id, :contact_id, :cible_id, :planque_id)");

        $req->bindValue(':titre', $_POST['titre']);
        $req->bindValue(':description', $_POST['description']);
        $req->bindValue(':nom_code', $_POST['nom_code']);
        $req->bindValue(':pays', $_POST['pays']);
        $req->bindValue(':type_mission', $_POST['type_mission']);
        $req->bindValue(':statut', $_POST['statut']);
        $req->bindValue(':specialite_requise', $_POST['specialite_requise'], \PDO::PARAM_INT);
        $req->bindValue(':date_debut', $_POST['date_debut']);
        $req->bindValue(':date_fin', $_POST['date_fin']);
        $req->bindValue(':agent_id', $_POST['agent_id'], \PDO::PARAM_INT);
        $req->bindValue(':contact_id', $_POST['contact_id'], \PDO::PARAM_INT);
        $req->bindValue(':cible_id', $_POST['cible_id'], \PDO::PARAM_INT);
        $req->bindValue(':planque_id', $_POST['planque_id'], \PDO::PARAM_INT);

        $req->execute();

        $id = \MonPdo::getInstance()->lastInsertId();

        return $id;
    }

    public static function update(Mission $mission): int
    {
        $req = \MonPdo::getInstance()->prepare("UPDATE missions SET titre = :titre, description = :description, nom_code = :nom_code, pays = :pays, type_mission = :type_mission, statut = :statut, specialite_requise = :specialite_requise, date_debut = :date_debut, date_fin = :date_fin, agent_id = :agent_id, contact_id = :contact_id, cible_id = :cible_id, planque_id = :planque_id WHERE id = :id");

        $req->bindValue(':titre', $_POST['titre']);
        $req->bindValue(':description', $_POST['description']);
        $req->bindValue(':nom_code', $_POST['nom_code']);
        $req->bindValue(':pays', $_POST['pays']);
        $req->bindValue(':type_mission', $_POST['type_mission']);
        $req->bindValue(':statut', $_POST['statut']);
        $req->bindValue(':specialite_requise', $_POST['specialite_requise'], \PDO::PARAM_INT);
        $req->bindValue(':date_debut', $_POST['date_debut']);
        $req->bindValue(':date_fin', $_POST['date_fin']);
        $req->bindValue(':agent_id', $_POST['agent_id'], \PDO::PARAM_INT);
        $req->bindValue(':contact_id', $_POST['contact_id'], \PDO::PARAM_INT);
        $req->bindValue(':cible_id', $_POST['cible_id'], \PDO::PARAM_INT);
        $req->bindValue(':planque_id', $_POST['planque_id'], \PDO::PARAM_INT);
        $req->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);

        $req->execute();

        $id = \MonPdo::getInstance()->lastInsertId();

        return $id;
    }

    public static function delete(): void
    {
        $id = $_GET['id'];
        $req = \MonPdo::getInstance()->prepare("DELETE FROM missions WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
    }

    public static function findPage(int $page, int $nbElements)
    {
        $req = \MonPdo::getInstance()->prepare("SELECT missions.*, agents.nom AS agent_nom, specialites.nom AS specialite_requise, contacts.nom AS contact_nom, cibles.nom AS cible_nom, planques.code AS planque_code FROM missions LEFT JOIN  agents ON missions.agent_id = agents.id LEFT JOIN  specialites ON missions.specialite_requise = specialites.id LEFT JOIN contacts ON missions.contact_id = contacts.id LEFT JOIN cibles ON missions.cible_id = cibles.id LEFT JOIN planques ON missions.planque_id = planques.id LIMIT :limit OFFSET :offset");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindValue(':limit', $nbElements, \PDO::PARAM_INT);
        $req->bindValue(':offset', ($page - 1) * $nbElements, \PDO::PARAM_INT);
        $req->execute();
        $missions = $req->fetchAll();
        return $missions;
    }

    public static function getNbPages(int $nbElements)
    {
        $req = \MonPdo::getInstance()->query("SELECT COUNT(*) FROM missions");
        $nbMissions = $req->fetchColumn();
        $nbPages = ceil($nbMissions / $nbElements);
        return $nbPages;
    }

    public static function search(string $keyword)
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM missions WHERE titre LIKE :keyword OR description LIKE :keyword OR nom_code LIKE :keyword OR pays LIKE :keyword OR type_mission LIKE :keyword OR statut LIKE :keyword");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindValue(':keyword', "%$keyword%");
        $req->execute();
        $missions = $req->fetchAll();
        return $missions;
    }

}