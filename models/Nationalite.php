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
        // Supprimer les missions liées aux agents de la nationalité
        $reqMissions = \MonPdo::getInstance()->prepare("DELETE FROM missions WHERE agent_id IN (SELECT id FROM agents WHERE nationalite_id = :id)");
        $reqMissions->bindParam(':id', $id);
        $reqMissions->execute();

        // Supprimer les agents liés à la nationalité
        $reqAgents = \MonPdo::getInstance()->prepare("DELETE FROM agents WHERE nationalite_id = :id");
        $reqAgents->bindParam(':id', $id);
        $reqAgents->execute();

        // Supprimer les cibles liées à la nationalité
        $reqCibles = \MonPdo::getInstance()->prepare("DELETE FROM cibles WHERE nationalite_id = :id");
        $reqCibles->bindParam(':id', $id);
        $reqCibles->execute();

        // Supprimer la nationalité
        $reqNationalite = \MonPdo::getInstance()->prepare("DELETE FROM nationalites WHERE id = :id");
        $reqNationalite->bindParam(':id', $id);
        $reqNationalite->execute();

        return $id;
    }




    public static function findPage(int $page, int $nbElements)
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM nationalites LIMIT :limit OFFSET :offset");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindValue(':limit', $nbElements, \PDO::PARAM_INT);
        $req->bindValue(':offset', ($page - 1) * $nbElements, \PDO::PARAM_INT);
        $req->execute();
        $agents = $req->fetchAll();
        return $agents;
    }

    public static function getNbPages(int $nbElements)
    {
        $req = \MonPdo::getInstance()->query("SELECT COUNT(*) FROM nationalites");
        $nbAgents = $req->fetchColumn();
        $nbPages = ceil($nbAgents / $nbElements);
        return $nbPages;
    }








}