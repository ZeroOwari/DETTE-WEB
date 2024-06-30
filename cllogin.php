<?php 
require_once 'db.php';
require_once 'checker.php';
class Login extends Checker{
    private $email;
    private $password;
    private $PDO;
    private $result;

    function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = $password;
        $this->PDO = new DB();
        $this->PDO= $this->PDO->connect();
    }
    function login(){

        if($this->is_input_empty($this->email, $this->password)){
            $errors["empty_input"] = "Please fill in all the fields.";

        }
        $sql = 'SELECT * FROM utilisateur WHERE email = :email';
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':email', $this->email);
        $query->execute();
        $this->result = $query->fetch(PDO::FETCH_ASSOC);

        $errors= [];
        session_start();

        if($this->is_email_wrong($this->result)){
            $errors["email_wrong"] = "Email wrong.";
        }else {  
            if($this->is_password_wrong($this->password, $this->result['PASSWORD'])){   
            $errors["password_wrong"] = "Password wrong.";
            }
        }
      

        if(!empty($errors)){
            $_SESSION['error'] = $errors;
            header('Location: ../connexion.html');
            die();
        }

        session_start();
        $_SESSION['id'] = $this->result['ID_USER'];
        $_SESSION['email'] = $this->result['EMAIL'];
        $_SESSION['nom'] = $this->result['NOM'];
        $_SESSION['prenom'] = $this->result['PRENOM'];




    }




}








?>
