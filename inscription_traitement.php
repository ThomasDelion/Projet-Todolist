<?php 
    require_once 'config.php'; // Connexion à la base de donnée

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {
        // Patch XSS (éviter les failles de sécurité)
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // Vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT username, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // Transforme toute les lettres majuscule en minuscule
        
        
        //vérification si le mot de passe respect bien la sécurité demandé
        
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($username) <= 13){ // On verifie que la longueur du username 6 <= 13
                if(strlen($email) <= 255){ // On verifie que la longueur du mail <= 255
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                      if (strlen($password) > 13 || strlen($password) < 6 )
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // hash le mot de passe
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                            // insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)');
                            $insert->execute(array(
                                'username' => $username,
                                'email' => $email,
                                'password' => $password,
                            ));
                            // redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=username_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
