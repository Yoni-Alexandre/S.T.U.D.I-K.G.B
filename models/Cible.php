<?php

namespace models;

use Cassandra\Date;

class Cible
{
    private int $id;
    private string $nom;
    private string $prenom;
    private Date $date_naissance;
    private string $nom_code;
    private int $nationalite_id;

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

    public static function findAll()
    {
        $pdo = \MonPdo::getInstance();
        $req = "SELECT * FROM cibles";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function findById($id)
    {
        $pdo = \MonPdo::getInstance();
        $req = "SELECT * FROM cibles WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function add(Cible $cible)
    {
        $pdo = \MonPdo::getInstance();
        $req = "INSERT INTO cibles (nom, prenom, date_naissance, nom_code, nationalite_id) VALUES (:nom, :prenom, :date_naissance, :nom_code, :nationalite_id)";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $cible->getNom());
        $stmt->bindParam(':prenom', $cible->getPrenom());
        $stmt->bindParam(':date_naissance', $cible->getDateNaissance());
        $stmt->bindParam(':nom_code', $cible->getNomCode());
        $stmt->bindParam(':nationalite_id', $cible->getNationaliteId());
        $stmt->execute();
    }

    public static function update(Cible $cible)
    {
        $pdo = \MonPdo::getInstance();
        $req = "UPDATE cibles SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, nom_code = :nom_code, nationalite_id = :nationalite_id WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $cible->getNom());
        $stmt->bindParam(':prenom', $cible->getPrenom());
        $stmt->bindParam(':date_naissance', $cible->getDateNaissance());
        $stmt->bindParam(':nom_code', $cible->getNomCode());
        $stmt->bindParam(':nationalite_id', $cible->getNationaliteId());
        $stmt->bindParam(':id', $cible->getId());
        $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = \MonPdo::getInstance();
        $req = "DELETE FROM cibles WHERE id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->execute(['id' => $id]);
    }
}