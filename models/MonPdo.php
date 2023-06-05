<?php
class MonPdo
    {
        private static $serveur='mysql:host=localhost';
        private static $bdd='dbname=studi_kgb';
        private static $user='root' ;
        private static $mdp='' ;
        private static $monPdo;
        private static $unPdo = null;

        private function __construct()
        {
            MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
            MonPdo::$unPdo->query("SET CHARACTER SET utf8");
            MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function __destruct()
        {
            MonPdo::$unPdo = null;
        }

        public static function getInstance()
        {
            if(self::$unPdo == null)
            {
                self::$monPdo= new MonPdo();
            }
            return self::$unPdo;
        }

    }
