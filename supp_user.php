<?php


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'user.php';
    session_start();

    $user = new User( password_hash($_SESSION['password'],PASSWORD_DEFAULT), $_SESSION['email'], $_SESSION['nom'],$_SESSION['prenom']);
    $user->delete_user();

    unset($_SESSION);
    session_destroy();
    header('Location: ../index.html');
    die();
}
else {
    header('Location: ../index.html');
    die();
}
?>
