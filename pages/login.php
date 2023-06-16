<?php
require_once "conn.php";

session_start();

// Vérifier si l'utilisateur est déjà connecté, le rediriger vers la page principale
if (isset($_SESSION['bgr']) && $_SESSION['bgr'] === true) {
  header("Location: ../index.php");
  exit;
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les valeurs du formulaire
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Vérifier les informations d'authentification

  $conn = connect_db();

  // Requête pour récupérer l'utilisateur correspondant à l'adresse e-mail saisie
  $sql="SELECT * FROM utilisateurs WHERE email = :email";
  $stmt = $conn->prepare($sql);
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch();

  // Vérifier si l'utilisateur existe et si le mot de passe est correct
  if ($user && password_verify($password, $user['password'])) {
    // Créer une session pour l'utilisateur connecté
    $_SESSION['bgr'] = true;

    // Rediriger vers la page principale
    header("Location: ../index.php");
    exit;
  } else {
    // Identifiants incorrects, afficher un message d'erreur
    $error = "Adresse e-mail ou mot de passe incorrect";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link rel="stylesheet" href="styl.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    body{
      display: flex;
      justify-content:center;
      flex-direction: columns;
      align-items: center;
      background-color: #f5f5f5;
      font-family: 'Roboto', sans-serif;
    }
    form {
      margin-top: 20px;
      background-color: #fff;
      padding: 40px 60px;
      border-radius: 10px;
      min-width: 300px;
    } 
    form h1{
      color: #eb7371;
      text-align:center;
    }
    form .social-media{
      margin-top: -10px;
      display: flex;
      flex-wrap:wrap;
      justify-content:center;
    }
    form .social-media p{
      padding: 5px;
      width: 20px;
      margin-left: 10px;
      border-radius: 100%;
      border: 1px solid #545454;
      text-align: center;
      cursor:pointer;
      color: #545454;
    }
    form p.choose-email{
      text-align:center;
    }
    form .inputs {
      display: flex;
      flex-direction: column;
    }
    form .inputs input[type='email'], input[type='password']{
      padding: 15px;
      border:none;
      border-radius: 5px;
      background-color:#f2f2f2;
      outline:none;
      margin-bottom: 15px;
    }
    form p.inscription{
      font-size: 14px;
      margin-bottom: 20px;
      color: #878787;
    }
    form p.inscription span{
      color: #eb7371;
    }
    form button{
      padding: 15px 25px;
      border-radius: 5px;
      border:none;
      font-size: 15px;
      color: #fff;
      background-color: #eb7371;
      outline:none;
      cursor:pointer;
      }
  </style>
</head>
<body>
  <form method="post">
    <h1>Se connecter</h1>
    <?php if (isset($error)): ?>
      <p><?php echo $error; ?></p>
    <?php endif; ?>
    <div class="inputs">
      <input type="email" id="email" name="email" placeholder="Email" required>
      <input type="password" id="password" name="password" placeholder="Mot de passe" required>
    </div>
    <div align="center">
      <button type="submit">Se connecter</button>
    </div>
  </form>
</body>
</html>


