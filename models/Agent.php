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
        $pdo = \MonPdo::getInstance();
        $req = "SELECT * FROM agents";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findById($id)
    {
        $pdo = \MonPdo::getInstance();
        $req = "SELECT * FROM agents WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function add(Agent $agent)
    {
        $pdo = \MonPdo::getInstance();
        $req = "INSERT INTO agents (nom, prenom, date_naissance, code_identification, nationalite_id, specialite_id) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite_id, :specialite_id)";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $agent->getNom());
        $stmt->bindParam(':prenom', $agent->getPrenom());
        $stmt->bindParam(':date_naissance', $agent->getDateNaissance());
        $stmt->bindParam(':code_identification', $agent->getCodeIdentification());
        $stmt->bindParam(':nationalite_id', $agent->getNationaliteId());
        $stmt->bindParam(':specialite_id', $agent->getSpecialiteId());
        $stmt->execute();
        return $pdo->lastInsertId();
    }
    public static function update(Agent $agent)
    {
        $pdo = \MonPdo::getInstance();
        $req = "UPDATE agents SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, code_identification = :code_identification, nationalite_id = :nationalite_id, specialite_id = :specialite_id WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $agent->getId());
        $stmt->bindParam(':nom', $agent->getNom());
        $stmt->bindParam(':prenom', $agent->getPrenom());
        $stmt->bindParam(':date_naissance', $agent->getDateNaissance());
        $stmt->bindParam(':code_identification', $agent->getCodeIdentification());
        $stmt->bindParam(':nationalite_id', $agent->getNationaliteId());
        $stmt->bindParam(':specialite_id', $agent->getSpecialiteId());
        $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = \MonPdo::getInstance();
        $req = "DELETE FROM agents WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}