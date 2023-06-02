<?php

namespace models;

use Cassandra\Date;

class Administrateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $adresse_email;
    private string $mot_de_passe;
    private Date $date_creation;

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
     * @return string
     */
    public function getAdresseEmail(): string
    {
        return $this->adresse_email;
    }

    /**
     * @param string $adresse_email
     */
    public function setAdresseEmail(string $adresse_email): void
    {
        $this->adresse_email = $adresse_email;
    }

    /**
     * @return string
     */
    public function getMotDePasse(): string
    {
        return $this->mot_de_passe;
    }

    /**
     * @param string $mot_de_passe
     */
    public function setMotDePasse(string $mot_de_passe): void
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @return Date
     */
    public function getDateCreation(): Date
    {
        return $this->date_creation;
    }

    /**
     * @param Date $date_creation
     */
    public function setDateCreation(Date $date_creation): void
    {
        $this->date_creation = $date_creation;
    }

    public static function login(string $username, string $password): ?Administrateur
    {
        $administrateur = null;
        $pdo = \MonPdo::getInstance();
        $sql = "SELECT * FROM administrateurs WHERE adresse_mail = :username AND mot_de_passe = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $row = $stmt->fetch();
        if ($row) {
            $administrateur = new Administrateur();
            $administrateur->setId($row['id']);
            $administrateur->setNom($row['nom']);
            $administrateur->setPrenom($row['prenom']);
            $administrateur->setAdresseEmail($row['adresse_email']);
            $administrateur->setMotDePasse($row['mot_de_passe']);
            $administrateur->setDateCreation($row['date_creation']);
        }
        return $administrateur;
    }



}