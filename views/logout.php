<?php 

    session_start();

    session_destroy();

    header('Location: homeView.php');
    exit;

?>