<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="./style.css">
        </head>
        <body>
        <body style="background-color:#fff;">

        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email trop long
                            </div>
                        <?php 
                        break;

                        case 'username_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Nom d'utilisateur trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required="required" autocomplete="off">
                </div>
                
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off" aria-describedby="basic-addon2">
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
                
                <div class="form-group">
                    <p class="btn btn-primary btn-block"><a href="index.php">Retour</a></p>
                </div>
            </form>
        </div>

        <style>
        .login-form {
                border-radius: 10px;
                background-color: #095776;
                border-color: #21a1d5;
                width: 500px;
                margin: 115px auto;
                box-shadow: 0px 0px 5px rgba(242,242,242,255); 
                padding: 20px;
                padding-top: 40px;
                padding-bottom: 40px;
                }
                
        a {
        color: #fff;
        }
        
        </style>

        </body>
</html>
