<?php

namespace models;

class Specialite
{
    private int $id;
    private string $nom;

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


    public static function findAll()
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM specialites");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->execute();
        $specialites = $req->fetchAll();
        return $specialites;
    }

    public static function findById(int $id) : Specialite
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM specialites WHERE id = :id");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindParam(":id", $id);
        $req->execute();
        $specialite = $req->fetch();
        return $specialite;
    }

    public static function add(Specialite $specialite) : int
    {
        $req = \MonPdo::getInstance()->prepare("INSERT INTO specialites (nom) VALUES (:nom)");
        $req->bindParam(":nom", $specialite->getNom());
        $nb = $req->execute();
        return $nb;
    }

    public static function update(Specialite $specialite) : int
    {
        $req = \MonPdo::getInstance()->prepare("UPDATE specialites SET nom = :nom WHERE id = :id");
        $req->bindParam(":nom", $specialite->getNom());
        $req->bindParam(":id", $specialite->getId());
        $nb = $req->execute();
        return $nb;
    }

    public static function delete(Specialite $specialite) : int
    {
        $req = \MonPdo::getInstance()->prepare("DELETE FROM specialites WHERE id = :id");
        $req->bindParam(":id", $specialite->getId());
        $nb = $req->execute();
        return $nb;
    }



}