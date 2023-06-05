<?php

class MonPdo
    {
        private static $serveur='r6ze0q02l4me77k3.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
        private static $bdd='h35nxt9xlbc9em2v';
        private static $user='xxmk9gx4y3bsjlh4' ;
        private static $mdp='h00sslwd113os26g' ;
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