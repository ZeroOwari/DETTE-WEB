<?php 
    session_start();
    if(isset($_SESSION['id'])){
        echo json_encode(array('status' => 'connected','genre' =>$_SESSION['genre']));
    }
    else{
        echo json_encode(array('status' => 'disconnected'));
    }


?>