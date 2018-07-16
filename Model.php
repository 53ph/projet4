<?php

abstract class Model
{
    private static $_bdd;
    // Instancie la connexion à la BDD
    private static function setBdd()
    {
        self::$_bdd = new PDO 5'mysql: host=localhost;dbname=  ;charset=utf8','root', 'root');
        self::$_bdd->set Attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    // Récupère la connexion à la BDD
    protected function getBdd()
        {
            if(self::$_bdd == null)
                self::setBdd();
            return self::$_bdd;
        }  
        protected function getAll($stable, $obj)
           {
                $var = [];
                $req = $this->getBdd()->prepare('SELECT * FROM' .$table. 'ORDER BY id desc');
                $req->execute();
                while($data = $req-> fetch (PDO::FETCH_ASSOC))
                {
                    $var[] = new $obj($data);
                }
                return $var;
                $req ->closeCursor();
        }
            
    }
