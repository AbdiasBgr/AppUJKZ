<?php
  include('db.php');
  if (isset($_POST['administrer'])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"]; 
    $email = $_POST["email"]; 
    $mot_pass = $_POST["mot_pass"]; 
    $query = "INSERT INTO administrateur (nom, prenom, email, mot_pass) VALUES (:nom, :prenom, :email, :motpass)";
    $conn = connect_db();
    $query_run = $conn->prepare($query);

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Admin</title>
</head>
<body>
<form method="post" action="connexion.php">
                <label for="nom">Nom d'utilisateur ou Email:</label>
                <input type="text" id="nom" name="nom" placeholder="Nom d'utilisateur ou Email" required/><br><br>
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required/><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required/><br><br>
                <label for="mot_pass">Mot de passe:</label>
                <input type="password" id="mot_pass" name="mot_pass" placeholder="Mot de Passe" required/><br><br>
                <input type="submit" id="administrer" name="administrer" value="administrer">
    
    
</body>
</html>