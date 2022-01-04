<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['timer']) && !empty($_POST['projet_id']) && !empty($_POST['user_id']) && !empty($_POST['date_enregistrement']))
    {
        // Patch XSS
        $timer = htmlspecialchars($_POST['timer']);
        $projet_id = htmlspecialchars($_POST['projet_id']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $date_enregistrement = htmlspecialchars($_POST['date_enregistrement']);

        // Vérifie si le timer existe
        $check = $bdd->prepare('SELECT timer, projet_id, user_id, date_enregistrement FROM worksession WHERE projet_id = ?');
        $check->execute(array($projet_id));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // On insère dans la base de données
        $insert = $bdd->prepare('INSERT INTO worksession(timer, projet_id, user_id, date_enregistrement) VALUES(:timer, :projet_id, :user_id, :date_enregistrement)');
        $insert->execute(array(
            'timer' => $timer,
            'projet_id' => $projet_id,
            'user_id' => $user_id,
            'date_enregistrement' => $date_enregistrement,
            ));
        }
