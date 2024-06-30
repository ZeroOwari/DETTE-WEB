<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'user.php';
        session_start();
        if(!isset($_POST['password'])) {
            $error['password'] = 'Password is required';
            $_SESSION['error'] = $error;
            header('Location: ../user_info.html');
            die();
        }


        $user = new User( password_hash($_POST['password'],PASSWORD_DEFAULT), $_POST['email'], $_POST['nom'],$_POST['prenom']);
        $user->modify_user();

        header('Location: ../index.html');
        die();
    }
    else {
        header('Location: ../index.html');
        die();
    }
?>