<?php

class DB{
    private $PDO;
    function connect() {
        try {
            $this->PDO = new PDO('mysql:host=localhost;dbname=rattrapage_web;charset=utf8','linkdb','1234');
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $this->PDO;
    }
    function disconnect() {
         return  null;
    }


}

?>