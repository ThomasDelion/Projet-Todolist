<?php
    session_start();
    require_once 'config.php'; // ajout connexion bdd
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
?>

<?php
// initialize errors variable
$errors = "";

// connect to database
$db = mysqli_connect("localhost", "root", "", "table");

// insert a quote if submit button is clicked
if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $errors = "Vous devez remplir la tâche";
    }else{
        $task = $_POST['task'];
        $sql = "INSERT INTO tasks (task) VALUES ('$task')";
        mysqli_query($db, $sql);
        header('location: landing.php');
    }
}


// delete task
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    mysqli_query($db, "DELETE FROM tasks WHERE id=" . $id);
    header('location: index.php');
}


// ...
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>Espace membre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

  </head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
  </div>
</nav>

 <table width="5%" border="1" align="center">
   <tr>
    <div class="container" action="inscription_traitement.php" method="post">
       <h2>Taches</h2>
         <form method="post" class="input_form">
         <?php if (isset($errors)) { ?>
           <p><?php echo $errors; ?></p>
         <?php } ?>
         <input type="text" name="task" class="task_input">
         <button type="submit" name="submit" id="add_btn" class="add_btn">Ajouter</button>
         </form>

        <br>
        <br>
        <div class="pretty p-default p-curve p-toggle">
            <input type="checkbox" />
            <div class="state p-success p-on">
                <label>Sauvegardé</label>
            </div>
            <div class="state p-danger p-off">
                <label>Sauvegarder</label>
            </div>
        </div>
    </div>
   </tr>
 <table class="container2">
        <thead>
        <tr>
             <th>N°</th>
             <th>Taches</th>
             <th style="width: 60px;">Action</th>
         </tr>
         </thead>

         <tbody>
         <?php
         // sélectionner toutes les tâches si la page est visitée ou actualisée
         $tasks = mysqli_query($db, "SELECT * FROM tasks");

         $i = 1; while ($row = mysqli_fetch_array($tasks)) {?>
             <tr>
                 <td> <?php echo $i; ?> </td>
                 <td class="task"> <?php echo $row['task']; ?> </td>
                 <td class="delete">
                     <a href="landing.php?del_task=<?php echo $row['id'] ?>">x</a>
                 </td>
             </tr>
             <?php $i++; }?>

         <?php if (isset($errors)) { ?>
             <p><?php echo $errors; ?></p>
         <?php } ?>

         </tbody>
  </table>

    <script src="./script.js"></script>
    <script src="./script_tache.js"></script>
    <style>

    body {
    background: rgb(235,17,62);
    background: linear-gradient(90deg, rgba(235,17,62,1) 0%, rgba(0,212,255,1) 100%);
    }

    .container {
    border-radius: 10px;
    background-color: #095776;
    border-color: #21a1d5;
    width: 500px;
    margin: 115px auto;
    box-shadow: 0px 0px 5px rgba(242,242,242,255);  
    padding: 20px;
    padding-top: 20px;
    padding-bottom: 20px;
    }

    .container2 {
        border-radius: 10px;
        background-color: #095776;
        border-color: #21a1d5;
        width: 500px;
        margin: -115px auto;
        box-shadow: 0px 0px 5px rgba(242,242,242,255);
        padding: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    p {
    color: #fff;
    margin-top: 0;
    margin-bottom: 1px;
    font-size: 10px;
}

    h2 {
    color: #dc0e25;
    margin-top: 0;
    margin-bottom: 1rem;
    font-size: 20px;
}

    .table {
    border-radius: 10px;
    background-color: #095776;
    border-color: #21a1d5;
    width: 500px;
    margin: 10px auto;
    box-shadow: 0px 0px 5px rgba(242,242,242,255); 
    padding: 20px;
    padding-top: 20px;
    padding-bottom: 80px;
    }
    
    .texte {
    border-radius: 10px;
    background-color: #fff;;
    border-color: #dc0e25;
    width: 500px;
    margin: -90px auto;
    box-shadow: 0px 0px 5px rgba(242,242,242,255); 
    padding: 20px;
    padding-top: 20px;
    padding-bottom: 80px;
    }



    .heading{
        width: 50%;
        margin: 30px auto;
        text-align: center;
        color: 	#dc0e25;
        background: #FFF;
        border: 2px solid #dc0e25;
        border-radius: 20px;
    }
    .task_input {
        width: 78%;
        height: 37px;
        padding: 10px;
        border: 2px solid #dc0e25;
    }
    .add_btn {
        height: 39px;
        background: #FFF;
        color: 	#dc0e25;
        border: 2px solid #dc0e25;
        border-radius: 5px;
        padding: 5px 20px;
    }

    table {
        width: 50%;
        margin: 30px auto;
        border-collapse: collapse;
    }

    tr {
        border-bottom: 1px solid #cbcbcb;
    }

    th {
        font-size: 19px;
        color: #dc0e25;
    }

    th, td{
        border: none;
        height: 30px;
        padding: 2px;
    }

    tr:hover {
        background: #E9E9E9;
    }

    .task {
        text-align: left;
    }

    .delete{
        text-align: center;
    }
    .delete a{
        color: white;
        background: #dc0e25;
        padding: 1px 6px;
        border-radius: 3px;
        text-decoration: none;
    }


    // If you felt the name is not-so-pretty,
    // you can always change!

    $pretty--class-name: pretty;

    // are you sure, you wanna change my handpicked
    // awesome super duper colors?

    $pretty--color-default:#bdc3c7;
    $pretty--color-primary:#428bca;
    $pretty--color-info:#5bc0de;
    $pretty--color-success:#5cb85c;
    $pretty--color-warning:#f0ad4e;
    $pretty--color-danger:#d9534f;
    $pretty--color-dark:#5a656b;

    // uh, boring z-index stuff, who cares.

    $pretty--z-index-back:0;
    $pretty--z-index-between:1;
    $pretty--z-index-front:2;

    // nobody will change this.

    $pretty--debug:false;
    $pretty--dev-err:'Invalid input type!';

    </style>
  </body>
</html>
