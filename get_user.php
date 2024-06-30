<?php 

    session_start();
    echo json_encode(array('id' => $_SESSION['id'], 'nom' => $_SESSION['nom'],'prenom' => $_SESSION['prenom'],'email' => $_SESSION['email']));
    
?>        