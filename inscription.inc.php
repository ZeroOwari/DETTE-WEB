<?php 

    require_once 'clinscription.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $nom = $_POST['name'];
        $prenom = $_POST['firstname'];
        $inscription = new Inscription($email, $password, $password2, $nom, $prenom);
        $inscription->inscription();
        die();
    }
    else{
        header('Location: ../inscription.php');
    }

?>