<?php

namespace models;

use PDO;

class Planque
{
    private int $id;
    private string $code;
    private string $adresse;
    private string $pays;
    private string $type;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
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

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public static function findAll()
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM planques");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->execute();
        $planques = $req->fetchAll();
        return $planques;
    }

    public static function findById(int $id) : Planque
    {
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM planques WHERE id = :id");
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $req->bindParam(":id", $id);
        $req->execute();
        $planque = $req->fetch();
        return $planque;
    }

    public static function add(Planque $planque) : int
    {
        $req = \MonPdo::getInstance()->prepare("INSERT INTO planques (code, adresse, pays, type) VALUES (:code, :adresse, :pays, :type)");
        $req->bindParam(":code", $planque->getCode());
        $req->bindParam(":adresse", $planque->getAdresse());
        $req->bindParam(":pays", $planque->getPays());
        $req->bindParam(":type", $planque->getType());
        $nb = $req->execute();
        return $nb;
    }

    public static function delete(int $id) : int
    {
        $req = \MonPdo::getInstance()->prepare("DELETE FROM planques WHERE id = :id");
        $req->bindParam(":id", $id);
        $nb = $req->execute();
        return $nb;
    }






}