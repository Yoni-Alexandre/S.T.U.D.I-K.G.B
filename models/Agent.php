<?php

namespace models;

use Cassandra\Date;

class Agent
{
    private int $id;
    private string $nom;
    private string $prenom;
    private Date $date_naissance;
    private string $code_identification;
    private int $nationalite_id;
    private int $specialite_id;

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
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return Date
     */
    public function getDateNaissance(): Date
    {
        return $this->date_naissance;
    }

    /**
     * @param Date $date_naissance
     */
    public function setDateNaissance(Date $date_naissance): void
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return string
     */
    public function getCodeIdentification(): string
    {
        return $this->code_identification;
    }

    /**
     * @param string $code_identification
     */
    public function setCodeIdentification(string $code_identification): void
    {
        $this->code_identification = $code_identification;
    }

    /**
     * @return int
     */
    public function getNationaliteId(): int
    {
        return $this->nationalite_id;
    }

    /**
     * @param int $nationalite_id
     */
    public function setNationaliteId(int $nationalite_id): void
    {
        $this->nationalite_id = $nationalite_id;
    }

    /**
     * @return int
     */
    public function getSpecialiteId(): int
    {
        return $this->specialite_id;
    }

    /**
     * @param int $specialite_id
     */
    public function setSpecialiteId(int $specialite_id): void
    {
        $this->specialite_id = $specialite_id;
    }

    public static function findAll()
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM agents");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->execute();
        $agents = $req->fetchAll();
        return $agents;
    }

    public static function findById(int $id) : Agent
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM agents WHERE id = :id");
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Agent::class);
        $req->bindParam(":id", $id);
        $req->execute();
        $agent = $req->fetch();
        return $agent;
    }
    public static function add(Agent $agent): int
    {
        $req = \MonPdo::getInstance()->prepare("INSERT INTO agents (nom, prenom, date_naissance, code_identification, nationalite_id, specialite_id) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite_id, :specialite_id)");

        $req->bindValue(':nom', $_POST['nom']);
        $req->bindValue(':prenom', $_POST['prenom']);
        $req->bindValue(':date_naissance', $_POST['date_naissance']);
        $req->bindValue(':code_identification', $_POST['code_identification']);
        $req->bindValue(':nationalite_id', $_POST['nationalite_id'], \PDO::PARAM_INT);
        $req->bindValue(':specialite_id', $_POST['specialite_id'], \PDO::PARAM_INT);

        $req->execute();

        $id = \MonPdo::getInstance()->lastInsertId();

        return $id;
    }

    public static function update(Agent $agent): int
    {
        $req = \MonPdo::getInstance()->prepare("UPDATE agents SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, code_identification = :code_identification, nationalite_id = :nationalite_id, specialite_id = :specialite_id WHERE id = :id");

        $req->bindValue(':nom', $_POST['nom']);
        $req->bindValue(':prenom', $_POST['prenom']);
        $req->bindValue(':date_naissance', $_POST['date_naissance']);
        $req->bindValue(':code_identification', $_POST['code_identification']);
        $req->bindValue(':nationalite_id', $_POST['nationalite_id'], \PDO::PARAM_INT);
        $req->bindValue(':specialite_id', $_POST['specialite_id'], \PDO::PARAM_INT);
        $req->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);

        $req->execute();

        $id = \MonPdo::getInstance()->lastInsertId();

        return $id;
    }

    public static function delete(): void
    {
        $id = $_GET['id'];

        // Supprimer les missions liées à l'agent
        $reqMissions = \MonPdo::getInstance()->prepare("DELETE FROM missions WHERE agent_id = :id");
        $reqMissions->bindParam(':id', $id, \PDO::PARAM_INT);
        $reqMissions->execute();

        // Supprimer l'agent lui-même
        $reqAgent = \MonPdo::getInstance()->prepare("DELETE FROM agents WHERE id = :id");
        $reqAgent->bindParam(':id', $id, \PDO::PARAM_INT);
        $reqAgent->execute();
    }

    public static function findPage(int $page, int $nbElements)
    {
        $req = \MonPdo::getInstance()->prepare("SELECT agents.*, specialites.nom AS specialite_nom, nationalites.pays AS nationalite_pays FROM agents LEFT JOIN specialites ON agents.specialite_id = specialites.id LEFT JOIN nationalites ON agents.nationalite_id = nationalites.id LIMIT :limit OFFSET :offset");
//        $req = \MonPdo::getInstance()->prepare("SELECT * FROM agents LIMIT :limit OFFSET :offset");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindValue(':limit', $nbElements, \PDO::PARAM_INT);
        $req->bindValue(':offset', ($page - 1) * $nbElements, \PDO::PARAM_INT);
        $req->execute();
        $agents = $req->fetchAll();
        return $agents;
    }

    public static function getNbPages(int $nbElements)
    {
        $req = \MonPdo::getInstance()->query("SELECT COUNT(*) FROM agents");
        $nbAgents = $req->fetchColumn();
        $nbPages = ceil($nbAgents / $nbElements);
        return $nbPages;
    }
}