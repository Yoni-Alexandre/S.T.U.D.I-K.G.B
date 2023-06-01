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



}