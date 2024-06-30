<?php
declare(strict_types=1);
require_once 'db.php';

class User extends DB {
    private $username;
    private $password;
    private $email;
    private $nom;
    private $prenom;
    private $PDO;

    function __construct(string $password='', string $email='', string $nom='', string $prenom='') {
        // Connect to the database upon instantiatio
        $this->PDO = new DB();
        $this->PDO = $this->PDO->connect();
        $this->password = $password;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    function __destruct() {
        // Disconnect from the database when the object is destroyed
        //$this->PDO->disconnect();
    }

    function set_password(string $password) {
        $this->password = $password;
    }

    function set_email(string $email) {
        $this->email = $email;
    }

    function set_nom(string $nom) {
        $this->nom = $nom;
    }

    function set_prenom(string $prenom) {
        $this->prenom = $prenom;
    }

    function create_user() {
        $sql = 'INSERT INTO utilisateur (username, password, email, nom, prenom) VALUES (:username, :password, :email, :nom, :prenom)';
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':nom', $this->nom);
        $query->bindParam(':prenom', $this->prenom);
        $query->execute();
    }

    function modify_user() {
        $user_array = $this->get_user();
        print_r($user_array);
        $id = $user_array['ID_USER']; 

        $sql = 'UPDATE utilisateur SET PASSWORD = :password, EMAIL = :email, NOM = :nom, PRENOM = :prenom WHERE ID_USER = :id';
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':nom', $this->nom);
        $query->bindParam(':prenom', $this->prenom);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    function delete_user() {
        $sql = 'DELETE FROM utilisateur WHERE email = :email';
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->execute();
    }

    function get_user() {
        $sql = 'SELECT * FROM utilisateur WHERE email = :email';
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

?>