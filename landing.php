<?php
session_start();
require_once 'config.php'; // ajout connexion bdd
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>To Do List</title> <!-- Titre -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- link pour les taches -->
    <link rel="stylesheet" href="./style2.css"> <!-- link pour rajouter le css -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- script js pour les taches -->
</head>
<body>
<nav class="navbar navbar-light bg-light"> <!-- navbar pour mettre mon bouton déconnection -->
    <div class="container-fluid">
            <img src="./logo.png" alt="promeo-logo" width="60px" height="60px">
        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a> <!-- bouton pour se déconnecter -->
    </div>
</nav>

<table width="5%" border="1" align="center"> <!-- table pour avoir un carré blanc -->
    <tr>
        <div class="container" action="inscription_traitement.php" method="post">
            <h2>Mes taches</h2>
            <div class="inputField">
                <form method="post" class="input_form">
                    <input type="text" name="task" id="myInput" class="task_input" placeholder="Ajouter une tache"> <!-- case pour écrire les taches -->
                    <button><i class="fas fa-plus" type="submit" name="submit" id="add_btn"></i></button> <!-- bouton icon -->
            </div>
            </form>

            <ul class="todoList">
                <!-- les données proviennent du stockage local -->
            </ul>
            <div class="footer">
                <br>
                <br>
                <span class="pendingTasks"></span>ㅤ</span> <!-- nombre de taches -->
                <button>ㅤ</button>
            </div>
        </div>
        </div>
        </div>

        <script src="script.js"></script> <!-- script pour rajouter mon javascript -->
        <style>

            .fa-plus:before {
                content: "\f25a";
                color: #78c1ef;
                font-size:2em;
                margin-top: 10px;
            }

        </style>
</body>
</html>
