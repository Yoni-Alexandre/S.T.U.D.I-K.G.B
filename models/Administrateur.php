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



}