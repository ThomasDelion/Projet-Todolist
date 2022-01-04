<?php 
    session_start(); // demarre la session
    session_destroy(); // détruit la session
    header('Location:index.php'); // redirige vers la page de connexion
    die();
