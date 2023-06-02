<?php

namespace models;

class Nationalite
{
    private int $id;
    private string $pays;

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

    public static function findAll()
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM nationalites");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->execute();
        $nationalites = $req->fetchAll();
        return $nationalites;
    }

    public static function findById(int $id) : Nationalite
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM nationalites WHERE id = :id");
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Nationalite::class);
        $req->bindParam(":id", $id);
        $req->execute();
        $nationalite = $req->fetch();
        return $nationalite;
    }

    public static function add() : string
    {
        $nationalite = $_POST['nationalite'];
        $req = \MonPdo::getInstance()->prepare('INSERT INTO nationalites (pays) VALUES (:nationalite)');
        $req->bindParam(':nationalite', $nationalite);
        $req->execute();
        return $nationalite;
    }

    public static function update(Nationalite $nationalite) : string
    {
        $id = $_POST['id'];
        $nationalite = $_POST['nationalite'];
        $req = \MonPdo::getInstance()->prepare('UPDATE nationalites SET pays = :nationalite WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->bindParam(':nationalite', $nationalite);
        $req->execute();
        return $nationalite;
    }

    public static function delete(int $id): int
    {
        $req = \MonPdo::getInstance()->prepare("DELETE FROM nationalites WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $id;
    }








}