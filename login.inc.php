<?php

    require_once 'cllogin.php';
    require_once 'cl_genre.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = new Login($email, $password);
        $login->login();
        $genre = new Genre();
        $array_genre = $genre->get_genre_like($_SESSION['id']);
        $_SESSION['genre'] = $array_genre;
        header('Location: ../index.html');
        die();
    }
    else{
        header('Location: ../connexion.html');
        die();
    }

?>