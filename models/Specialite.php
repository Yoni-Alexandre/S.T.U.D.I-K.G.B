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
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Specialite::class);
        $req->bindParam(":id", $id);
        $req->execute();
        $specialite = $req->fetch();
        return $specialite;
    }

    public static function add() : string
    {
        $specialite = $_POST['specialite'];
        $req = \MonPdo::getInstance()->prepare('INSERT INTO specialites (nom) VALUES (:nom)');
        $req->bindParam(':nom', $specialite);
        $req->execute();
        return $specialite;
    }

    public static function update(Specialite $specialite) : string
    {
        $id = $_POST['id'];
        $specialite = $_POST['specialite'];
        $req = \MonPdo::getInstance()->prepare('UPDATE specialites SET nom = :nom WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->bindParam(':nom', $specialite);
        $req->execute();
        return $specialite;
    }

    public static function delete(int $id): int
    {
        $req = \MonPdo::getInstance()->prepare("DELETE FROM specialites WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $id;
    }



}