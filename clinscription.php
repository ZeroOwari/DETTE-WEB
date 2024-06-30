<?php 
    require_once 'db.php';
    class Inscription extends DB{
        private $email;
        private $password;
        private $password2;
        private $nom;
        private $prenom;
        private $PDO;
        
        function __construct($email, $password, $password2, $nom, $prenom){
            $this->email = $email;
            $this->password = $password;
            $this->password2 = $password2;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->PDO = new DB();
        }
        
        function inscription(){
            $this->PDO = $this->PDO->connect();
            $query = $this->PDO->prepare('SELECT * FROM utilisateur WHERE email = :email');
            $query->bindParam(':email', $this->email);
            $query->execute();
            $result = $query->fetch();
            if($result){
                $_SESSION['error'] = 'Email déjà utilisé';
                header("Location: ../inscription.html");
                die();          
            }
            else{
                if($this->password == $this->password2){
                    $query = $this->PDO->prepare('INSERT INTO utilisateur (email, password, nom, prenom) VALUES (:email, :password, :nom, :prenom)');
                    $query->bindParam(':email', $this->email);
                    $query->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));
                    $query->bindParam(':nom', $this->nom);
                    $query->bindParam(':prenom', $this->prenom);          
                    $query->execute();
                    $id = $this->PDO->lastInsertId();
                    session_start();
                    $_SESSION['email'] = $this->email;
                    $_SESSION['nom'] = $this->nom;
                    $_SESSION['prenom'] = $this->prenom;
                    $_SESSION['id'] = $id;
                    header('Location: ../genre_like.html');
                    die();
                    }
                }
        }
    }




?>